<?php

namespace App\Services;

use Illuminate\Contracts\Config\Repository as Config;
use JsonSerializable;
use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\Command;
use MongoDB\Driver\Exception\Exception as MongoDBException;
use MongoDB\Driver\Manager;
use MongoDB\Driver\Query;

class MongoService
{
    public function __construct(private Config $config)
    {
    }

    public function ping(): bool
    {
        try {
            $this->manager()->executeCommand($this->databaseName(), new Command(['ping' => 1]));

            return true;
        } catch (MongoDBException) {
            return false;
        }
    }

    public function exists(string $collection, array $filter): bool
    {
        return $this->findOne($collection, $filter) !== null;
    }

    public function findOne(string $collection, array $filter, array $sort = []): ?array
    {
        $options = [
            'limit' => 1,
            'typeMap' => [
                'root' => 'array',
                'document' => 'array',
            ],
        ];

        if ($sort !== []) {
            $options['sort'] = $sort;
        }

        $query = new Query($filter, $options);
        $cursor = $this->manager()->executeQuery($this->namespace($collection), $query);
        $cursor->setTypeMap([
            'root' => 'array',
            'document' => 'array',
        ]);
        $documents = $cursor->toArray();

        if (! isset($documents[0])) {
            return null;
        }

        return $this->normalizeDocument($documents[0]);
    }

    public function insertOne(string $collection, array $document): string
    {
        $bulk = new BulkWrite();
        $id = $bulk->insert($document);

        $this->manager()->executeBulkWrite($this->namespace($collection), $bulk);

        return (string) $id;
    }

    private function manager(): Manager
    {
        $connection = $this->config->get('database.connections.mongodb', []);
        $dsn = $connection['dsn'] ?? null;

        if (! empty($dsn)) {
            return new Manager($dsn);
        }

        $host = $connection['host'] ?? '127.0.0.1';
        $port = $connection['port'] ?? 27017;
        $username = $connection['username'] ?? null;
        $password = $connection['password'] ?? null;
        $authDatabase = $connection['options']['database'] ?? 'admin';

        if (! empty($username)) {
            $encodedUsername = rawurlencode((string) $username);
            $encodedPassword = rawurlencode((string) $password);

            return new Manager("mongodb://{$encodedUsername}:{$encodedPassword}@{$host}:{$port}/?authSource={$authDatabase}");
        }

        return new Manager("mongodb://{$host}:{$port}");
    }

    private function databaseName(): string
    {
        return (string) $this->config->get('database.connections.mongodb.database', 'laravel');
    }

    private function namespace(string $collection): string
    {
        return $this->databaseName().'.'.$collection;
    }

    private function normalizeDocument(mixed $document): ?array
    {
        if ($document === null) {
            return null;
        }

        if (is_array($document)) {
            return $document;
        }

        if ($document instanceof JsonSerializable) {
            $normalized = $document->jsonSerialize();

            return is_array($normalized) ? $normalized : (array) $normalized;
        }

        return (array) $document;
    }
}

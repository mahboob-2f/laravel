<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $compiledPath = sys_get_temp_dir().DIRECTORY_SEPARATOR.'laravel-login-test-views';

        File::ensureDirectoryExists($compiledPath);
        Config::set('view.compiled', $compiledPath);
    }

    public function test_login_page_loads(): void
    {
        $response = $this->get('/login');

        $response->assertOk();
        $response->assertSee('Login');
    }

    public function test_user_can_login_with_email(): void
    {
        $user = User::factory()->create([
            'password' => 'Password@123',
        ]);

        $response = $this->post('/loginSubmit', [
            'username' => $user->email,
            'password' => 'Password@123',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_can_login_with_name(): void
    {
        $user = User::factory()->create([
            'name' => 'mahi',
            'password' => 'Password@123',
        ]);

        $response = $this->post('/loginSubmit', [
            'username' => 'mahi',
            'password' => 'Password@123',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_invalid_login_redirects_back_with_error(): void
    {
        $response = $this->from('/login')->post('/loginSubmit', [
            'username' => 'wrong-user',
            'password' => 'wrong-password',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('username');
        $this->assertGuest();
    }
}

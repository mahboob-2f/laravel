<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <style>
        body {
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin: 0;
            padding: 20px;
        }

        .welcome-message {
            font-size: 3rem;
            font-weight: 600;
            margin-bottom: 1rem;
            animation: fadeIn 2s ease-in;
        }

        .subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }

        .feature-link {
            background: rgba(255, 255, 255, 0.1);
            padding: 1rem 2rem;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            transition: background 0.3s;
        }

        .feature-link:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        /* carousel styling */
        .carousel {
            width: 100%;
            max-width: 800px;
            margin: 2rem auto 0;
        }
        .carousel-img {
            border-radius: 12px;
            max-height: 450px;
            object-fit: cover;
            box-shadow: 0 8px 16px rgba(0,0,0,0.25);
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    @endif
</head>

<body>
    <div class="container">
        <h1 class="welcome-message">Welcome to {{ config('app.name', 'Laravel') }}</h1>
        <p class="subtitle">Your journey into web development starts here. Explore the features below!</p>

        <div class="features">
            <a href="{{ route('hey') }}" class="feature-link">Say Hey</a>
            <a href="{{ url('/table/5') }}" class="feature-link">Multiplication Table</a>
            <a href="{{ url('/user/World') }}" class="feature-link">Personal Greeting</a>
        </div>
    </div>
    <div>
        
    </div>
</body>

</html>
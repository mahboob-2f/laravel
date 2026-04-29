<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @yield('title')
</head>
<body>
    <header class="text-center bg-light p-4">
        <h1>Welcome to my Application</h1>
        <nav>
            <ul>
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li><a href="{{ route('fetch-data') }}">Register</a></li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
        @if(session('username')){
            <p>Welcome, {{ session('username') }}!</p>
        }
        @else{
            <p>Welcome, Guest!</p>
        }
        @endif
    </main>
    <footer>
        Copyright &copy; 2024 My Application. All rights reserved.
        visit at <a href="https://www.google.com">click here</a>
    </footer>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Ringgate') }} | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>
    <main class="container py-5">
        <h1>Welcome to Ringgate</h1>

        @auth
            <p>Hello, {{ auth()->user()->name }}!</p>
        @else
            <p>Log in to access your characters and campaigns.</p>
            @if (Route::has('login'))
                <a class="btn btn-primary" href="{{ route('login') }}">Log In</a>
            @endif
            @if (Route::has('register'))
                <a class="btn btn-outline-primary" href="{{ route('register') }}">Create an Account</a>
            @endif
        @endauth

        <section class="mt-4">
            <h2>Your Portal</h2>
            <ul>
                <li>My Characters</li>
                <li>My Campaigns</li>
                <li>Adventure Library</li>
                <li>My Profile</li>
            </ul>
        </section>

        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-secondary" type="submit">Log Out</button>
            </form>
        @endauth
    </main>
</body>
</html>

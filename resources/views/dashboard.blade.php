<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ringgate Dashboard</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>
    <h1>Welcome to Ringgate</h1>

    <p>Hello, {{ auth()->user()->name }}!</p>

    <h2>Your Portal</h2>
    <ul>
        <li>My Characters</li>
        <li>My Campaigns</li>
        <li>Adventure Library</li>
        <li>My Profile</li>
    </ul>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Log Out</button>
    </form>
</body>
</html>

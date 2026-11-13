
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <title>Login | Ringgate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5" style="max-width: 450px;">
    <h1 class="text-center mb-4">RINGGATE</h1>
    <h3>Welcome Back</h3>
    <p class="text-secondary">
        Log in to access your characters and campaigns.
    </p>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">
                Email
            </label>
            <input type="email" id="email" name="email"
                   class="form-control"
                   value="{{ old('email') }}"
                   autocomplete="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">
                Password
            </label>
            <input type="password" id="password"
                   name="password" class="form-control"
                   autocomplete="current-password" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" id="remember"
                   name="remember" value="1"
                   class="form-check-input">
            <label for="remember" class="form-check-label">
                Remember me
            </label>
        </div>

        <button type="submit" class="btn btn-danger w-100">
            Log In
        </button>
    </form>

    <div class="text-center mt-3">
        @if (Route::has('register'))
            <a href="{{ route('register') }}">
                Create an Account
            </a>
        @endif

        @if (Route::has('password.request'))
            <p class="mt-2">
                <a href="{{ route('password.request') }}">
                    Forgot Password?
                </a>
            </p>
        @endif
    </div>
</div>

</body>
</html>

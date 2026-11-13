
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <title>Forgot Password | Ringgate</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="bg-dark text-white">

<div class="container mt-5" style="max-width: 450px;">

    <h1 class="text-center mb-4">RINGGATE</h1>

    <h3>Password Recovery</h3>

    <p class="text-secondary">
        Enter your email address and we'll send you
        a link to reset your password.
    </p>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST"
          action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">
                Email Address
            </label>

            <input type="email"
                   id="email"
                   name="email"
                   value="{{ old('email') }}"
                   class="form-control"
                   autocomplete="email"
                   required>
        </div>

        <button type="submit"
                class="btn btn-danger w-100">
            Send Reset Link
        </button>
    </form>

    <div class="text-center mt-3">
        <a href="{{ route('login') }}">
            Return to Login
        </a>
    </div>

</div>

</body>
</html>

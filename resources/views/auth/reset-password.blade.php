
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <title>Reset Password | Ringgate</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="bg-dark text-white">

<div class="container mt-5" style="max-width: 450px;">

    <h1 class="text-center mb-4">RINGGATE</h1>
    <h3>Set a New Password</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ route('password.update') }}">
        @csrf

        <input type="hidden"
               name="token"
               value="{{ $request->route('token') }}">

        <div class="mb-3">
            <label for="email" class="form-label">
                Email Address
            </label>

            <input type="email"
                   id="email"
                   name="email"
                   class="form-control"
                   value="{{ old('email', $request->email) }}"
                   autocomplete="email"
                   required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">
                New Password
            </label>

            <input type="password"
                   id="password"
                   name="password"
                   class="form-control"
                   autocomplete="new-password"
                   required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation"
                   class="form-label">
                Confirm New Password
            </label>

            <input type="password"
                   id="password_confirmation"
                   name="password_confirmation"
                   class="form-control"
                   autocomplete="new-password"
                   required>
        </div>

        <button type="submit"
                class="btn btn-danger w-100">
            Reset Password
        </button>
    </form>

</div>

</body>
</html>

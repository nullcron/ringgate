
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <title>Verify Email | Ringgate</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="bg-dark text-white">

<div class="container mt-5" style="max-width: 450px;">

    <h1 class="text-center mb-4">RINGGATE</h1>

    <h3>Verify Your Email Address</h3>

    <p class="text-secondary">
        We've sent a verification link to your
        registered email address.
        Please open the link to activate your account.
    </p>

    @if (session('status') === 'verification-link-sent')
        <div class="alert alert-success">
            A new verification link has been generated.
        </div>
    @endif

    <form method="POST"
          action="{{ route('verification.send') }}">
        @csrf

        <button type="submit"
                class="btn btn-danger w-100">
            Resend Verification Email
        </button>
    </form>

    <form method="POST"
          action="{{ route('logout') }}"
          class="mt-3">
        @csrf

        <button type="submit"
                class="btn btn-outline-light w-100">
            Log Out
        </button>
    </form>

</div>

</body>
</html>

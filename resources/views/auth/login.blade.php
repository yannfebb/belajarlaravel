<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Berita Kampus</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background: #343a40; color: white; }
        .login-box { background: #454d55; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.3); }
        input { display: block; width: 100%; margin-bottom: 1rem; padding: 0.5rem; border: none; border-radius: 4px; }
        button { width: 100%; padding: 0.7rem; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .error { color: #ff6b6b; font-size: 0.8rem; margin-bottom: 1rem; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <label for="name">nama</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
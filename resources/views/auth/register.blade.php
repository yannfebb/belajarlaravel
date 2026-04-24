<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Berita Kampus</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; background: #343a40; color: white; padding: 2rem 0; }
        .register-box { background: #454d55; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.3); width: 100%; max-width: 400px; }
        h2 { text-align: center; margin-bottom: 1.5rem; }
        label { display: block; margin-top: 0.5rem; font-weight: bold; font-size: 0.9rem; }
        input { display: block; width: 100%; margin-bottom: 1rem; margin-top: 0.3rem; padding: 0.7rem; border: none; border-radius: 4px; box-sizing: border-box; }
        input:focus { outline: none; background: #f0f0f0; color: #333; }
        button { width: 100%; padding: 0.7rem; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; margin-top: 1rem; }
        button:hover { background: #218838; }
        .error { color: #ff6b6b; font-size: 0.8rem; margin-bottom: 1rem; }
        .error p { margin: 0.3rem 0; }
        .login-link { text-align: center; margin-top: 1rem; font-size: 0.9rem; }
        .login-link a { color: #007bff; text-decoration: none; }
        .login-link a:hover { text-decoration: underline; }
        .success { color: #90ee90; margin-bottom: 1rem; }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>Daftar Akun Baru</h2>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>❌ {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>

            <label for="password">Password (minimal 6 karakter)</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <button type="submit">Daftar</button>
        </form>

        <div class="login-link">
            Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
        </div>
    </div>
</body>
</html>

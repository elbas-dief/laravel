<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        :root {
            --bg-1: #0f172a;
            --bg-2: #1e293b;
            --card: rgba(15, 23, 42, 0.78);
            --card-border: rgba(148, 163, 184, 0.18);
            --primary: #38bdf8;
            --primary-dark: #0ea5e9;
            --text: #e2e8f0;
            --muted: #94a3b8;
            --input: rgba(15, 23, 42, 0.6);
            --danger: #f87171;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, var(--bg-1), var(--bg-2));
            color: var(--text);
        }

        .login-shell {
            width: min(92vw, 420px);
            padding: 28px;
            border-radius: 20px;
            background: var(--card);
            border: 1px solid var(--card-border);
            box-shadow: 0 25px 60px rgba(15, 23, 42, 0.55);
            backdrop-filter: blur(10px);
        }

        .brand {
            text-align: center;
            margin-bottom: 24px;
        }

        .brand-badge {
            width: 58px;
            height: 58px;
            margin: 0 auto 14px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            font-size: 1.6rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: 0 12px 24px rgba(14, 165, 233, 0.35);
        }

        .brand h1 {
            margin: 0;
            font-size: 1.9rem;
            font-weight: 700;
            letter-spacing: 0.02em;
        }

        .brand p {
            margin: 8px 0 0;
            color: var(--muted);
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text);
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 14px 14px;
            border-radius: 12px;
            border: 1px solid rgba(148, 163, 184, 0.26);
            background: var(--input);
            color: var(--text);
            font-size: 1rem;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: rgba(56, 189, 248, 0.8);
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.18);
        }

        .form-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 22px;
            font-size: 0.9rem;
            color: var(--muted);
        }

        .remember {
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .remember input {
            accent-color: var(--primary);
        }

        .forgot-link {
            color: var(--primary);
            text-decoration: none;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .btn-submit {
            width: 100%;
            border: none;
            border-radius: 12px;
            padding: 14px 16px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 16px 30px rgba(14, 165, 233, 0.35);
        }

        .btn-submit:hover {
            transform: translateY(-1px);
        }

        .signup {
            margin-top: 18px;
            text-align: center;
            color: var(--muted);
            font-size: 0.92rem;
        }

        .signup a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .alert {
            margin-bottom: 18px;
            padding: 12px 14px;
            border-radius: 10px;
            background: rgba(248, 113, 113, 0.12);
            border: 1px solid rgba(248, 113, 113, 0.2);
            color: #fecaca;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <main class="login-shell">
        <div class="brand">
            <div class="brand-badge">L</div>
            <h1>Login</h1>
            <p>Masuk ke akun Anda untuk melanjutkan</p>
        </div>

        @if ($errors->any())
            <div class="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" placeholder="Masukkan password" required>
            </div>

            <div class="form-row">
                <label class="remember">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span>Ingat saya</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="forgot-link" href="{{ route('password.request') }}">Lupa password?</a>
                @endif
            </div>

            <button type="submit" class="btn-submit">Masuk</button>

            @if (Route::has('register'))
                <div class="signup">
                    Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
                </div>
            @endif
        </form>
    </main>
</body>
</html>

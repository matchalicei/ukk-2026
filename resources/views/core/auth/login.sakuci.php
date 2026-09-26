@extends('layouts.app')

@section('title', 'Login')

@section('content')

<style>
    :root {
        --racing-red: #D62828;
        --racing-yellow: #FFC400;
        --racing-black: #252525;
    }

    .login-page {
        width: 100%;
        min-height: calc(100vh - 40px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 35px 20px 60px;
    }

    .login-card {
        position: relative;
        width: 100%;
        max-width: 500px;
        padding: 32px 42px 35px;
        background: #ffffff;
        border: 2px solid var(--racing-black);
        border-radius: 18px;
        box-shadow: 8px 8px 0 var(--racing-black);
    }

    [data-bs-theme="dark"] .login-card {
        background: #242424;
        border-color: white;
        box-shadow: 8px 8px 0 var(--racing-red);
    }

    .login-mcqueen {
        display: block;
        width: 175px;
        height: auto;
        margin: 0 auto 10px;
        object-fit: contain;
        transform: rotate(-3deg);
        filter: drop-shadow(4px 5px 0 rgba(0,0,0,.15));
    }

    .login-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .login-title {
        margin: 0 0 8px;
        color: var(--racing-black);
        font-size: 31px;
        font-weight: 1000;
        letter-spacing: -1px;
        line-height: 1.1;
    }

    .login-title span {
        color: var(--racing-red);
    }

    [data-bs-theme="dark"] .login-title {
        color: white;
    }

    .login-description {
        max-width: 370px;
        margin: 0 auto 28px;
        color: #666;
        font-size: 14px;
        line-height: 1.6;
    }

    [data-bs-theme="dark"] .login-description {
        color: #bbb;
    }

    .login-form {
        text-align: left;
    }

    .login-label {
        display: block;
        margin-bottom: 7px;
        color: var(--racing-black);
        font-size: 14px;
        font-weight: 800;
    }

    [data-bs-theme="dark"] .login-label {
        color: white;
    }

    .login-input {
        width: 100%;
        height: 46px;
        padding: 0 15px;
        background: white;
        color: var(--racing-black);
        border: 2px solid var(--racing-black);
        border-radius: 10px;
        font-size: 15px;
        outline: none;
    }

    .login-input:focus {
        border-color: var(--racing-red);
        box-shadow: 0 0 0 3px rgba(214, 40, 40, .15);
    }

    [data-bs-theme="dark"] .login-input {
        background: #252525;
        color: white;
        border-color: #555;
    }

    [data-bs-theme="dark"] .login-input:focus {
        border-color: var(--racing-red);
        box-shadow: 0 0 0 3px rgba(214, 40, 40, .2);
    }

    .login-button {
        width: 100%;
        height: 46px;
        margin-top: 8px;
        background: var(--racing-red);
        color: white;
        border: 2px solid var(--racing-black);
        border-radius: 10px;
        box-shadow: 3px 3px 0 var(--racing-black);
        font-size: 15px;
        font-weight: 900;
        cursor: pointer;
    }

    .login-button:hover {
        background: #b91c1c;
        color: white;
        transform: translateY(-1px);
    }

    .login-register {
        margin-top: 22px;
        margin-bottom: 0;
        color: #666;
        font-size: 13px;
        text-align: center;
    }

    .login-register a {
        color: var(--racing-red);
        font-weight: 800;
        text-decoration: none;
    }

    .login-register a:hover {
        color: #a91f1f;
        text-decoration: underline;
    }

    [data-bs-theme="dark"] .login-register {
        color: #bbb;
    }

    @media (max-width: 576px) {
        .login-page {
            padding: 25px 12px 45px;
        }

        .login-card {
            padding: 28px 22px 30px;
            box-shadow: 5px 5px 0 var(--racing-black);
        }

        .login-mcqueen {
            width: 145px;
        }

        .login-title {
            font-size: 27px;
        }
    }
</style>

<div class="login-page">

```
<div class="login-card">

    <img
        src="{{ asset('assets/images/racing/mcqueentengil.png') }}"
        alt="McQueen"
        class="login-mcqueen"
    >

    <div class="login-content">

        <h1 class="login-title">
            Masuk ke Sistem
            <span>Parkiran Alvira</span>
        </h1>

        <p class="login-description">
            Silakan masuk menggunakan akun yang sudah terdaftar
            untuk mengakses sistem parkir.
        </p>

        <form
            method="POST"
            action="{{ route('login.attempt') }}"
            class="login-form"
        >
            @csrf

            <div class="mb-3">
                <label class="login-label" for="username">
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username') }}"
                    class="login-input {{ errors()->has('username') ? 'is-invalid' : '' }}"
                    autofocus
                >

                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="login-label" for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    class="login-input {{ errors()->has('password') ? 'is-invalid' : '' }}"
                >

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button
                class="login-button"
                type="submit"
            >
                Login
            </button>
        </form>

        @php
            $canRegister = false;

            try {
                $canRegister = \App\Models\Role::where(
                    'can_register',
                    1
                )->exists();
            } catch (\Throwable $e) {
                $canRegister = false;
            }
        @endphp

        @if ($canRegister)
            <p class="login-register">
                Belum punya akun?
                <a href="{{ route('register') }}">
                    Daftar di sini
                </a>
            </p>
        @endif

    </div>
</div>
```

</div>

@endsection

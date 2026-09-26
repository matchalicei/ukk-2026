@extends('layouts.app')

@section('title', 'Daftar')

@section('content')

<style>
    :root {
        --racing-red: #D62828;
        --racing-yellow: #FFC400;
        --racing-black: #252525;
    }

    .register-page {
        width: 100%;
        min-height: calc(100vh - 40px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 35px 20px 60px;
    }

    .register-card {
        position: relative;
        width: 100%;
        max-width: 500px;
        padding: 32px 42px 35px;
        background: #ffffff;
        border: 2px solid var(--racing-black);
        border-radius: 18px;
        box-shadow: 8px 8px 0 var(--racing-black);
    }

    [data-bs-theme="dark"] .register-card {
        background: #242424;
        border-color: white;
        box-shadow: 8px 8px 0 var(--racing-red);
    }

    .register-element {
        display: block;
        width: 250px;
        height: 200px;
        margin: 0 auto 14px;
        object-fit: contain;
        filter: drop-shadow(4px 5px 0 rgba(0,0,0,.15));
    }

    .register-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .register-title {
        margin: 0 0 8px;
        color: var(--racing-black);
        font-size: 31px;
        font-weight: 1000;
        letter-spacing: -1px;
        line-height: 1.1;
    }

    .register-title span {
        color: var(--racing-red);
    }

    [data-bs-theme="dark"] .register-title {
        color: white;
    }

    .register-description {
        max-width: 370px;
        margin: 0 auto 28px;
        color: #666;
        font-size: 14px;
        line-height: 1.6;
    }

    [data-bs-theme="dark"] .register-description {
        color: #bbb;
    }

    .register-form {
        text-align: left;
    }

    .register-label {
        display: block;
        margin-bottom: 7px;
        color: var(--racing-black);
        font-size: 14px;
        font-weight: 800;
    }

    [data-bs-theme="dark"] .register-label {
        color: white;
    }

    .register-input,
    .register-select {
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

    .register-input:focus,
    .register-select:focus {
        border-color: var(--racing-red);
        box-shadow: 0 0 0 3px rgba(214, 40, 40, .15);
    }

    [data-bs-theme="dark"] .register-input,
    [data-bs-theme="dark"] .register-select {
        background: #252525;
        color: white;
        border-color: #555;
    }

    [data-bs-theme="dark"] .register-input:focus,
    [data-bs-theme="dark"] .register-select:focus {
        border-color: var(--racing-red);
        box-shadow: 0 0 0 3px rgba(214, 40, 40, .2);
    }

    .register-button {
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

    .register-button:hover {
        background: #b91c1c;
        color: white;
        transform: translateY(-1px);
    }

    .register-login {
        margin-top: 22px;
        margin-bottom: 0;
        color: #666;
        font-size: 13px;
        text-align: center;
    }

    .register-login a {
        color: var(--racing-red);
        font-weight: 800;
        text-decoration: none;
    }

    .register-login a:hover {
        color: #a91f1f;
        text-decoration: underline;
    }

    [data-bs-theme="dark"] .register-login {
        color: #bbb;
    }

    @media (max-width: 576px) {
        .register-page {
            padding: 25px 12px 45px;
        }

        .register-card {
            padding: 28px 22px 30px;
            box-shadow: 5px 5px 0 var(--racing-black);
        }

        .register-element {
            width: 105px;
        }

        .register-title {
            font-size: 27px;
        }
    }
</style>

<div class="register-page">

```
<div class="register-card">

    <img
        src="{{ asset('assets/images/racing/benderabalapmcqueen.png') }}"
        alt="McQueen"
        class="register-element"
    >

    <div class="register-content">

        <h1 class="register-title">
            Daftar Akun Di
            <span>Sistem Parkiran Alvira</span>
        </h1>

        <p class="register-description">
            Buat akun baru untuk mendapatkan akses
            ke sistem parkir.
        </p>

        <form
            method="POST"
            action="{{ route('register.attempt') }}"
            class="register-form"
        >
            @csrf

            <div class="mb-3">
                <label class="register-label" for="username">
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username') }}"
                    class="register-input {{ errors()->has('username') ? 'is-invalid' : '' }}"
                    autofocus
                >

                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="register-label" for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    class="register-input {{ errors()->has('password') ? 'is-invalid' : '' }}"
                >

                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label
                    class="register-label"
                    for="password_confirmation"
                >
                    Konfirmasi Password
                </label>

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    class="register-input"
                >
            </div>

            @if (count($roles) > 1)
                <div class="mb-3">
                    <label
                        class="register-label"
                        for="role"
                    >
                        Daftar sebagai
                    </label>

                    <select
                        id="role"
                        name="role"
                        class="register-select {{ errors()->has('role') ? 'is-invalid' : '' }}"
                    >
                        @foreach ($roles as $role)
                            <option
                                value="{{ $role->name }}"
                                {{ old('role') === $role->name ? 'selected' : '' }}
                            >
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            @else
                <input
                    type="hidden"
                    name="role"
                    value="{{ $roles[0]->name }}"
                >
            @endif

            <button
                class="register-button"
                type="submit"
            >
                Daftar
            </button>
        </form>

        <p class="register-login">
            Sudah punya akun?
            <a href="{{ route('login') }}">
                Masuk di sini
            </a>
        </p>

    </div>
</div>
```

</div>

@endsection

<nav class="navbar navbar-expand-lg bg-body sticky-top racing-navbar">

    <div class="container-fluid px-3">

        {{-- Kiri --}}
        <div class="d-flex align-items-center gap-2">

            @php
                $dbConnected = false;

                try {
                    \Sakuci\Database\Connection::pdo();
                    $dbConnected = true;
                } catch (\Throwable $e) {
                    $dbConnected = false;
                }
            @endphp

            {{-- Tombol tema + indikator database --}}
            <button id="themeToggle"
                    type="button"
                    class="logo-toggle"
                    aria-label="Ganti tema terang/gelap"
                    title="Ganti tema terang/gelap">

                <svg width="28"
                     height="28"
                     viewBox="0 0 32 32"
                     xmlns="http://www.w3.org/2000/svg"
                     style="display: block;"
                     aria-hidden="true">

                    <circle class="logo-ring"
                            cx="16"
                            cy="16"
                            r="15"/>

                    <circle cx="16"
                            cy="16"
                            r="9"
                            fill="{{ $dbConnected ? '#28a745' : '#dc3545' }}"/>
                </svg>

            </button>

            {{-- Nama aplikasi --}}
            <a class="navbar-brand fw-bold m-0 racing-brand"
               href="{{ route('home') }}">
                Sistem Parkir
            </a>

        </div>


        {{-- Kanan --}}
        @php
            $currentUser = \App\Models\User::current();
        @endphp

        @if ($currentUser)

            @php
                $roleName = match ($currentUser->role) {
                    'admin' => 'Administrator',
                    'petugas' => 'Petugas',
                    'user' => 'User',
                    default => ucfirst($currentUser->role),
                };
            @endphp

            <div class="d-flex align-items-center gap-3 ms-auto">

                <span class="small text-secondary">
                    {{ $currentUser->username }} — {{ $roleName }}
                </span>

                <form method="POST"
                      action="{{ route('logout') }}"
                      class="m-0">

                    @csrf

                    <button type="submit"
                            class="btn btn-sm btn-outline-secondary">
                        Logout
                    </button>

                </form>

            </div>

        @else

            @php
                $canRegister = false;

                if ($dbConnected) {
                    try {
                        $canRegister = \App\Models\Role::where(
                            'can_register',
                            1
                        )->exists();
                    } catch (\Throwable $e) {
                        $canRegister = false;
                    }
                }
            @endphp

            <div class="ms-auto d-flex align-items-center gap-2">

                @if ($canRegister)

                    <a class="nav-link racing-register"
                       href="{{ route('register') }}">
                        Daftar
                    </a>

                @endif

                <a class="btn btn-sm racing-login rounded-pill px-3"
                   href="{{ route('login') }}">
                    Masuk
                </a>

            </div>

        @endif

    </div>

</nav>

<style>
    .racing-navbar {
        border-bottom: 2px solid #D62828 !important;
    }

    .racing-brand {
        color: #252525 !important;
        transition: .2s ease;
    }

    .racing-brand:hover {
        color: #D62828 !important;
    }

    .racing-register {
        color: #D62828 !important;
        font-weight: 700;
        transition: .2s ease;
    }

    .racing-register:hover {
        color: #252525 !important;
    }

    .racing-login {
        background: #D62828;
        color: white;
        border: 2px solid #D62828;
        font-weight: 700;
        box-shadow: 3px 3px 0 #252525;
        transition: .2s ease;
    }

    .racing-login:hover {
        background: #FFC400;
        color: #252525;
        border-color: #FFC400;
        transform: translate(-1px, -1px);
        box-shadow: 4px 4px 0 #252525;
    }

    [data-bs-theme="dark"] .racing-brand {
        color: white !important;
    }

    [data-bs-theme="dark"] .racing-brand:hover {
        color: #FFC400 !important;
    }

    [data-bs-theme="dark"] .racing-register {
        color: #FFC400 !important;
    }

    [data-bs-theme="dark"] .racing-register:hover {
        color: white !important;
    }
</style>
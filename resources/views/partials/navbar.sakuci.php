<nav class="navbar navbar-expand-lg bg-body border-bottom sticky-top">

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
            <a class="navbar-brand fw-semibold m-0"
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

                    <a class="nav-link"
                       href="{{ route('register') }}">
                        Daftar
                    </a>

                @endif

                <a class="btn btn-sm btn-brand rounded-pill px-3"
                   href="{{ route('login') }}">
                    Masuk
                </a>

            </div>

        @endif

    </div>

</nav>
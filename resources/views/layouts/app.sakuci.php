<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <script>
        (function () {
            var saved = localStorage.getItem('sakuci-theme');

            var theme = saved || (
                matchMedia('(prefers-color-scheme: dark)').matches
                    ? 'dark'
                    : 'light'
            );

            document.documentElement.setAttribute(
                'data-bs-theme',
                theme
            );
        })();
    </script>

    <link
        rel="stylesheet"
        href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/app.css') }}?v=4"
    >
</head>


<body class="d-flex flex-column min-vh-100 bg-body-tertiary">

    {{-- Navbar dihilangkan agar tampilan tidak terlihat seperti template Sakuci --}}


    {{-- Isi halaman --}}
    <div class="d-flex flex-grow-1">


        {{-- =================================================
             SIDEBAR ADMIN
        ================================================== --}}

        @if (
            \App\Models\User::current() &&
            \App\Models\User::current()->role === 'admin' &&
            (
                is_route('admin.dashboard') ||
                is_route('tarif.index') ||
                is_route('tarif.create') ||
                is_route('tarif.edit') ||
                is_route('member.index') ||
                is_route('member.create') ||
                is_route('member.edit') ||
                is_route('area-parkir.index') ||
                is_route('area-parkir.create') ||
                is_route('area-parkir.edit') ||
                is_route('log-aktivitas.index') ||
                is_route('admin.users.index') ||
                is_route('admin.roles.index')
            )
        )

            @include('partials.sidebar')

        @endif


        {{-- =================================================
             SIDEBAR PETUGAS
        ================================================== --}}

        @if (
            \App\Models\User::current() &&
            \App\Models\User::current()->role === 'petugas' &&
            (
                is_route('dashboard') ||
                is_route('petugas.dashboard') ||
                is_route('transaksi.index') ||
                is_route('transaksi.create') ||
                is_route('transaksi.edit')
            )
        )

            @include('partials.sidebar-petugas')

        @endif


        {{-- =================================================
             ISI HALAMAN
        ================================================== --}}

        <main class="flex-grow-1 px-3 px-lg-4 pt-4">

            @include('partials.flash')

            @yield('content')

        </main>

    </div>


    {{-- Footer --}}
    @include('partials.footer')


    {{-- JavaScript --}}
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/theme.js') }}"></script>

    @yield('scripts')

</body>

</html>
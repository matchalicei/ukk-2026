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

            document.documentElement.setAttribute('data-bs-theme', theme);
        })();
    </script>

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v=3">
</head>

<body class="d-flex flex-column min-vh-100 bg-body-tertiary">

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Isi halaman --}}
    <div class="d-flex flex-grow-1">

        {{-- Sidebar hanya muncul di halaman sistem --}}
        @if (
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
            is_route('admin.users.index') ||
            is_route('admin.roles.index')
        )
            @include('partials.sidebar')
        @endif

        <main class="flex-grow-1 py-4 py-lg-5 px-3 px-lg-4">

            @include('partials.flash')

            @yield('content')

        </main>

    </div>

    @include('partials.footer')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>

    @yield('scripts')

</body>

</html>
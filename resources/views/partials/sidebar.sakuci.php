<aside class="sidebar bg-body border-end">

    <div class="sidebar-content">

        {{-- Brand --}}
        <div class="sidebar-brand">

            <div class="brand-icon">
                P
            </div>

            <div>
                <div class="brand-title">
                    Parkiran
                </div>

                <div class="brand-subtitle">
                    Parking Management
                </div>
            </div>

        </div>


        <hr class="sidebar-divider">


        {{-- MENU UTAMA --}}
        <div class="sidebar-section">

            <div class="sidebar-heading">
                MENU UTAMA
            </div>

            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ is_route('admin.dashboard') ? 'active' : '' }}">

                <span class="sidebar-icon">⌂</span>
                <span>Dashboard</span>

            </a>


            <a href="{{ route('tarif.index') }}"
               class="sidebar-link {{ is_route('tarif.index') ? 'active' : '' }}">

                <span class="sidebar-icon">Rp</span>
                <span>Daftar Tarif</span>

            </a>

        </div>


        {{-- PARKIR --}}
        <div class="sidebar-section">

            <div class="sidebar-heading">
                PARKIR
            </div>


            <a href="{{ route('member.index') }}"
             class="sidebar-link {{ is_route('member.index') ? 'active' : '' }}">
             <span class="sidebar-icon">●</span>
             <span>Member</span>
            </a>


            <div class="sidebar-link disabled">

                <span class="sidebar-icon">□</span>
                <span>Area Parkir</span>
                <small>soon</small>

            </div>


            <div class="sidebar-link disabled">

                <span class="sidebar-icon">▤</span>
                <span>Transaksi</span>
                <small>soon</small>

            </div>

        </div>


        {{-- SISTEM --}}
        <div class="sidebar-section">

            <div class="sidebar-heading">
                SISTEM
            </div>


            <a href="{{ route('admin.users.index') }}"
               class="sidebar-link {{ is_route('admin.users.index') ? 'active' : '' }}">

                <span class="sidebar-icon">○</span>
                <span>User</span>

            </a>


            <a href="{{ route('admin.roles.index') }}"
               class="sidebar-link {{ is_route('admin.roles.index') ? 'active' : '' }}">

                <span class="sidebar-icon">♙</span>
                <span>Role</span>

            </a>

        </div>

    </div>


    {{-- Credit --}}
    <div class="sidebar-credit">

        <div class="credit-line"></div>

        <div class="credit-title">
            PARKIRAN
        </div>

        <div class="credit-text">
            Parking Management System
        </div>

        <div class="credit-text">
            © alvira 2026
        </div>

    </div>

</aside>
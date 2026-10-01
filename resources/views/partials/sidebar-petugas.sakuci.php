<aside class="sidebar" id="mainSidebar">

    <div class="sidebar-header">

        <div class="sidebar-brand">

            <div class="sidebar-spider">
                <img
                    src="{{ asset('assets/images/racing/spidermerah.png') }}"
                    alt="Spider"
                >
            </div>

            <div class="sidebar-brand-text">

                <div class="brand-title">
                    PARKIRAN
                </div>

                <div class="brand-subtitle">
                    Mcqueen Parking System
                </div>

            </div>

        </div>

    </div>


    {{-- TOGGLE SIDEBAR --}}
    <button
        type="button"
        class="sidebar-toggle"
        id="sidebarToggle"
        aria-label="Buka atau tutup sidebar"
    >
        <span></span>
        <span></span>
        <span></span>
    </button>


    <div class="sidebar-content">

        <div class="sidebar-divider"></div>


        {{-- =========================
             MENU UTAMA
        ========================== --}}

        <div class="sidebar-section">

            <div class="sidebar-heading">
                MENU UTAMA
            </div>


            {{-- BERANDA --}}
            <a
                href="{{ route('welcome') }}"
                class="sidebar-link"
            >

                <span class="sidebar-icon home-icon">

                    <img
                        src="{{ asset('assets/images/racing/mcqueenmiring.png') }}"
                        alt="Beranda"
                    >

                </span>

                <span>Beranda</span>

            </a>


            {{-- DASHBOARD --}}
            <a
                href="{{ route('petugas.dashboard') }}"
                class="sidebar-link {{ is_route('petugas.dashboard') || is_route('dashboard')? 'active' : '' }}"
            >

                <span class="sidebar-icon dashboard-icon">

                    <img
                        src="{{ asset('assets/images/racing/mcqueenatas.png') }}"
                        alt="Dashboard"
                    >

                </span>

                <span>Dashboard</span>

            </a>

        </div>


        {{-- =========================
             PARKIR
        ========================== --}}

        <div class="sidebar-section">

            <div class="sidebar-heading">
                PARKIR
            </div>


            {{-- TRANSAKSI --}}
            <a
                href="{{ route('transaksi.index') }}"
                class="sidebar-link {{ is_route('transaksi.index') ? 'active' : '' }}"
            >

                <span class="sidebar-icon transaksi-icon">

                    <img
                        src="{{ asset('assets/images/racing/mcqueenmiring.png') }}"
                        alt="Transaksi"
                    >

                </span>

                <span>Transaksi</span>

            </a>

        </div>


        {{-- =========================
             THEME & LOGOUT
        ========================== --}}

        <div class="sidebar-theme">

            {{-- THEME --}}
            <button
                type="button"
                class="theme-toggle-sidebar"
                id="themeToggleSidebar"
            >

                <span class="theme-icon">
                    ◐
                </span>

                <span>
                    Light / Dark
                </span>

            </button>


            {{-- LOGOUT --}}
            <form
                action="{{ route('logout') }}"
                method="POST"
                class="sidebar-logout-form"
            >

                @csrf

                <button
                    type="submit"
                    class="sidebar-link sidebar-logout"
                    onclick="return confirm('Yakin ingin logout?');"
                >

                    <span class="sidebar-icon logout-icon">
                        →
                    </span>

                    <span>Logout</span>

                </button>

            </form>

        </div>

    </div>

</aside>


<style>

/* =========================================================
   SIDEBAR
========================================================= */

.sidebar {
    width: 250px;
    min-width: 250px;
    height: 100vh;

    display: flex;
    flex-direction: column;

    position: sticky;
    top: 0;

    background: #fffdf8;

    border-right: 3px solid #252525;

    transition:
        width .25s ease,
        min-width .25s ease;

    overflow: visible;

    z-index: 1000;
}


/* =========================================================
   HEADER
========================================================= */

.sidebar-header {
    position: relative;

    min-height: 82px;

    padding: 16px 42px 8px 14px;

    display: flex;
    align-items: center;
}


/* =========================================================
   BRAND
========================================================= */

.sidebar-brand {
    display: flex;
    align-items: center;

    width: 100%;
}


.sidebar-spider {
    width: 68px;
    height: 68px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    position: relative;

    z-index: 3;
}


.sidebar-spider img {
    width: 62px !important;
    height: 62px !important;

    max-width: none !important;
    max-height: none !important;

    object-fit: contain;

    display: block;
}


.sidebar-brand-text {
    margin-left: -10px;

    position: relative;

    z-index: 2;
}


.brand-title {
    font-size: 17px;
    font-weight: 900;

    letter-spacing: 1.2px;

    color: #D62828;

    line-height: 1;
}


.brand-subtitle {
    margin-top: 5px;

    font-size: 9px;
    font-weight: 700;

    letter-spacing: .5px;

    color: #e2a900;
}


/* =========================================================
   TOGGLE
========================================================= */

.sidebar-toggle {
    position: absolute;

    right: 7px;
    top: 24px;

    width: 28px;
    height: 34px;

    padding: 0;

    border: 0;

    background: transparent;

    display: flex;
    flex-direction: column;

    align-items: center;
    justify-content: center;

    gap: 4px;

    cursor: pointer;

    z-index: 5000;
}


.sidebar-toggle span {
    display: block;

    width: 16px;
    height: 2px;

    background: #D62828;

    border-radius: 2px;

    transition: .15s ease;
}


.sidebar-toggle:hover span {
    background: #FFC400;

    width: 19px;
}


/* =========================================================
   CONTENT
========================================================= */

.sidebar-content {
    flex: 1;

    padding: 0 16px 15px;

    overflow-y: auto;
}


.sidebar-divider {
    height: 3px;

    margin: 3px 8px 20px;

    background:
        repeating-linear-gradient(
            90deg,
            #D62828 0,
            #D62828 14px,
            #FFC400 14px,
            #FFC400 28px
        );
}


/* =========================================================
   SECTION
========================================================= */

.sidebar-section {
    margin-bottom: 22px;
}


.sidebar-heading {
    padding: 0 10px;

    margin-bottom: 7px;

    font-size: 10px;
    font-weight: 900;

    letter-spacing: 1.1px;

    color: #999;
}


/* =========================================================
   LINK
========================================================= */

.sidebar-link {
    display: flex;
    align-items: center;

    gap: 10px;

    width: 100%;
    min-height: 43px;

    padding: 7px 10px;

    margin-bottom: 4px;

    border: 1px solid transparent;
    border-radius: 8px;

    color: #252525;

    text-decoration: none;

    font-size: 14px;
    font-weight: 600;

    transition: .15s ease;
}


.sidebar-link:hover {
    background: #fff1c2;

    border-color: #FFC400;
}


.sidebar-link.active {
    background: #D62828;

    color: #ffffff;

    border-color: #D62828;

    font-weight: 800;
}


/* =========================================================
   ICON
========================================================= */

.sidebar-icon {
    width: 38px;
    height: 38px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    overflow: visible;
}


.sidebar-icon img {
    object-fit: contain;

    display: block;

    max-width: none;
}


.sidebar-icon.home-icon img {
    width: 30px !important;
    height: 30px !important;

    max-width: 30px !important;
    max-height: 30px !important;

    min-width: 30px !important;
    min-height: 30px !important;
}


.dashboard-icon img {
    width: 46px !important;
    height: 46px !important;
}


.transaksi-icon img {
    width: 34px !important;
    height: 34px !important;
}


/* =========================================================
   LOGOUT
========================================================= */

.sidebar-logout-form {
    margin: 0;
    padding: 0;
}


.sidebar-logout {
    width: 100%;

    margin-bottom: 0;

    border: 1px solid transparent;

    background: transparent;

    color: #252525;

    text-align: left;

    cursor: pointer;

    font-family: inherit;
}


.sidebar-logout:hover {
    background: #FFC400;

    border-color: #D62828;

    color: #D62828;
}


.logout-icon {
    font-size: 24px;
    font-weight: 900;
    line-height: 1;
}


/* =========================================================
   THEME
========================================================= */

.sidebar-theme {
    margin-top: 8px;

    padding: 0 8px;
}


.theme-toggle-sidebar {
    width: 100%;

    display: flex;
    align-items: center;

    gap: 9px;

    padding: 9px 11px;

    border: 1px solid #FFC400;

    border-radius: 8px;

    background: #fff8df;

    color: #252525;

    font-size: 12px;

    font-weight: 700;

    cursor: pointer;

    transition: .15s ease;
}


.theme-toggle-sidebar:hover {
    background: #FFC400;

    border-color: #D62828;
}


.theme-icon {
    font-size: 16px;

    color: #D62828;
}


/* =========================================================
   SIDEBAR CLOSED
========================================================= */

body.sidebar-closed .sidebar {
    width: 0;
    min-width: 0;

    border-right: 0;

    overflow: visible;
}


body.sidebar-closed .sidebar-header,
body.sidebar-closed .sidebar-content {
    opacity: 0;

    pointer-events: none;
}


body.sidebar-closed .sidebar-toggle {

    position: fixed;

    left: 14px;
    top: 14px;

    right: auto;

    width: 30px;
    height: 36px;

    opacity: 1 !important;
    visibility: visible !important;

    pointer-events: auto !important;

    background: #fffdf8;

    border: 2px solid #252525;

    border-radius: 7px;

    gap: 4px;

    z-index: 99999;
}


body.sidebar-closed .sidebar-toggle span {
    width: 16px;
    height: 2px;

    background: #D62828;
}


/* =========================================================
   DARK MODE
========================================================= */

[data-bs-theme="dark"] .sidebar {
    background: #1b1b1b;

    border-right-color: #FFC400;
}


[data-bs-theme="dark"] .brand-title {
    color: #D62828;
}


[data-bs-theme="dark"] .brand-subtitle {
    color: #FFC400;
}


[data-bs-theme="dark"] .sidebar-link {
    color: #eeeeee;
}


[data-bs-theme="dark"] .sidebar-link:hover {
    background: #392d00;

    border-color: #FFC400;
}


[data-bs-theme="dark"] .sidebar-link.active {
    background: #D62828;

    color: #ffffff;
}


[data-bs-theme="dark"] .theme-toggle-sidebar {
    background: #302700;

    color: #ffffff;

    border-color: #FFC400;
}


[data-bs-theme="dark"] .sidebar-toggle span {
    background: #FFC400;
}


[data-bs-theme="dark"] body.sidebar-closed .sidebar-toggle {
    background: #1b1b1b;

    border-color: #FFC400;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 768px) {

    .sidebar {
        width: 220px;
        min-width: 220px;
    }

    .sidebar-spider {
        width: 55px;
        height: 55px;
    }

    .sidebar-spider img {
        width: 50px !important;
        height: 50px !important;
    }

    .brand-title {
        font-size: 15px;
    }

}

</style>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const sidebarToggle =
        document.getElementById('sidebarToggle');

    const themeToggle =
        document.getElementById('themeToggleSidebar');


    /* ==============================
       SIDEBAR OPEN / CLOSE
    ============================== */

    if (sidebarToggle) {

        sidebarToggle.addEventListener(
            'click',
            function () {

                document.body.classList.toggle(
                    'sidebar-closed'
                );

                const closed =
                    document.body.classList.contains(
                        'sidebar-closed'
                    );

                localStorage.setItem(
                    'sakuci-sidebar',
                    closed ? 'closed' : 'open'
                );

            }
        );

    }


    /* ==============================
       LOAD SIDEBAR STATE
    ============================== */

    if (
        localStorage.getItem('sakuci-sidebar')
        === 'closed'
    ) {

        document.body.classList.add(
            'sidebar-closed'
        );

    }


    /* ==============================
       LIGHT / DARK
    ============================== */

    if (themeToggle) {

        themeToggle.addEventListener(
            'click',
            function () {

                const html =
                    document.documentElement;

                const current =
                    html.getAttribute(
                        'data-bs-theme'
                    ) || 'light';

                const next =
                    current === 'dark'
                        ? 'light'
                        : 'dark';

                html.setAttribute(
                    'data-bs-theme',
                    next
                );

                localStorage.setItem(
                    'sakuci-theme',
                    next
                );

            }
        );

    }

});

</script>
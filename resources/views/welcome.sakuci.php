@extends('layouts.app')
@section('title', 'Sakuci Parking System')
@section('content')

<style>
    :root {
        --racing-red: #D62828;
        --racing-yellow: #FFC400;
        --racing-black: #252525;
        --racing-white: #F8F8F6;
    }

    .racing-page {
        min-height: 100vh;
        overflow: hidden;
        background: var(--racing-white);
        transition:
            background 0.35s ease,
            color 0.35s ease;
    }

    /* HERO */
    .racing-hero {
        position: relative;
        min-height: 760px;
        overflow: hidden;
        background:
            radial-gradient(
                circle at 50% 18%,
                rgba(214, 40, 40, .18),
                transparent 38%
            ),
            linear-gradient(
                180deg,
                #fffafa 0%,
                #fdeaea 38%,
                #f8d7d7 72%,
                #f2c2c2 100%
            );
        transition: background 0.35s ease;
    }

    /* DARK MODE HERO */
    [data-bs-theme="dark"] .racing-page {
        background: #171717;
    }

    [data-bs-theme="dark"] .racing-hero {
        background:
            radial-gradient(
                circle at 50% 18%,
                rgba(255, 196, 0, .12),
                transparent 38%
            ),
            linear-gradient(
                180deg,
                #171717 0%,
                #261818 38%,
                #3a1717 72%,
                #501919 100%
            );
    }

    .checker-strip {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 24px;
        z-index: 20;
        background-color: white;
        background-image:
            linear-gradient(
                45deg,
                var(--racing-black) 25%,
                transparent 25%,
                transparent 75%,
                var(--racing-black) 75%
            ),
            linear-gradient(
                45deg,
                var(--racing-black) 25%,
                transparent 25%,
                transparent 75%,
                var(--racing-black) 75%
            );
        background-position:
            0 0,
            12px 12px;
        background-size: 24px 24px;
        border-bottom: 2px solid var(--racing-black);
    }

    [data-bs-theme="dark"] .checker-strip {
        background-color: #ddd;
        border-bottom-color: #111;
    }

    /* HERO CONTENT */
    .hero-content {
        position: relative;
        z-index: 10;
        max-width: 850px;
        margin: 0 auto;
        padding: 130px 24px 0;
        text-align: center;
    }

    .hero-badge {
        display: inline-block;
        padding: 7px 18px;
        border: 2px solid var(--racing-black);
        border-radius: 999px;
        background: rgba(255, 255, 255, .75);
        color: var(--racing-black);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 3px;
        box-shadow: 4px 4px 0 var(--racing-black);
    }

    [data-bs-theme="dark"] .hero-badge {
        background: #252525;
        color: #fff;
        border-color: #fff;
        box-shadow: 4px 4px 0 var(--racing-yellow);
    }

    .hero-title {
        margin: 25px 0 18px;
        color: var(--racing-black);
        font-size: clamp(48px, 8vw, 92px);
        line-height: .9;
        font-weight: 1000;
        letter-spacing: -4px;
    }

    [data-bs-theme="dark"] .hero-title {
        color: #fff;
    }

    .hero-title .red {
        color: var(--racing-red);
    }

    .hero-title .yellow {
        color: var(--racing-yellow);
        -webkit-text-stroke: 2px var(--racing-black);
    }

    [data-bs-theme="dark"] .hero-title .yellow {
        -webkit-text-stroke: 2px #111;
    }

    .hero-description {
        max-width: 680px;
        margin: 0 auto;
        color: #555;
        font-size: 16px;
        line-height: 1.8;
    }

    [data-bs-theme="dark"] .hero-description {
        color: #d0d0d0;
    }

    /* BUTTONS */
    .hero-buttons {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-top: 30px;
    }

    .racing-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 135px;
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 800;
        text-decoration: none;
        transition: .2s ease;
    }

    .racing-btn-primary {
        background: var(--racing-red);
        color: white;
        border: 2px solid var(--racing-red);
        box-shadow: 4px 4px 0 var(--racing-black);
    }

    .racing-btn-primary:hover {
        transform: translate(-2px, -2px);
        color: white;
        box-shadow: 6px 6px 0 var(--racing-black);
    }

    .racing-btn-outline {
        background: transparent;
        color: var(--racing-black);
        border: 2px solid var(--racing-black);
    }

    .racing-btn-outline:hover {
        background: var(--racing-black);
        color: white;
    }

    [data-bs-theme="dark"] .racing-btn-outline {
        color: white;
        border-color: white;
    }

    [data-bs-theme="dark"] .racing-btn-outline:hover {
        background: white;
        color: #171717;
    }

    /* DECORATIONS */
    .race-decoration {
        position: absolute;
        z-index: 2;
        pointer-events: none;
    }

    .flag-left {
        top: 120px;
        left: 4%;
        width: 95px;
        transform: rotate(-12deg);
    }

    .flag-right {
        top: 135px;
        right: 4%;
        width: 95px;
        transform: rotate(12deg) scaleX(-1);
    }

    .tire-left {
        left: 3%;
        bottom: 115px;
        width: 85px;
        transform: rotate(-25deg);
        opacity: .75;
    }

    .tire-right {
        right: 4%;
        bottom: 145px;
        width: 85px;
        transform: rotate(25deg);
        opacity: .75;
    }

    /* RACE TRACK */
    .race-area {
        position: absolute;
        left: 5%;
        right: 5%;
        bottom: 40px;
        height: 210px;
        z-index: 5;
        pointer-events: none;
    }

    .race-path {
        position: absolute;
        inset: 0;
        border: 3px dashed rgba(37, 37, 37, .35);
        border-radius: 50%;
        transform: rotate(-4deg);
    }

    .race-path-inner {
        position: absolute;
        inset: 24px 45px;
        border: 2px dashed rgba(214, 40, 40, .3);
        border-radius: 50%;
        transform: rotate(5deg);
    }

    [data-bs-theme="dark"] .race-path {
        border-color: rgba(255, 255, 255, .25);
    }

    [data-bs-theme="dark"] .race-path-inner {
        border-color: rgba(255, 196, 0, .3);
    }

    /* MCQUEEN */
    .mcqueen-wrapper {
        position: absolute;
        left: 0;
        top: 0;
        width: 100px;
        height: 130px;
        z-index: 15;
        pointer-events: none;
    }

    .mcqueen {
        position: absolute;
        left: 50%;
        top: 50%;
        width: 82px;
        height: auto;
        object-fit: contain;
        filter: drop-shadow(0 8px 6px rgba(0,0,0,.18));
        transform-origin: center center;
    }

    /* SMOKE */
    .smoke {
        position: absolute;
        width: 60px;
        opacity: .5;
        z-index: 8;
        pointer-events: none;
    }

    /* TIRE TRAIL */
    .tire-trail {
        position: absolute;
        inset: 0;
        z-index: 7;
        pointer-events: none;
        overflow: hidden;
    }

    .tire-mark-moving {
        position: absolute;
        width: 58px;
        height: auto;
        opacity: 0;
        transform-origin: center center;
        filter: blur(.2px);
        transition:
            opacity 1.4s ease,
            transform .12s linear;
    }

    /* FEATURES */
    .features-section {
        position: relative;
        padding: 95px 24px 110px;
        background:
            linear-gradient(
                180deg,
                #f8d7d7 0%,
                #fffafa 18%,
                #f8f8f6 100%
            );
        transition: background .35s ease;
    }

    [data-bs-theme="dark"] .features-section {
        background:
            linear-gradient(
                180deg,
                #501919 0%,
                #241717 20%,
                #171717 100%
            );
    }

    .features-title {
        margin-bottom: 12px;
        color: var(--racing-black);
        font-size: 34px;
        font-weight: 1000;
        letter-spacing: -1px;
        text-align: center;
    }

    [data-bs-theme="dark"] .features-title {
        color: white;
    }

    .features-subtitle {
        max-width: 600px;
        margin: 0 auto 50px;
        color: #666;
        text-align: center;
        line-height: 1.7;
    }

    [data-bs-theme="dark"] .features-subtitle {
        color: #bdbdbd;
    }

    /* FEATURE CARDS */
    .feature-card {
        position: relative;
        height: 100%;
        padding: 30px;
        background: rgba(255, 255, 255, .9);
        border: 1px solid #ddd;
        transition:
            transform .25s ease,
            box-shadow .25s ease,
            background .25s ease;
    }

    .feature-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: var(--racing-red);
    }

    .feature-card:hover {
        transform: translateY(-6px);
        box-shadow:
            0 18px 35px rgba(0,0,0,.10);
    }

    [data-bs-theme="dark"] .feature-card {
        background: #242424;
        border-color: #3d3d3d;
    }

    [data-bs-theme="dark"] .feature-card:hover {
        box-shadow:
            0 18px 35px rgba(0,0,0,.35);
    }

    .feature-number {
        margin-bottom: 12px;
        color: var(--racing-red);
        font-size: 13px;
        font-weight: 900;
        letter-spacing: 2px;
    }

    .feature-card h3 {
        margin-bottom: 12px;
        color: var(--racing-black);
        font-size: 23px;
        font-weight: 900;
    }

    [data-bs-theme="dark"] .feature-card h3 {
        color: white;
    }

    .feature-card p {
        margin: 0;
        color: #666;
        line-height: 1.75;
    }

    [data-bs-theme="dark"] .feature-card p {
        color: #bdbdbd;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .racing-hero {
            min-height: 720px;
        }

        .hero-content {
            padding-top: 105px;
        }

        .hero-title {
            font-size: 55px;
        }

        .hero-description {
            font-size: 14px;
        }

        .flag-left,
        .flag-right {
            width: 65px;
        }

        .tire-left,
        .tire-right {
            width: 60px;
        }

        .race-area {
            left: 3%;
            right: 3%;
            bottom: 35px;
        }

        .feature-card {
            padding: 25px;
        }
    }

    @media (max-width: 480px) {
        .hero-buttons {
            flex-direction: column;
            align-items: center;
        }

        .racing-btn {
            width: 200px;
        }

        .hero-title {
            font-size: 45px;
            letter-spacing: -2px;
        }
    }
</style>

<div class="racing-page">

    {{-- HERO --}}
    <section class="racing-hero">

        <div class="checker-strip"></div>

        {{-- Decorative flags --}}
        <img
            src="{{ asset('assets/images/racing/flag.png') }}"
            class="race-decoration flag-left"
            alt=""
        >

        <img
            src="{{ asset('assets/images/racing/flag.png') }}"
            class="race-decoration flag-right"
            alt=""
        >

        {{-- Decorative tires --}}
        <img
            src="{{ asset('assets/images/racing/tire-mark.png') }}"
            class="race-decoration tire-left"
            alt=""
        >

        <img
            src="{{ asset('assets/images/racing/tire-mark.png') }}"
            class="race-decoration tire-right"
            alt=""
        >

        {{-- HERO TEXT --}}
        <div class="hero-content">

            <div class="hero-badge">
                Sistem Parkir Alvira!
            </div>

            <h1 class="hero-title">
                READY
                <span class="red">SET</span>
                <span class="yellow">PARK!</span>
            </h1>

            <p class="hero-description">
                Kelola tarif, member, area parkir, dan transaksi
                dalam satu sistem yang praktis dan terorganisir.
                Satu tempat untuk membantu membuat pengelolaan
                parkir menjadi lebih cepat, sederhana, dan efisien.
            </p>

            <div class="hero-buttons">

                <a href="{{ route('login') }}"
                   class="racing-btn racing-btn-primary">
                    LOGIN
                </a>

                <a href="{{ route('register') }}"
                   class="racing-btn racing-btn-outline">
                    REGISTER
                </a>

            </div>

        </div>

        {{-- RACE TRACK --}}
        <div class="race-area">

            <div class="race-path"></div>

            <div class="race-path-inner"></div>

            {{-- McQueen --}}
            <div class="mcqueen-wrapper" id="mcqueenWrapper">

                <img
                    src="{{ asset('assets/images/racing/mcqueenatas.png') }}"
                    id="mcqueenAtas"
                    class="mcqueen"
                    alt="Racing car"
                >

            </div>

            {{-- Tire Trail --}}
            <div
                class="tire-trail"
                id="tireTrail">
            </div>

            {{-- Smoke --}}
            <img
                src="{{ asset('assets/images/racing/smoke.png') }}"
                class="smoke"
                id="smoke"
                alt=""
            >

        </div>

    </section>

    {{-- FEATURES --}}
    <section class="features-section">

        <h2 class="features-title">
            PARKING FEATURES
        </h2>

        <p class="features-subtitle">
            Semua kebutuhan pengelolaan parkir dalam satu sistem
            yang sederhana, terstruktur, dan mudah digunakan.
        </p>

        <div class="container">

            <div class="row g-4">

                {{-- Tarif --}}
                <div class="col-md-4">

                    <div class="feature-card">

                        <div class="feature-number">
                            01 / TARIF
                        </div>

                        <h3>
                            Pengelolaan Tarif Parkir
                        </h3>

                        <p>
                            Atur dan kelola tarif parkir berdasarkan
                            jenis kendaraan secara lebih mudah,
                            terstruktur, dan fleksibel.
                        </p>

                    </div>

                </div>

                {{-- Area --}}
                <div class="col-md-4">

                    <div class="feature-card">

                        <div class="feature-number">
                            02 / AREA
                        </div>

                        <h3>
                            Area Parkir Terorganisir
                        </h3>

                        <p>
                            Kelola area parkir agar informasi lokasi
                            dan ketersediaan tempat dapat dicatat
                            dengan lebih rapi dan terorganisir.
                        </p>

                    </div>

                </div>

                {{-- Transaksi --}}
                <div class="col-md-4">

                    <div class="feature-card">

                        <div class="feature-number">
                            03 / TRANSAKSI
                        </div>

                        <h3>
                            Pencatatan Transaksi
                        </h3>

                        <p>
                            Catat aktivitas kendaraan dan transaksi
                            parkir dalam satu sistem sehingga data
                            lebih mudah dikelola dan dipantau.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

{{-- MCQUEEN MOVEMENT --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {

        const wrapper = document.getElementById("mcqueenWrapper");
        const car = document.getElementById("mcqueenAtas");
        const smoke = document.getElementById("smoke");
        const tireTrail = document.getElementById("tireTrail");

        if (!wrapper || !car || !tireTrail) return;

        const area = wrapper.parentElement;

        let progress = 0.5;

        let lane = 0;

        let lastTireX = null;
        let lastTireY = null;
        let lastDirection = null;

        /*
         * Easing supaya perpindahan jalur
         * terasa lebih halus.
         */
        function easeInOut(value) {

            return value * value * (3 - 2 * value);

        }

        /*
         * Mengambil posisi mobil.
         *
         * lane = 0
         * jalur luar
         *
         * lane = 1
         * jalur dalam
         */
        function getPoint(angle, laneValue, width, height) {

            const centerX = width / 2;
            const centerY = height / 2;

            const outerRadiusX = width / 2 - 2;
            const outerRadiusY = height / 2 - 2;

            const innerRadiusX = width / 2 - 46;
            const innerRadiusY = height / 2 - 25;

            const outerRotation = -4 * Math.PI / 180;
            const innerRotation = 5 * Math.PI / 180;

            const radiusX =
                outerRadiusX +
                (innerRadiusX - outerRadiusX) * laneValue;

            const radiusY =
                outerRadiusY +
                (innerRadiusY - outerRadiusY) * laneValue;

            const rotation =
                outerRotation +
                (innerRotation - outerRotation) * laneValue;

            const ellipseX =
                Math.cos(angle) * radiusX;

            const ellipseY =
                Math.sin(angle) * radiusY;

            return {
                x:
                    centerX +
                    ellipseX * Math.cos(rotation) -
                    ellipseY * Math.sin(rotation),

                y:
                    centerY +
                    ellipseX * Math.sin(rotation) +
                    ellipseY * Math.cos(rotation)
            };

        }

        /*
         * Membuat jejak ban yang mengikuti
         * arah mobil secara halus.
         */
        function addTireMark(x, y, direction) {

            const mark = document.createElement("img");

            mark.src =
                "{{ asset('assets/images/racing/bekasban.png') }}";

            mark.className = "tire-mark-moving";

            mark.style.left =
                `${x - 29}px`;

            mark.style.top =
                `${y - 29}px`;

            /*
             * Bekas ban aslinya vertikal.
             * Sudutnya mengikuti arah mobil.
             */
            mark.style.transform =
                `rotate(${direction + 90}deg)`;

            tireTrail.appendChild(mark);

            requestAnimationFrame(function () {

                mark.style.opacity = ".32";

            });

            setTimeout(function () {

                mark.style.opacity = "0";

            }, 700);

            setTimeout(function () {

                mark.remove();

            }, 1800);

        }

        function animateCar() {

            progress += 0.0015;

            /*
             * Setiap satu putaran,
             * pindah jalur luar <-> dalam.
             */
            if (progress >= 1.5) {

                progress = 0.5;

                lane = lane === 0 ? 1 : 0;

            }

            const width = area.clientWidth;
            const height = area.clientHeight;

            /*
             * Progress dalam satu putaran.
             */
            const lapProgress =
                progress - 0.5;

            /*
             * Saat masuk putaran baru,
             * mobil berpindah jalur secara perlahan.
             */
            let laneValue = lane;

            if (lapProgress < 0.18) {

                const transition =
                    lapProgress / 0.18;

                const smooth =
                    easeInOut(transition);

                /*
                 * Kalau masuk jalur dalam:
                 * 0 -> 1
                 *
                 * Kalau kembali ke luar:
                 * 1 -> 0
                 */
                if (lane === 1) {

                    laneValue = smooth;

                } else {

                    laneValue = 1 - smooth;

                }

            }

            const angle =
                progress * Math.PI * 2;

            const current =
                getPoint(
                    angle,
                    laneValue,
                    width,
                    height
                );

            /*
             * Titik sedikit di depan mobil.
             *
             * Jarak kecil membuat perubahan
             * arah ketika belok lebih halus.
             */
            const nextAngle =
                angle + 0.008;

            const next =
                getPoint(
                    nextAngle,
                    laneValue,
                    width,
                    height
                );

            /*
             * Arah mobil.
             */
            const direction =
                Math.atan2(
                    next.y - current.y,
                    next.x - current.x
                ) * 180 / Math.PI;

            /*
             * Posisi wrapper.
             */
            const x =
                current.x - 50;

            const y =
                current.y - 65;

            wrapper.style.transform =
                `translate(${x}px, ${y}px)`;

            /*
             * McQueen top-view menghadap ke bawah
             * pada gambar asli.
             */
            car.style.transform =
                `translate(-50%, -50%) rotate(${direction - 90}deg)`;

            /*
             * SMOKE
             *
             * Diletakkan sedikit di belakang mobil.
             */
            const directionRad =
                direction * Math.PI / 180;

            const smokeDistance = 38;

            const smokeX =
                current.x -
                Math.cos(directionRad) *
                smokeDistance;

            const smokeY =
                current.y -
                Math.sin(directionRad) *
                smokeDistance;

            smoke.style.left =
                `${smokeX - 30}px`;

            smoke.style.top =
                `${smokeY - 30}px`;

            /*
             * JEJAK BAN
             *
             * Tidak dibuat setiap frame.
             * Hanya dibuat kalau mobil sudah
             * bergerak cukup jauh.
             */
            if (
                lastTireX === null ||
                Math.hypot(
                    current.x - lastTireX,
                    current.y - lastTireY
                ) > 13
            ) {

                /*
                 * Interpolasi arah supaya
                 * perubahan sudut bekas ban
                 * tidak patah ketika mobil belok.
                 */
                let smoothDirection =
                    direction;

                if (lastDirection !== null) {

                    let difference =
                        direction -
                        lastDirection;

                    while (difference > 180) {
                        difference -= 360;
                    }

                    while (difference < -180) {
                        difference += 360;
                    }

                    smoothDirection =
                        lastDirection +
                        difference * 0.35;

                }

                addTireMark(
                    current.x,
                    current.y,
                    smoothDirection
                );

                lastTireX =
                    current.x;

                lastTireY =
                    current.y;

                lastDirection =
                    smoothDirection;

            }

            requestAnimationFrame(
                animateCar
            );

        }

        animateCar();

    });
</script>

@endsection
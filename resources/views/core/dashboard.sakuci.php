@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<style>
    .dashboard-page {
        padding: 30px;
    }

    .dashboard-card {
        background: white;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        max-width: 900px;
        margin: 0 auto;
    }

    .dashboard-card h2 {
        margin: 0 0 10px;
        color: #2f4858;
        font-weight: 700;
    }

    .dashboard-card p {
        color: #6b7280;
        margin-bottom: 25px;
    }

    .dashboard-logout {
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 9px;
        padding: 10px 20px;
        font-weight: 600;
        cursor: pointer;
    }

    .dashboard-logout:hover {
        opacity: 0.9;
    }

    body.dark-mode .dashboard-card {
        background: #1f2933;
    }

    body.dark-mode .dashboard-card h2 {
        color: #e7edf0;
    }

    body.dark-mode .dashboard-card p {
        color: #aeb9c0;
    }
</style>

<div class="dashboard-page">

    <div class="dashboard-card">

        <h2>
            Halo, {{ $user->username }}!
        </h2>

        <p>
            Selamat datang di dashboard.
        </p>

        <form
            action="{{ route('logout') }}"
            method="POST"
            onsubmit="return confirm('Yakin ingin logout?');"
        >
            @csrf

            <button
                type="submit"
                class="dashboard-logout"
            >
                Logout
            </button>
        </form>

    </div>

</div>

@endsection
@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Perpustakaan - Admin</a>
        <div class="d-flex">
            <span class="navbar-text text-white me-3">
                {{ Auth::user()->username }}
            </span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2>Dashboard Admin</h2>
    <p>Selamat datang, Admin!</p>
    
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Kelola Buku</h5>
                    <p class="card-text">CRUD data buku perpustakaan</p>
                    <a href="#" class="btn btn-light">Kelola</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Transaksi</h5>
                    <p class="card-text">Histori peminjaman buku</p>
                    <a href="#" class="btn btn-light">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Kelola Anggota</h5>
                    <p class="card-text">CRUD data anggota</p>
                    <a href="#" class="btn btn-light">Kelola</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
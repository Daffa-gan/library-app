@extends('layouts.app')

@section('title', 'Siswa Dashboard')

@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Perpustakaan - Siswa</a>
        <div class="d-flex">
            <span class="navbar-text text-white me-3">
                {{ Auth::user()->anggota->nama }}
            </span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2>Dashboard Siswa</h2>
    <p>Selamat datang, {{ Auth::user()->anggota->nama }}!</p>
    
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Peminjaman Buku</h5>
                    <p class="card-text">Pinjam buku dari perpustakaan</p>
                    <a href="#" class="btn btn-primary">Pinjam Buku</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pengembalian Buku</h5>
                    <p class="card-text">Kembalikan buku yang dipinjam</p>
                    <a href="#" class="btn btn-success">Kembalikan Buku</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
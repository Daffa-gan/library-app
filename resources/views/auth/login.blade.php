@extends('layouts.app')

@section('title', 'Login - Perpustakaan')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Login Perpustakaan Digital</h3>
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first() }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" value="{{ old('username') }}" required autofocus>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
                        
                        <div class="text-center">
                            <p class="mb-0">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Info Login -->
            <div class="card mt-3">
                <div class="card-body">
                    <small class="text-muted">
                        <strong>Demo Account:</strong><br>
                        Admin: username=<code>admin</code>, password=<code>admin123</code><br>
                        Siswa: username=<code>budi</code>, password=<code>budi123</code>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
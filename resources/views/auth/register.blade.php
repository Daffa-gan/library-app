@extends('layouts.app')

@section('title', 'Daftar Anggota - Perpustakaan')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4">Daftar Anggota Perpustakaan</h3>
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">NIS <span class="text-danger">*</span></label>
                                <input type="number" name="nis" class="form-control" value="{{ old('nis') }}" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kelas <span class="text-danger">*</span></label>
                                <input type="text" name="kelas" class="form-control" placeholder="12 RPL 1" value="{{ old('kelas') }}" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jurusan <span class="text-danger">*</span></label>
                                <select name="jurusan" class="form-select" required>
                                    <option value="">Pilih Jurusan</option>
                                    <option value="rpl" {{ old('jurusan') == 'rpl' ? 'selected' : '' }}>RPL (Rekayasa Perangkat Lunak)</option>
                                    <option value="tkj" {{ old('jurusan') == 'tkj' ? 'selected' : '' }}>TKJ (Teknik Komputer Jaringan)</option>
                                    <option value="tr" {{ old('jurusan') == 'tr' ? 'selected' : '' }}>TR (Teknik Refrigerasi)</option>
                                    <option value="tja" {{ old('jurusan') == 'tja' ? 'selected' : '' }}>TJA (Teknik Jaringan Akses)</option>
                                </select>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="mb-3">
                            <label class="form-label">Username <span class="text-danger">*</span></label>
                            <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" required>
                            <small class="text-muted">Minimal 6 karakter</small>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 mb-3">Daftar</button>
                        
                        <div class="text-center">
                            <p class="mb-0">Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
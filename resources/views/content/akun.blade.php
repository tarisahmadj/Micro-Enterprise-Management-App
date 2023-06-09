@extends('layouts/main')

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Edit Akun Anda</h3>
        </div>
        <div class="col-12 col-xl-4">
          <div class="justify-content-end d-flex">
          <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
            <button class="btn btn-sm btn-light bg-white" type="button" disabled>
              {{ $tgl }}
            </button>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <div class="d-flex">
      <svg aria-hidden="true" class="ml-2 mt-1" style="width: 25px; height: 25px;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
      <p class="ml-2 mt-2 font-weight-bold">{{ session('success') }}</p>
    </div>
    <button type="button" class="close mt-2" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="card p-4">
        <div class="card-body">
          <form action="/akun/{{ $akun->id }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="name">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $akun->name) }}" required>
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              {{-- Jika user maka input nis --}}
              {{-- <div class="form-group col-md-6">
                <label for="nis">NIS</label>
                <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" id="nis" value="{{ old('nis', $akun->nis) }}" required>
                @error('nis')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div> --}}
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email', $akun->email) }}" required>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="alert alert-warning" role="alert">
              Isi kolom password jika anda ingin mengubahnya.
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="hidden" name="oldPassword" value="{{ $akun->password }}">
              <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" aria-describedby="passwordHelpBlock">
              <small id="passwordHelpBlock" class="form-text text-muted">
                Password harus berisi minimal 6 karakter, memiliki huruf dan angka, dan tidak boleh menggunakan simbol, atau emoji.
              </small>
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <a href="/dashboard" class="btn btn-primary">Kembali</a>
            <button type="submit" class="btn btn-success">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
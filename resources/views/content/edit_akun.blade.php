@extends('layouts/main')

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Buat akun baru</h3>
        </div>
      </div>
    </div>
  </div>
  @if (@$ket)
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <div class="d-flex">
      <svg aria-hidden="true" class="ml-2 mt-1" style="width: 25px; height: 25px;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
      <p class="ml-2 mt-2 font-weight-bold">{{ @$ket }}</p>
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
          <form method="POST" action="/akun/{{ $data->id }}">
            @method('put')
            @csrf
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ $data->name }}">
              @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ $data->email }}" readonly>
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="d-flex">
              <svg aria-hidden="true" class="ml-2 mt-1" style="width: 25px; height: 25px;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
              <p class="ml-2 mt-2 font-weight-bold">Masukan Password baru untuk ubah atau masukan password lama untuk tetap menggunakan password</p>
            </div>
            <button type="button" class="close mt-2" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="form-group">
              <label for="password">password</label>
              <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required value="{{ old('password') }}">
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password2">Konfirmasi Password</label>
              <input type="text" class="form-control @error('password2') is-invalid @enderror" id="password2" name="password2" required value="{{ old('password2') }}">
              @error('password2')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="role_id">Role</label>
              <select class="form-control @error('role') is-invalid @enderror" id="role_id" name="role_id" required value="{{ $data->role_id }}">
                @if($data->role_id == '')
                <option selected>pilih role</option>
                <option value="1">Super Admin</option>
                <option value="2">Admin Dinas</option>
                <option value="3">Admin Desa</option>
                @elseif($data->role_id == 1)
                <option>pilih role</option>
                <option value="1" selected>Super Admin</option>
                <option value="2">Admin Dinas</option>
                <option value="3">Admin Desa</option>
                @elseif($data->role_id == 2)
                <option>pilih role</option>
                <option value="1">Super Admin</option>
                <option value="2" selected>Admin Dinas</option>
                <option value="3">Admin Desa</option>
                @elseif($data->role_id == 3)
                <option>pilih role</option>
                <option value="1">Super Admin</option>
                <option value="2" selected>Admin Dinas</option>
                <option value="3">Admin Desa</option>
                @endif
              </select>
              @error('role')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mt-3">
              <button type="submit" class="btn btn-success">Simpan</button>
              <a href="/akun" type="submit" class="btn btn-primary">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
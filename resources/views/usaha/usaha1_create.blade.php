@extends('layouts/main')

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Tambah Ruang Kelas</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="card p-4">
        <div class="card-body">
          <form method="POST" action="/usaha1">
            @csrf
            <div class="form-group">
              <label for="usaha1">Ruang usaha1</label>
              <input type="text" class="form-control @error('usaha1') is-invalid @enderror" id="usaha1" name="usaha1" required value="{{ old('usaha1') }}">
              @error('kelas')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="jml_siswa">Jumlah Maksimal Siswa</label>
              <input type="number" class="form-control @error('jml_siswa') is-invalid @enderror" id="jml_siswa" name="jml_siswa" required value="{{ old('jml_siswa') }}">
              @error('jml_siswa')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mt-3">
              <a href="/ruang" class="btn btn-primary">Kembali</a>
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
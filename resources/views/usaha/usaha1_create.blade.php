@extends('layouts/main')

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Tambah usaha</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="card p-4">
        <div class="card-body">
          <form method="POST" action="/usaha">
            @csrf
            <div class="form-group">
              <label for="usaha_berjalan">Usaha</label>
              <input type="text" class="form-control @error('usaha_berjalan') is-invalid @enderror" id="usaha_berjalan" name="usaha_berjalan" required value="{{ old('usaha_berjalan') }}">
              @error('usaha_berjalan')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="average_omset">Omset Rata Rata</label>
              <input type="number" class="form-control @error('average_omset') is-invalid @enderror" id="average_omset" name="average_omset" required value="{{ old('average_omset') }}">
              @error('average_omset')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="modal_usaha">Modal Usaha</label>
              <input type="number" class="form-control @error('modal_usaha') is-invalid @enderror" id="modal_usaha" name="modal_usaha" required value="{{ old('modal_usaha') }}">
              @error('modal_usaha')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mt-3">
              <a href="/usaha" class="btn btn-primary">Kembali</a>
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
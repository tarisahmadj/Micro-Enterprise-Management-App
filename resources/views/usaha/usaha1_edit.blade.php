@extends('layouts/main')

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Edit Usaha yang Ada</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="card">
        <div class="card-body m-3">
          <form method="POST" action="/usaha/{{ $usaha->id }}">
            @method('put')
            @csrf
            <div class="form-group">
              <label for="usaha_berjalan">Usaha</label>
              <input type="text" class="form-control @error('usaha_berjalan') is-invalid @enderror" id="usaha_berjalan" name="usaha_berjalan" required value="{{ old('usaha_berjalan',$usaha->usaha_berjalan) }}">
              @error('usaha_berjalan')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="average_omset">Omset Rata Rata</label>
              <input type="number" class="form-control @error('average_omset') is-invalid @enderror" id="average_omset" name="average_omset" required value="{{ old('average_omset', $usaha->average_omset) }}">
              @error('average_omset')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="modal_usaha">Modal Usaha</label>
              <input type="number" class="form-control @error('modal_usaha') is-invalid @enderror" id="modal_usaha" name="modal_usaha" required value="{{ old('modal_usaha', $usaha->modal_usaha) }}">
              @error('modal_usaha')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <a href="/usaha" type="submit" class="btn btn-primary">Kembali</a>
            <button type="submit" class="btn btn-warning">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
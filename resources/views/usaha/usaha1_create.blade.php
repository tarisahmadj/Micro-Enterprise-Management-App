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
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="kabupaten_id">Kabupaten</label>
                <select id="kabupaten_id" name="kabupaten_id" class="form-control" required>
                  <option selected hidden disabled>--Pilih Kabupaten--</option>
                  @foreach ($kabupaten as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_kabupaten }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="kecamatan_id">Kecamatan</label>
                <select id="kecamatan_id" name="kecamatan_id" class="form-control" required>
                  <option selected hidden disabled>--Pilih Kecamatan--</option>
                  @foreach ($kecamatan as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_kecamatan }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="desa_id">Kelurahan/Desa</label>
                <select id="desa_id" name="desa_id" class="form-control" required>
                  <option selected hidden disabled>--Pilih Kelurahan/Desa--</option>
                  @foreach ($kelurahan as $item)
                    <option value="{{ $item->id_desa }}">{{ $item->nama_desa }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="nama_bumdes">Nama Bumdes</label>
              <input type="text" class="form-control @error('nama_bumdes') is-invalid @enderror" id="nama_bumdes" name="nama_bumdes" required value="{{ old('nama_bumdes') }}">
              @error('nama_bumdes')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="unit_usaha_prioritas">Unit Usaha Prioritas</label>
              <input type="text" class="form-control @error('unit_usaha_prioritas') is-invalid @enderror" id="unit_usaha_prioritas" name="unit_usaha_prioritas" required value="{{ old('unit_usaha_prioritas') }}">
              @error('unit_usaha_prioritas')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            @cannot('user')
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="2">Berjalan</option>
                    <!-- <option value="2">Mengusulkan</option> -->
                    <option value="3">Ditolak</option>
                </select>
            </div>
            @endcannot
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
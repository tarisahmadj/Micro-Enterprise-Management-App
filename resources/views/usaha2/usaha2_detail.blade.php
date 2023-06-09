@extends('layouts/main')

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Detail usulan usaha</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="card p-4">
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <h4 class="mb-3">Scan Surat</h4>
              <img src="../../custom/{{ @$usaha->scan_surat  }}" alt="Scan Surat" name="scan_surat" class="mw-100 rounded">
            </div>
            <div class="col-md-8">
              <h4 class="mb-3">Detail usulan</h4>
              <div class="d-flex flex-column">
                <p>Usulan usaha : {{ $usaha->usaha_usulan }}</p>
                <p>Permasalahan usaha sebelum : {{ $usaha->permasalahan_usaha_sebelum }}</p>
                <p>Kabupaten : {{ $usaha->kabupaten->nama_kabupaten }}</p>
                <p>Kecamatan : {{ $usaha->kecamatan->nama_kecamatan }}</p>
                <p>Kelurahan/Desa : {{ $usaha->kelurahan->nama_desa }}</p>
                <a href="/files/download/{{ $usaha->id}}">Download Scan Surat</a>
              </div>
            </div>
          </div>
          <div class="mt-4">
            <a href="/usulusaha" class="btn btn-primary">Kembali</a>
            <!-- <button type="submit" class="btn btn-success">Simpan</button> -->
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
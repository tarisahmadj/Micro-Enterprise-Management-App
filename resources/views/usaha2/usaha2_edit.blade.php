@extends('layouts/main')

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Edit Usulan Usaha</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="card p-4">
        <div class="card-body">
          <form method="POST" action="/usulusaha/{{ $usaha->ID }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="kabupaten_id">Kabupaten</label>
                <select id="kabupaten_id" name="kabupaten_id" class="form-control" required>
                  <option selected hidden value="{{ $usaha->kabupaten_id }}">{{ $usaha->kabupaten->nama_kabupaten }}</option>
                  @foreach ($kabupaten as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_kabupaten }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="kecamatan_id">Kecamatan</label>
                <select id="kecamatan_id" name="kecamatan_id" class="form-control" required>
                  <option selected hidden value="{{ $usaha->kecamatan_id }}">{{ $usaha->kecamatan->nama_kecamatan }}</option>
                  @foreach ($kecamatan as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_kecamatan }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="desa_id">Kelurahan/Desa</label>
                <select id="desa_id" name="desa_id" class="form-control" required>
                  <option selected hidden value="{{ $usaha->desa_id }}">{{ $usaha->kelurahan->nama_desa }}</option>
                  @foreach ($kelurahan as $item)
                    <option value="{{ $item->id_desa }}">{{ $item->nama_desa }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="usaha_usulan">Usaha Usulan</label>
              <input type="text" class="form-control @error('usaha_usulan') is-invalid @enderror" id="usaha_usulan" name="usaha_usulan" required value="{{ old('usaha_usulan',@$usaha->usaha_usulan) }}">
              @error('usaha_usulan')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="row">
              <div class="col-5">
                <div class="custom-file form-group">
                  <input type="hidden" name="oldScan" value="{{ $usaha->scan_surat }}">
                  <input type="file" class="custom-file-input @error('scan_surat') is-invalid @enderror" id="scan_surat" name="scan_surat">
                  <label class="custom-file-label" for="scan_surat">Scan Surat</label>
                  @error('scan_surat')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                {{-- <div class="form-group">
                  <label for="scan_surat"> Scan Surat</label>
                  <input type="file" class="form-control @error('scan_surat') is-invalid @enderror" id="scan_surat" name="scan_surat" value="{{ old('scan_surat',@$usaha->scan_surat) }}">
                  @error('scan_surat')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div> --}}
              </div>
              <div class="col-7">
                <label for="scan_surat1"> Scan Surat Lalu</label><br>
                <img src="../../custom/{{ @$usaha->scan_surat  }}" alt="Scan Surat" class="w-75 rounded">
              </div>
            </div>
            <div class="form-group">
              <label for="permasalahan_usaha_sebelum">Permasalahan usaha sebelum</label>
              <input type="text" class="form-control @error('permasalahan_usaha_sebelum') is-invalid @enderror" id="permasalahan_usaha_sebelum" name="permasalahan_usaha_sebelum" required value="{{ old('permasalahan_usaha_sebelum',@$usaha->permasalahan_usaha_sebelum) }}">
              @error('permasalahan_usaha_sebelum')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mt-3">
              <a href="/usulusaha" class="btn btn-primary">Kembali</a>
              <button type="submit" class="btn btn-warning">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@extends('layouts/main')

@section('content')
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Hai, {{ auth()->user()->name }}!</h3>
            <h6 class="font-weight-normal mb-0">Selamat datang di aplikasi arsip digital. Anda sekarang adalah 
              @if (auth()->user()->role_id == 1)
                <span class="text-primary">admin!</span>
              @elseif ($user->role_id == 2)
                <span class="text-primary">super admin!</span>
              @else
                <span class="text-primary">user!</span>
              @endif
            </h6>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 grid-margin transparent">
        <div class="row">
          <div class="col-lg-6 stretch-card transparent">
            <div class="card card-tale mr-4">
              <div class="card-body">
                <p class="mb-4">Dokumen Arsip</p>
                {{-- <p class="fs-30 mb-2">{{ $jmlDokumen }}</p> --}}
                {{-- <p>+{{ $dokumen30 }} dokumen (Bulan ini)</p> --}}
              </div>
            </div>
            <div class="card card-dark-blue mr-4">
              <div class="card-body">
                <p class="mb-4">Kategori Dokumen</p>
                {{-- <p class="fs-30 mb-2">{{ $jmlKategori }} Kategori</p> --}}
              </div>
            </div>
            <div class="card card-light-blue mr-4">
              <div class="card-body">
                <p class="mb-4">Terakhir Backup Database</p>
                {{-- <p class="fs-30 mb-2">{{ $backup->created_at->format('d M Y') }}</p> --}}
                {{-- @if ($backupnext == 'no')
                  <p>Next: Tidak Terjadwal!</p>
                @else
                  <p>Next: {{ $backupnext->format('d M Y') }}</p>
                @endif --}}
              </div>
            </div>
            <div class="card card-light-danger">
              <div class="card-body">
                <p class="mb-4">Total Download</p>
                {{-- <p class="fs-30 mb-2">{{ $jmlDownload }}</p> --}}
                {{-- <p>+{{ $download30 }} (Bulan ini)</p> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <p class="card-title mb-3 ml-2">Baru - baru ini didownload</p>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Dokumen</th>
                    <th>Tanggal Download</th>
                    <th>Didownload oleh</th>
                    <th>Keperluan</th>
                  </tr>  
                </thead>
                <tbody>
                  {{-- @foreach ($download as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->dokumen->nama }}</td>
                      <td>{{ $item->created_at->format('d M Y') }}</td>
                      <td class="font-weight-bold">{{ $item->user->name }}</td>
                      <td>{{ $item->keperluan }}</td>
                    </tr>
                  @endforeach --}}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
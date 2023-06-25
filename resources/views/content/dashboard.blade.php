@extends('layouts/main')

@section('content')
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Hai, {{ auth()->user()->name }}!</h3>
            <h6 class="font-weight-normal mb-0">Selamat datang di aplikasi bumdes. Anda sekarang adalah 
              @if (auth()->user()->role_id == 1)
                <span class="text-primary">super admin!</span>
              @elseif (auth()->user()->role_id == 2)
                <span class="text-primary">admin dinas!</span>
              @elseif (auth()->user()->role_id == 3)
                <span class="text-primary">admin desa!</span>
              @endif
            </h6>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 grid-margin transparent">
        <div class="row">
          <div class="col-lg-7 stretch-card transparent">
            <div class="card card-tale mr-4">
              <div class="card-body">
                <p class="mb-4">Usaha Berjalan</p>
                <p class="fs-30 mb-2">{{ $usaha1->count() }}</p>
                {{-- <p>+{{ $dokumen30 }} dokumen (Bulan ini)</p> --}}
              </div>
            </div>
            <div class="card card-dark-blue mr-4">
              <div class="card-body">
                <p class="mb-4">Usulan Usaha</p>
                <p class="fs-30 mb-2">{{ $usulan1->count() }} Usulan</p>
              </div>
            </div>
            <!-- <div class="card card-light-blue mr-4">
              <div class="card-body"> -->
                <!-- <p class="mb-4">Pariwisata</p>
                <p class="fs-30 mb-2"> $pariwisata </p> -->
                <!-- {{-- @if ($backupnext == 'no')
                  <p>Next: Tidak Terjadwal!</p>
                @else
                  <p>Next: {{ $backupnext->format('d M Y') }}</p>
                @endif --}} -->
              <!-- </div>
            </div> -->
            <div class="card card-light-danger">
              <div class="card-body">
                <p class="mb-4">Total User</p>
                <p class="fs-30 mb-2">{{ $user }}</p>
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
              <p class="card-title mb-3 ml-2">Pemeringkatan Bumdes</p>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Bumdes</th>
                    <th>Unit usaha prioritas</th>
                    {{-- <th></th> --}}
                  </tr>  
                </thead>
                <tbody>
                  <?php $x =1; $y =1; ?>
                  @if ($usaha->first() == null)
                    <tr>
                      <td colspan="4" class="text-center">Belum ada bumdes</td>
                    </tr>
                  @else
                    @foreach ($usaha as $item)
                      <tr>
                        <td>{{ $x++ }}</td>
                        <td class="font-weight-bold">{{ $item->nama_bumdes }}</td>
                        <td class="font-weight-bold">{{ $item->unit_usaha_prioritas }}</td>
                        {{-- <td>Rp. {{ number_format($item->average_omset, 0, ',', '.') }}</td> --}}
                        {{-- <td>Rp. {{ number_format($item->modal_usaha, 0, ',', '.') }}</td> --}}
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
              <style type="text/css">
                .pagination li{
                  float: left;
                  list-style-type: none;
                  margin:5px;
                }
              </style>
              {{ $usaha->links() }}
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
              <p class="card-title mb-3 ml-2">Baru - baru ini diusulkan</p>
              <a href="/usulusaha">Lihat semua usulan <i class="ti-arrow-right"></i></a>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Usulan Usaha</th>
                    <th>Permasalahan Usaha Sebelum</th>
                    <th>Status</th>
                  </tr>  
                </thead>
                <tbody>
                  @if ($usulan->first() == null)
                    <tr>
                      <td colspan="4" class="text-center">Belum ada usulan usaha</td>
                    </tr>
                  @else
                    @foreach ($usulan as $item)
                      <tr>
                        <td>{{ $y++ }}</td>
                        <td>{{ $item->usaha_usulan }}</td>
                        <td>{{ $item->permasalahan_usaha_sebelum }}</td>
                        @if ($item->status == 2)
                          <td>
                            <p class="badge badge-success">Disetujui</p>
                          </td>
                        @else
                          <td>
                            <p class="badge badge-warning">Mengusulkan</p>
                          </td>
                        @endif
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
              {{ $usulan->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@extends('layouts/main')

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Usulan Usaha</h3>
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
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="card p-4">
        <div class="card-body">
          <div class="d-flex justify-content-between mb-3">
            <a href="/usulusaha/create" class="btn btn-primary btn-sm mb-3 font-weight-bold my-auto"><i class="ti-plus mr-2"></i>Tambah Usulan Usaha</a>
            <!-- <form action="/searchUsulan" method="get">
              <input type="text" name="search" class="form-control" placeholder="Search Usulan..." aria-label="Search...">
            </form> -->
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
          
          @if (session()->has('deleted'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="d-flex">
              <svg aria-hidden="true" class="ml-2 mt-1" style="width: 25px; height: 25px;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
              <p class="ml-2 mt-2 font-weight-bold">{{ session('deleted') }}</p>
            </div>
            <button type="button" class="close mt-2" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif          
          <div class="table-responsive">
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Usulan Usaha</th>
                  <th scope="col">Scan Surat</th>
                  {{-- <th scope="col">Masalah Usaha Sebelumnya</th> --}}
                  <th scope="col">Status Usulan</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $x = 1;?>
                @if ($usaha->first() == null)
                  <tr>
                    <td colspan="6" class="text-center">Tidak ada usulan usaha</td>
                  </tr>
                @else
                  @foreach ($usaha as $item)
                    <tr>
                      <td>{{ $x++ }}</td>
                      <td>{{ $item->usaha_usulan }}</td>
                      <td>
                        <img src="../../custom/{{ $item->scan_surat }}" alt="scan-surat" width="100px" class="rounded">
                      </td>
                      {{-- <td>{{ $item->permasalahan_usaha_sebelum }}</td> --}}
                      <!-- <td>
                        
                        <?php //echo $item->status ?>
                      </td> -->
                      @if ($item->status == 2)
                        <td>
                          <p class="badge badge-success">Disetujui</p>
                        </td>
                      @elseif ($item->status == 1)
                        <td>
                          <p class="badge badge-warning">Mengusulkan</p>
                        </td>
                      @elseif ($item->status == 3)
                        <td>
                          <p class="badge badge-danger">Ditolak</p>
                        </td>
                      @endif
                      <td>
                        <a href="/usulusaha/{{ $item->ID }}" class="btn btn-info btn-sm"><i class="ti-eye"></i></a>
                        @cannot('user')
                            <a href="/verif/{{ $item->ID }}" class="btn btn-success btn-sm"><i class="ti-check"></i></a>
                            <a href="/tolak/{{ $item->ID }}" class="btn btn-dark btn-sm"><i class="ti-close"></i></a>
                            <a href="/usulusaha/{{ $item->ID }}/edit" class="btn btn-warning btn-sm"><i class="ti-pencil-alt"></i></a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal" onclick="handleDelete({{ $item->ID}})"><i class="ti-trash"></i></button>
                        @endcannot
                      </td>
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
          {{-- <div class="d-flex">
            <div class=" mt-3 mx-auto">

            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div>
          <button type="button" class="close mt-4 mr-5 justify-content-end " data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body d-flex flex-column ">
          <img src="../../template/images/warning.png" width="90px" class="mx-auto" alt="warning">
          <br>
          <h3 class="text-center text-muted">Anda yakin akan menghapus usulan ini?</h3>
        </div>
        <div class="modal-footer mx-auto mb-4">
          <form id="formDelete" method="POST">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Ya, hapus</button>
          </form>
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak, Kembali</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    function handleDelete(id){
      document.getElementById('formDelete').action = `/usulusaha/${id}`
    }
  </script>
@endsection
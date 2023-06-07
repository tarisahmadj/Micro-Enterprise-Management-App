@extends('landing_page/layout')
@section('contentLandingPage')
    {{-- Jumbotron --}}
    <div class="bg-image rounded-3 d-flex" style="
      background-image: url(../../template/images/banner.jpg);
      height: 626px;
      background-size: cover;
    ">
      <div class="container align-items-center my-auto">
        <h1 class="mb-3 font-weight-bold text-white">Aplikasi E-Bumdes <br> oleh Dispermades Grobogan</h1>
        <h4 class="mb-3 font-weight-normal text-white">Permudah pengelolaan wisata desa dengan aplikasi E-Bumdes</h4>
      </div>
    </div>
    {{-- End of Jumbotron --}}

  {{-- Section Pengenalan Bumdes --}}
  <div class="container py-5">
    <div class="row my-5">
      <div class="col-12">
        <h2 class="text-center font-weight-bold">Tentang E-Bumdes</h2>
      </div>
    </div>
    <div class="row my-5">
      <div class="col-6">
        <h2 class="font-weight-bold my-4">E-Bumdes</h2>
        <h4>Aplikasi yang digunakan untuk <span class="text-warning">pengelolaan wisata</span> pada seluruh Kabupaten Grobogan.</h4>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum est beatae magnam ea nihil ab ducimus similique atque veritatis illo. Sunt ratione voluptates sint. Sunt, eius voluptates inventore earum nobis adipisci labore facilis deleniti libero impedit eligendi veniam excepturi modi praesentium fugiat? Asperiores, corporis consequatur aliquam officia esse et blanditiis ratione eos, sequi modi nesciunt repellendus soluta pariatur, natus quo reprehenderit eveniet doloremque dolorum sint vitae assumenda necessitatibus. Quam aperiam eveniet rem eum suscipit mollitia.</p>
      </div>
      <div class="col-6 d-flex">
        <img src="../../template/images/carousel/banner_3.jpg" alt="gambar aplikasi" width="100%" class="mx-auto rounded">
      </div>
    </div>
  </div>
  {{-- End of Section Pengenalan Bumdes --}}

  {{-- Section Profil Dispermades --}}
  <div class="container py-5">
    <div class="row my-5">
      <div class="col-12">
        <h2 class="text-center font-weight-bold">Profil Dispermades Kabupaten Grobogan</h2>
      </div>
    </div>
    <div class="row my-5">
      <div class="col-6 d-flex">
        <img src="../../template/images/carousel/banner_3.jpg" alt="gambar sekolah" width="100%" class="mx-auto rounded">
      </div>
      <div class="col-6">
        <h3 class="font-weight-bold my-2">Dinas Pemberdayaan Masyarakat, Desa Kabupaten Grobogan</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum est beatae magnam ea nihil ab ducimus similique atque veritatis illo. Sunt ratione voluptates sint. Sunt, eius voluptates inventore earum nobis adipisci labore facilis deleniti libero impedit eligendi veniam excepturi modi praesentium fugiat? Asperiores, corporis consequatur aliquam officia esse et blanditiis ratione eos, sequi modi nesciunt repellendus soluta pariatur, natus quo reprehenderit eveniet doloremque dolorum sint vitae assumenda necessitatibus. Quam aperiam eveniet rem eum suscipit mollitia.</p>
      </div>
    </div>
  </div>
  {{-- End of Section Profil Dispermades --}}

  {{-- Section Wisata Kabupaten Grobogan --}}
  {{-- style="background-color: #E5E7EB;" --}}
  <section id="wisata">
    <div class="container py-5" id="#wisata">
      <div class="row my-5">
        <div class="col-12">
          <h2 class="text-center font-weight-bold">Wisata Desa di Kabupaten Grobogan</h2>
        </div>
      </div>
      <style type="text/css">
        .pagination li{
          float: left;
          list-style-type: none;
          margin:5px;
        }
	    </style>
      <div class="row my-5" style="display: flex;justify-content: space-between;">
      <?php $rs = \DB::table('pariwisatas')->paginate(6)?>
      @foreach ( $rs as $item)
        <div class="col-3 ">
          <div class="card p-4" style="width: 18rem; height: 18rem; margin: 10px; filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1));">
            <img src="../../template/images/{{ @$item->foto  }}" alt="Gambar Wisata" class="mw-100 rounded">
            <div class="mx-1">
              <h5 class="text-center font-weight-bold my-3">{{ @$item->wisata }} </h5>
              <p> Kelurahan : {{  \App\Models\Pariwisata::getKelurahan(@$item->kelurahan)  }}</p>
              <p> Kecamatan :{{  \App\Models\Pariwisata::getKecamatan(@$item->kecamatan)  }}</p>
            </div>
          </div>
        </div>
        @endforeach     
      
      </div>
      {{ $rs->links('pagination::bootstrap-4') }}
    </div>
    <!-- <div style = "margin : 5px;list-style-type: none;float: left;"> -->
    <!-- </div> -->
  </div>
  {{-- End of Section Wisata Kabupaten Grobogan --}}
  
@endsection
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

  {{-- Section 1 --}}
  <div class="container py-5">
    <div class="row my-5">
      <div class="col-6">
        <h1 class="font-weight-bolder my-4">E-Bumdes</h1>
        <h4>Aplikasi yang digunakan untuk <span class="text-warning">pengelolaan wisata</span> pada seluruh Kabupaten Grobogan.</h4>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum est beatae magnam ea nihil ab ducimus similique atque veritatis illo. Sunt ratione voluptates sint. Sunt, eius voluptates inventore earum nobis adipisci labore facilis deleniti libero impedit eligendi veniam excepturi modi praesentium fugiat? Asperiores, corporis consequatur aliquam officia esse et blanditiis ratione eos, sequi modi nesciunt repellendus soluta pariatur, natus quo reprehenderit eveniet doloremque dolorum sint vitae assumenda necessitatibus. Quam aperiam eveniet rem eum suscipit mollitia.</p>
      </div>
      <div class="col-6 d-flex">
        <img src="../../template/images/carousel/banner_3.jpg" alt="gambar sekolah" width="500px" class="mx-auto rounded">
      </div>
    </div>
  </div>
  {{-- End of Section 1 --}}

  {{-- Section 2 --}}
  <div class="bg-secondary">
    <div class="container py-5" id="#wisata">
      <div class="row my-5">
        <div class="col-12">
          <h2 class="text-center font-weight-bold">Wisata Desa di Kabupaten Grobogan</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-3">
          <div class="card py-4 px-3">
            <img src="../../template/images/banner.jpg" alt="Gambar Wisata" class="mw-100 rounded">
            <div class="mx-1">
              <h5 class="text-center font-weight-bold my-3">Desa Wisata</h5>
              <p>Kelurahan</p>
              <p>Kecamatan</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- End ofSection 2 --}}
  
@endsection
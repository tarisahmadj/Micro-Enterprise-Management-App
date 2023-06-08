<?php

namespace App\Http\Controllers;

use App\Models\pariwisata;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $pariwisata = pariwisata::with(['kelurahan', 'kecamatan'])->paginate(8);
        return view('landing_page/index', [
            'title' => 'Home',
            'pariwisata' => $pariwisata,
        ]);
    }
}

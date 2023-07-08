<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class UsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usaha = Usaha::with(['kecamatan', 'kelurahan', 'kabupaten'])->orderBy('updated_at','desc')->orderBy('nama_bumdes')->paginate(10);
        $tgl = date('l, d F Y');

        return view('usaha/usaha1', [
            'title' => 'Bumdes',
            'usaha' => $usaha,
            'tgl'   => $tgl,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kabupaten = Kabupaten::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();

        return view('usaha/usaha1_create', [
            'title' => 'Tambah Usaha',
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kabupaten_id' => 'required',
            'kecamatan_id' => 'required',
            'desa_id' => 'required',
            'nama_bumdes' => 'required',
            'unit_usaha_prioritas' => 'required',
            'status' => 'required',
        ]);

        Usaha::create($validatedData);

        return redirect('/usaha')->with('success', 'Bumdes baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    // public function show($id)
    // {
    //     $usaha = Usaha::where('id',$id)->first();
    //     return view('usaha/usaha1_detail', [
    //         'title' => 'usaha yang ada',
    //         'usaha' => $usaha,
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usaha = Usaha::with(['kecamatan', 'kelurahan', 'kabupaten'])->where('ID',$id)->first();
        $kabupaten = Kabupaten::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();

        return view('usaha/usaha1_edit', [
            'title' => 'Update Usaha',
            'usaha' => $usaha,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'kabupaten_id' => 'required',
            'kecamatan_id' => 'required',
            'desa_id' => 'required',
            'nama_bumdes' => 'required',
            'unit_usaha_prioritas' => 'required',
            'status' => 'required',
        ]);

        Usaha::where('ID', $id)->update($validatedData);

        return redirect('/usaha')->with('success', 'Bumdes berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Delete usaha
        Usaha::where('ID',$id)->delete($id);

        return redirect('/usaha')->with('deleted', 'Bumdes berhasil dihapus');
    }

    public function searchUsaha(Request $request){
        $keyword = $request->search;

        $usaha = Usaha::with(['kecamatan', 'kelurahan', 'kabupaten'])
        ->where('nama_bumdes', 'like', "%" . $keyword . "%")
        ->orWhere('unit_usaha_prioritas', 'like', "%" . $keyword . "%")
        ->orderBy('updated_at','desc')->orderBy('nama_bumdes')
        ->paginate(10)
        ;

        if($usaha->count() == 0){
            $usaha = Usaha::with(['kecamatan', 'kelurahan', 'kabupaten'])->orderBy('updated_at','desc')->orderBy('nama_bumdes')->paginate(10);
            return view('usaha/usaha1', [
                'title' => 'Bumdes',
                'usaha' => $usaha,
                'tgl'   => date('l, d F Y'),
            ]);
        }else {
            return view('usaha/usaha1', [
                'title' => 'Bumdes',
                'usaha' => $usaha,
                'tgl'   => date('l, d F Y'),
            ]);
        }

    }
}

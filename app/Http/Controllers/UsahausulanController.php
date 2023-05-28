<?php

namespace App\Http\Controllers;

use App\Models\Usahausulan;
use Illuminate\Http\Request;

class UsahausulanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usaha = Usahausulan::all();
        return view('usaha2/usaha2', [
            'title' => 'Usulan Usaha',
            'usaha' => $usaha,
            'tgl'   => date('l, d F Y'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usaha2/usaha2_create', [
            'title' => 'Usaha', 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usaha_usulan'  => 'required',
            'scan_surat'    => 'required',
            'permasalahan_usaha_sebelum' => 'required',
        ]);
        // $validatedData['scan_surat'] = $request->file('scan_surat')->store('custom');
        // dd($validatedData['scan_surat']);
        $validatedData['scan_surat'] = time().'.'.$request->scan_surat->extension();         
        $request->scan_surat->move(public_path('custom'), $validatedData['scan_surat']);

        // $validatedData['kuota'] = $validatedData['jml_siswa'];
        // $validatedData['ada_pengampu'] = 0;
        Usahausulan::create($validatedData);

        return redirect('/usulusaha')->with('success', 'Usulan Usaha baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usaha = Usahausulan::where('id',$id)->first();
        return view('usaha2/usaha2_detail', [
            'title' => 'Detail Usulan',
            'usaha' => $usaha,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usaha = Usahausulan::where('id',$id)->first();
        return view('usaha2/usaha2_edit', [
            'title' => 'Update Usulan',
            'usaha' => $usaha,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'usaha_usulan'  => 'required',
            'permasalahan_usaha_sebelum' => 'required',
        ]);
        // $validatedData['scan_surat'] = $request->file('scan_surat')->store('custom');
        // dd($validatedData['scan_surat']);
        if(! $validatedData['scan_surat']){
            $validatedData['scan_surat'] = time().'.'.$request->scan_surat->extension();         
            $request->scan_surat->move(public_path('custom'), $validatedData['scan_surat']);
        }

        // $validatedData['kuota'] = $validatedData['jml_siswa'];
        // $validatedData['ada_pengampu'] = 0;
        Usahausulan::where('id', $id)->update($validatedData);
        if(! $validatedData['scan_surat']){
            Usahausulan::destroy($id);
        }

        return redirect('/usulusaha')->with('success', 'Usulan Usaha berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Delete usaha
        Usahausulan::destroy($id);

        return redirect('/usulusaha')->with('deleted', 'Usulan Usaha berhasil dihapus');
    }

    public function searchUsulan(Request $request){
        $keyword = $request->search;

        $usulan = Usahausulan::where('usaha_usulan', 'like', "%" . $keyword . "%")->get();

        return view('usaha/usaha1', [
            'title' => 'Usulan Usaha',
            'usaha' => $usulan,
            'tgl'   => date('l, d F Y'),
        ]);
    }
}

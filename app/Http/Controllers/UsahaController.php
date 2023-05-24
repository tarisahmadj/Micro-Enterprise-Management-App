<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use Illuminate\Http\Request;

class UsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usaha_berjalan'     => 'required',
            'average_omset' => 'required',
            'modal_usaha' => 'required',
        ]);

        // $validatedData['kuota'] = $validatedData['jml_siswa'];
        // $validatedData['ada_pengampu'] = 0;
        Usaha::create($validatedData);

        return redirect('/ruang')->with('success', 'Ruang Kelas baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usaha $usaha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usaha $usaha)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usaha $usaha)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usaha $usaha)
    {
        //
    }

    public function usaha(){
        return view('usaha/usaha1', [
            'title' => 'usaha yang ada',
        ]);
    }
}

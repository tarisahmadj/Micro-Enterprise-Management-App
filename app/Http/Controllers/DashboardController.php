<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usaha;
use App\Models\pariwisata;
use App\Models\Usahausulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller
{
    public function index(){
        $usaha = Usaha::latest()->get();
        $usulan_usaha = Usahausulan::latest()->get();
        $pariwisata = pariwisata::latest()->count();
        $user = User::where('role_id', 0)->count();

        return view('content/dashboard', [
            'title' => 'Dashboard',
            'usaha' => $usaha,
            'usulan' => $usulan_usaha,
            'pariwisata' => $pariwisata,
            'user' => $user,
        ]);
    }

    public function getDownload($fileId)
    {   
        $scan = Usahausulan::where('id',$fileId)->first();
        // $number_of_files = isset($file);
        // if ($number_of_files) {
        //     // Push all the files in a zip and send the zip as download
        // } else {
        //     // Send the file as a download
        //     $file = public_path(). "/custom/" . $file->scan_surat;
        //     dd($file);

        //    return response()->download($file, '.pdf');

        // $file = storage_path()."public/custom/'.$scan->scan_surat";
        // if (file_exists($file)) {
        //     $headers = [
        //         'Content-Type' => 'application/pdf',
        //     ];
        //     return response()->download($file, date(), $headers);
        // }
        // }
        // $path = public_path('for_pro_members.zip');
        $path = public_path(). "/custom/" . $scan->scan_surat;
        $fileName = $scan->scan_surat;

        return Response::download($path, $fileName, ['Content-Type: application/pdf']);
    }

    public function getVerif($id){
        
        DB::table('usaha_usulan')->where('id',$id)->update(['status' => 2]);
        $usaha = Usahausulan::all();
        
        return view('usaha2/usaha2', [
            'title' => 'usaha usulan',
            'usaha' => $usaha,
            'tgl'   => date('l, d F Y'),
        ]);
    }

    // Edit Profile
    public function edit()
    {
        return view('content/akun', [
            'title' => 'Akun Anda',
            'akun'  => auth()->guard()->user(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'      => 'required',
            'email'     => 'required',
        ]);

        if (!$request->foto) {
            $validatedData['foto'] = $request->oldFoto;
        }

        if (!$request->password) {
            $validatedData['password'] = $request->oldPassword;
        }

        $validatedData['role_id'] = auth()->user()->role_id;

        User::where('id', $id)->update($validatedData);

        return back()->with('success', 'Data anda berhasil diubah');
    }
}

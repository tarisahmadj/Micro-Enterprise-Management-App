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

    public function createAkun(){
        $data = User::get();
        return view('content/akun', [
            'title' => 'akun',
            'data' => $data,
            'tgl' => date('l, d F Y'),
        ]);
    }
    public function getAkun($id){
        return view('content/create_akun', [
            'title' => 'buat akun',
            'tgl' => date('l, d F Y'),
        ]);
    }
    public function postAkun(Request $request){
        $nama = $request->nama;
        $email = $request->email;
        $password = $request->password;
        $password2 = $request->password2;
        $role = $request->role;
        if ($password != $password2) {
            return view('content/create_akun', [
                'title' => 'buat akun',
                'nama' => $nama,
                'email' => $email,
                'ket' => 'password tidak sama, silahkan ulangi lagi!'
            ]);
        } else {
            $user = new User;
            $user->name = $nama;
            $user->email = $email;
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->password = $password;
            $user->role_id = $role;
            $remember_token = '';
            $user->save();
        }
        return view('content/akun', [
            'title' => 'buat akun',
        ]);
    }
    // public function get_edit_Akun($id){
    //     $data = \DB::table('users')->where('id',$id)->first();
    //     $nama = $data->nama;
    //     $email = $data->email;
    //     $role = $request->role;
    //     return view('content/create_akun', [
    //         'title' => 'buat akun',
    //         'nama' => $nama,
    //         'email' => $email,
    //         'role' => $role
    //     ]);
    // }
    // public function post_edit_Akun(Request $request){
    //     $nama = $request->nama;
    //     $email = $request->email;
    //     $password = $request->password;
    //     $password2 = $request->password2;
    //     $role = $request->role;
    //     if ($password != $password2) {
    //         return view('content/create_akun', [
    //             'title' => 'buat akun',
    //             'nama' => $nama,
    //             'email' => $email,
    //             'ed' => 1
    //         ]);
    //     } else {
    //         $user = new User;
    //         $user->name = $nama;
    //         $user->email = $email;
    //         $user->email_verified_at = date('Y-m-d H:i:s');
    //         $user->password = $password;
    //         $user->role_id = $role;
    //         $remember_token = '';
    //         $user->where('email',$email)->update();
    //     }
    //     return view('content/akun', [
    //         'title' => 'buat akun',
    //     ]);
    // }
}

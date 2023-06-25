<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Usaha;
use App\Models\Kelurahan;
use App\Models\pariwisata;
use App\Models\Usahausulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(){
        $usaha1 = Usaha::get();
        $usaha = Usaha::orderBy('updated_at','DESC')->paginate(10);
        $usulan_usaha1 = Usahausulan::get();
        $usulan_usaha = Usahausulan::orderBy('status')->paginate(10);
        // $pariwisata = pariwisata::latest()->count();
        $user = Users::count();

        return view('content/dashboard', [
            'title' => 'Dashboard',
            'usaha1' => $usaha1,
            'usaha' => $usaha,
            'usulan1' => $usulan_usaha1,
            'usulan' => $usulan_usaha,
            // 'pariwisata' => $pariwisata,
            'user' => $user,
        ]);
    }

    public function getDownload($fileId)
    {   
        $scan = Usahausulan::where('ID',$fileId)->first();
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
        
        $query = Usahausulan::where('ID', $id)->update(['status' => 2]);
        $usulan = Usahausulan::where('ID', $id)->first();
        $usaha = Usaha::where('desa_id',$usulan['desa_id'])->first()->nama_bumdes;
        // $usulan->update(['status' => 2]);

        Usaha::create([
            'kabupaten_id' => $usulan->kabupaten_id,
            'kecamatan_id' => $usulan->kecamatan_id,
            'desa_id' => $usulan->desa_id,
            'nama_bumdes' => $usaha,
            'unit_usaha_prioritas' => $usulan->usaha_usulan,
            'status'=>2,
        ]);
        
        return back()->with('success', 'Usulan Usaha berhasil diterima, Usulan usaha berhasil masuk ke Usaha berjalan');
    }

    public function getTolak($id){
        
        $query = Usahausulan::where('ID', $id)->update(['status' => 3]);
        
        return back()->with('deleted', 'Usulan Usaha berhasil ditolak');
    }

    // Edit Profile
    public function edit($id)
    {
        $data = Users::where('id',$id)->first(); 
        return view('content/edit_akun', [
            'title' => 'Akun Anda',
            'data' => $data,
            'akun'  => auth()->guard()->user(),
            'tgl' => date('l, d F Y'),
        ]);
    }

    public function update(Request $request, $id)
    {
        $nama = $request->nama;
        $email = $request->email;
        $password = $request->password;
        $password2 = $request->password2;
        $role_id = $request->role_id;
        if ($password != $password2) {
            return view('content/create_akun', [
                'title' => 'buat akun',
                'nama' => $nama,
                'email' => $email,
                'ket' => 'password tidak sama, silahkan ulangi lagi!'
            ]);
        } else {
            $user = DB::table('users')->where('id', $id)
            ->update([
            // $user = new Users;
            'name' => $nama,
            'email' => $email,
            // $user->email_verified_at = date('Y-m-d H:i:s');
            'password' => Hash::make($password),
            'role_id' => $role_id,
            ]);
            // $user->save();
        }
        $data = Users::get();
        return view('content/akun', [
            'title' => 'buat akun',
            'data' => $data,
            'tgl' => date('l, d F Y'),
        ]);
        // $validatedData = $request->validate([
        //     'name'      => 'required',
        //     'email'     => 'required',
        // ]);

        // if (!$request->foto) {
        //     $validatedData['foto'] = $request->oldFoto;
        // }

        // if (!$request->password) {
        //     $validatedData['password'] = $request->oldPassword;
        // }

        // $validatedData['role_id'] = auth()->user()->role_id;

        // User::where('ID', $id)->update($validatedData);

        // return back()->with('success', 'Data anda berhasil diubah');
    }
    public function createAkun(){
        $data = Users::get();
        return view('content/akun', [
            'title' => 'akun',
            'data' => $data,
            'tgl' => date('l, d F Y'),
        ]);
    }
    public function getAkun(){
        return view('content/create_akun', [
            'title' => 'buat akun',
            'tgl' => date('l, d F Y'),
        ]);
    }
    public function hapus($id)
    {
        // Delete usaha
        Users::where('id',$id)->delete($id);

        $data = Users::get();
        return view('content/akun', [
            'title' => 'buat akun',
            'data' => $data,
            'tgl' => date('l, d F Y'),
            'ket' => 'password Berhasil Dihapus'
        ]);;
    }
        
    public function postAkun(Request $request){
        $nama = $request->nama;
        $email = $request->email;
        $password = $request->password;
        $password2 = $request->password2;
        $role_id = $request->role_id;
        if ($password != $password2) {
            return view('content/create_akun', [
                'title' => 'buat akun',
                'nama' => $nama,
                'email' => $email,
                'ket' => 'password tidak sama, silahkan ulangi lagi!'
            ]);
        } else {
            $user = new Users;
            $user->name = $nama;
            $user->email = $email;
            // $user->email_verified_at = date('Y-m-d H:i:s');
            $user->password = Hash::make($password);
            $user->role_id = $role_id;
            // $remember_token = '';
            $user->save();
        }
        $data = Users::get();
        return view('content/akun', [
            'title' => 'buat akun',
            'data' => $data,
            'tgl' => date('l, d F Y'),
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

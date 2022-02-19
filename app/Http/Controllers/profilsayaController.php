<?php

namespace App\Http\Controllers;

use A6digital\Image\Facades\DefaultProfileImage as FacadesDefaultProfileImage;
use App\Models\masteruser;
use App\Models\User;
use DB;
use Session;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\SweetAlertServiceProvider;
use RealRashid\SweetAlert\ToSweetAlert;
use  vendor\a6digital\Image\DefaultProfileImage;

class profilsayaController extends Controller
{
    public function profil()
    {
        $usersession = Session::get('id');
        $username = Session::get('username');
        $user = DB::table('users')
            ->where('users.username', '=', $username)
            ->leftJoin('hakakses', 'hakakses.id_hakakses', '=', 'users.id_hakakses')
            ->leftJoin('statusakun', 'statusakun.id_status', '=', 'users.id_status')
            ->first();
        // dd($user);
        $datapropil = array(
            'user' => $user
        );
        if ($usersession == null) {
            $message = "Waktu anda habis, silahkan login kembali untuk mengakses Aplikasi.";
            return redirect()->route('login')->with('alert', $message);
        } else {
            return view('.akun.akun', $datapropil);
        }
    }


    public function update(Request $request)
    {
        // $nama = DB::table('nama');
        // $img = FacadesDefaultProfileImage::create($nama);
        // \Storage::put("profile.png", $img->encode());
        //default profile done

        $id = Session::get('id');

        $user = masteruser::find($id);
        $user->username = $request->ubah_profil_username;
        $user->nama = $request->ubah_profil_nama;
        $user->inisial = $request->ubah_profil_inisial;

        $file_photo = $request->file('gambarprofil');
        if ($file_photo != null) {
            $namafile_phooto = $file_photo->getClientOriginalName();
            $file_photo->move(public_path('images/profile-pref'), $namafile_phooto);
            $user->foto_profil = $request->$namafile_phooto;

        }

        $file_ttd = $request->file('ttd');
        if ($file_ttd != null) {
            $namafile_ttd = $file_ttd->getClientOriginalName();
            $file_ttd->move(public_path('images/profile-pref'), $namafile_ttd);
            $user->paraf = $request->$namafile_ttd;
        }

        $user->nohp = $request->ubah_profil_hp;
        $user->password  = encrypt($request->input('input_pwd'));
        $user->save();
        return redirect()->back()->with('update', 'Berhasil Update');
    }
}

<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\statusakun;
use App\Models\hakakses;
use App\Models\masteruser;
use Carbon\Carbon;
use Illuminate\Supportcades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Kreait\Firebase\Contract\Firestore;

class loginsController extends Controller
{

    public function login()
    {   $user = Session::get('id');
        $inisial = Session::get('inisial');
        $namapem = Session::get('nama');
        $hakaksesindex = Session::get('hakakses');
        if($user != null){

            $date = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('DD/MMMM/YYYY');
            $time = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
            $alamatip  = request()->ips();
            $useragent  = request()->userAgent();
            $aktifitas = "Pengguna bernama " . $namapem . " telah Login pada jam " . $time . " tanggal " . $date;
            $iduser = $user;
            $metode = "POST";

            $postkefirestore = app('firebase.firestore')->database()->collection('mini-log')->newDocument();
            $postkefirestore->set([
                'name' => $namapem,
                'rightaccses' => $hakaksesindex,
                'iduser' => $user,
                'activity' => $aktifitas,
                'date'    => $date,
                'time'    => $time,
                'ipinfo'    => $alamatip,
                'useragent'    => $useragent,
                'method'    => $metode
            ]);
            return redirect('/Admin/mastermaterial')->with('alert', 'Berhasil Login');
        }else{
            $message = "Sesi anda telah habis silahkan masuk.";
             return view('.auth.login')->with('alert', $message);;
        }
    }


    public function postlogin(Request $request)
    {
            $username = $request->username;
            $password = $request->xpassword;
            $data = masteruser::where('username', $username)->first();

            if ($data) {
                $pw = decrypt($data->password);

                if ($password == $pw) {
                    $namahak = HakAkses::where('id_hakakses', $data->id_hakakses)->first();
                    $status = statusakun::where('id_status', $data->id_status)->first();
                    Session::put('id', $data->id);
                    Session::put('username', $data->username);
                    Session::put('hakakses', $namahak->namahakakses);
                    Session::put('status', $status->statusakun);
                    Session::put('nama', $data->nama);
                    Session::put('inisial', $data->inisial);
                    Session::put('nohp', $data->nohp);

                $date = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('DD/MMMM/YYYY');
                $time = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
                $alamatip  = request()->ips();
                $useragent  = request()->userAgent();
                $aktifitas = "Pengguna bernama " . $data->nama . " telah Login pada jam " . $time . " tanggal " . $date;
                $metode = "POST";

                $postkefirestore = app('firebase.firestore')->database()->collection('mini-log')->newDocument();
                $postkefirestore->set([
                    'name' => $data->nama,
                    'rightaccses' => $namahak->namahakakses,
                    'iduser' => $data->id,
                    'activity' => $aktifitas,
                    'date'    => $date,
                    'time'    => $time,
                    'ipinfo'    => $alamatip,
                    'useragent'    => $useragent,
                    'method'    => $metode
                ]);

                    return redirect('/Admin/mastermaterial')->with('alert', 'Berhasil Login');
                } else {
                    return redirect('/')->with('alert', 'Login gagal! Password Salah');
                }
            } else {
                return redirect('/')->with('alert', 'Login gagal! Password Salah');
            }

    }

    public function posttamu()
    {
        $id = 010;
        $username = "Tamu";
        $nanamahakakses = 010;
        $statusakun = 1;
        $nama = "Tamu";
        $inisial = "TM";
        $nohp = 0;
                Session::put('id', $id);
                Session::put('username', $username);
                Session::put('hakakses', $nanamahakakses);
                Session::put('status', $statusakun);
                Session::put('nama', $nama);
                Session::put('inisial', $inisial);
                Session::put('nohp', $nohp);
        $user = Session::get('id');

                if ($user != null){

            $date = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('DD/MMMM/YYYY');
            $time = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
            $alamatip  = request()->ips();
            $useragent  = request()->userAgent();
            $aktifitas = "TAMU telah Login pada jam " . $time . " tanggal " . $date;

            $metode = "POST";

            $postkefirestore = app('firebase.firestore')->database()->collection('mini-log')->newDocument();
            $postkefirestore->set([
                'name' => $nama,
                'rightaccses' => "Tamu",
                'iduser' => $id,
                'activity' => $aktifitas,
                'date'    => $date,
                'time'    => $time,
                'ipinfo'    => $alamatip,
                'useragent'    => $useragent,
                'method'    => $metode
            ]);
            return redirect('/Admin/mastersupplier')->with('alert', 'Berhasil Login');

                }else{
            return redirect('/')->with('alert', 'kesalahan tidak diketahui');

                }

    }



    public function logout()
    {
        $user = Session::get('id');
        $inisial = Session::get('inisial');
        $namapem = Session::get('nama');
        $hakaksesindex = Session::get('hakakses');

        $date = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('DD/MMMM/YYYY');
        $time = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
        $alamatip  = request()->ips();
        $useragent  = request()->userAgent();
        $aktifitas = "Pengguna bernama " . $namapem . " telah Keluar pada jam " . $time . " tanggal " . $date;
        $iduser = $user;
        $metode = "POST";

        $postkefirestore = app('firebase.firestore')->database()->collection('mini-log')->newDocument();
        $postkefirestore->set([
            'name' => $namapem,
            'rightaccses' => $hakaksesindex,
            'iduser' => $user,
            'activity' => $aktifitas,
            'date'    => $date,
            'time'    => $time,
            'ipinfo'    => $alamatip,
            'useragent'    => $useragent,
            'method'    => $metode
        ]);

        try{
            Auth::logout();
        Session::flush();

        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with(['upps' => 'gagal']);
        }
        $x = Session::get('id');
        if($x == null){
            $message = "anda telah keluar dari Aplikasi.";
            return redirect('/')->with('alert', $message);
        }

    }
}

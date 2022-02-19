<?php

namespace App\Http\Controllers;

use App\Models\hakakses;
use App\Models\statusakun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use \Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\masteruser;
use Carbon\Carbon;
use Session;
use DB;



class manajerpenggunaController extends Controller
{
    public function manajerpengguna()
    {
        $username=Session::get('username');
        $x=Session::get('id');
        $data = masteruser::where('username',$username)->first();

        $user = DB::table('users')->leftJoin('hakakses', 'hakakses.id_hakakses', '=', 'users.id_hakakses')
        ->leftJoin('statusakun', 'statusakun.id_status', '=', 'users.id_status')
        ->get();

        $statusaja = DB::table('statusakun')->get();
        $hakakses = DB::table('hakakses')->get();

    $data = array(
        'user'      =>  $user,'statusakun'    =>  $statusaja, 'hakakses' =>  $hakakses);
        if ($x == null) {
            $message = "Waktu anda habis, silahkan login kembali untuk mengakses Aplikasi.";
            return redirect()->route('login')->with('alert', $message);
        } else {
            return view('.admin.manajerakun', $data);
        }
    }

    public function store(Request $request){

     $add = new masteruser;

     $add->username=$request->input_username;
     $add->nama=$request->input_nama;
     $add->inisial= $request->input_inisial;
     $add->nohp=$request->input_nohp;
     $add->id_hakakses= $request->input_idhak;
     $add->id_status=$request->input_idstatus;
     $add->password= encrypt($request->input('input_pwd'));
     $add->remember_token= Str::random(8);
     $add->otp= Str::random(4);
    $add->save();

        $hak = hakakses::find($request->input_idhak);
        $status = statusakun::find($request->input_idstatus);

        $user = Session::get('id');
        $inisial = Session::get('inisial');
        $namapem = Session::get('nama');
        $hakaksesindex = Session::get('hakakses');

        $date = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('DD/MMMM/YYYY');
        $time = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
        $alamatip  = request()->ips();
        $useragent  = request()->userAgent();
        $aktifitas = "Pengguna bernama " . $namapem . " telah melakukan penambahan data pengguna " . $request->input_nama .
            " baru pada jam " . $time . " tanggal " . $date;
        $rincidatasblm = "Data Baru";

        $rincidatassdh = "Rincian Data Sesudah " . "ID [" . $add->id . "] "
            . $add->username . ", "
            . $add->nama . ", "
            . $add->inisial . ", "
            . $add->nohp . ", "
            . $hak . ", "
            . $status . ", "
            . $add->password . ", "
            . $add->remember_token . ", "
            . $add->otp . ", ";

        $iddata = $add->id;
        $metode = "POST";

        $postkefirestore = app('firebase.firestore')->database()->collection('mini-log')->newDocument();
        $postkefirestore->set([
            'name' => $namapem,
            'rightaccses' => $hakaksesindex,
            'iduser' => $user,
            'iddata' => $iddata,
            'jenisdata' => "pengguna",
            'rincidatasblm' => $rincidatasblm,
            'rincidatassdh' => $rincidatassdh,
            'activity' => $aktifitas,
            'date'    => $date,
            'time'    => $time,
            'ipinfo'    => $alamatip,
            'useragent'    => $useragent,
            'method'    => $metode
        ]);


        return redirect('/Admin/manajerpengguna')->with('alert','terupdate bosku');
    }

    public function update(Request $request)
    {
        $idx = $request->ubah_id;
            $x = masteruser::find($request->ubah_id);
            $user = masteruser::find($request->ubah_id);
            $user->username = $request->ubah_username;
            $user->nama = $request->ubah_nama;
            $user->inisial = $request->ubah_inisial;
            $user->nohp = $request->ubah_nohp;
            $user->id_hakakses = $request->ubah_hak_akses;
            $user->id_status  = $request->ubah_status;
            $user->password  = encrypt($request->input('ubah_password'));
            $user->save();
        $hak = hakakses::find($request->ubah_hak_akses);
        $status = statusakun::find($request->ubah_status);

        $user = Session::get('id');
        $inisial = Session::get('inisial');
        $namapem = Session::get('nama');
        $hakaksesindex = Session::get('hakakses');

        $date = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('DD/MMMM/YYYY');
        $time = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
        $alamatip  = request()->ips();
        $useragent  = request()->userAgent();
        $aktifitas = "Pengguna bernama " . $namapem . " telah melakukan perubahan data Pelanggan " .  $x->nama . " baru pada jam " . $time . " tanggal " . $date;
        $rincidatasblm =
        "Rincian Data sebelum " . "ID [" . $x->id . "] "
            . $x->username . ", "
            . $x->nama . ", "
            . $x->inisial . ", "
            . $x->nohp . ", "
            . $hak . ", "
            . $status . ", "
            . $x->password . ", "
            . $x->remember_token . ", "
            . $x->otp . ", ";

        $rincidatassdh =
        "Rincian Data Sesudah " . "ID [" . $user->id . "] "
            . $user->username . ", "
            . $user->nama . ", "
            . $user->inisial . ", "
            . $user->nohp . ", "
            . $hak . ", "
            . $status . ", "
            . $user->password . ", "
            . $user->remember_token . ", "
            . $user->otp . ", ";

        $iddata = $idx;
        $metode = "POST";

        $postkefirestore = app('firebase.firestore')->database()->collection('mini-log')->newDocument();
        $postkefirestore->set([
            'name' => $namapem,
            'rightaccses' => $hakaksesindex,
            'iduser' => $user,
            'iddata' => $iddata,
            'jenisdata' => "pengguna",
            'rincidatasblm' => $rincidatasblm,
            'rincidatassdh' => $rincidatassdh,
            'activity' => $aktifitas,
            'date'    => $date,
            'time'    => $time,
            'ipinfo'    => $alamatip,
            'useragent'    => $useragent,
            'method'    => $metode
        ]);
        return redirect()->back()->with('update','Berhasil Update');
    }

    public function deactivatedx(Request $request){
        $deactivated = 2;
        $id = masteruser::find($request->deact_id);
        $id->id_status = $deactivated;
        $id->save();
        return redirect('/Admin/manajerpengguna');
    }

    public function activatedx(Request $request)
    {
        $s = 1;
        $id = masteruser::find($request->activated_id);
        $id->id_status = $s;
        $id->save();
        return redirect('/Admin/manajerpengguna');
    }

    public function hapusperm(Request $request){
        $id = $request->del_id;
        try{
            $superduperdelete = masteruser::where('id',$id)->first();
            $x = masteruser::where('id',$id)->first();

            $hak = hakakses::find($x->id_status);
            $status = statusakun::find($x->id_status);

            $user = Session::get('id');
            $inisial = Session::get('inisial');
            $namapem = Session::get('nama');
            $hakaksesindex = Session::get('hakakses');

            $date = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('DD/MMMM/YYYY');
            $time = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
            $alamatip  = request()->ips();
            $useragent  = request()->userAgent();
            $aktifitas = "Pengguna bernama " . $namapem . " telah melakukan perubahan data Pelanggan " .  $x->nama . " baru pada jam " . $time . " tanggal " . $date;
            $rincidatasblm =
            "Rincian Data sebelum " . "ID [" . $x->id . "] "
            . $x->username . ", "
            . $x->nama . ", "
            . $x->inisial . ", "
            . $x->nohp . ", "
            . $hak . ", "
            . $status . ", "
            . $x->password . ", "
            . $x->remember_token . ", "
            . $x->otp . ", ";

            $rincidatassdh =
            "Data ini TELAH DIHAPUS";

            $iddata = $id;
            $metode = "POST";

            $postkefirestore = app('firebase.firestore')->database()->collection('mini-log')->newDocument();
            $postkefirestore->set([
                'name' => $namapem,
                'rightaccses' => $hakaksesindex,
                'iduser' => $user,
                'iddata' => $iddata,
                'jenisdata' => "pengguna",
                'rincidatasblm' => $rincidatasblm,
                'rincidatassdh' => $rincidatassdh,
                'activity' => $aktifitas,
                'date'    => $date,
                'time'    => $time,
                'ipinfo'    => $alamatip,
                'useragent'    => $useragent,
                'method'    => $metode
            ]);
        }catch(ModelNotFoundException $e){
            return redirect()->back()->with(['upps'=> 'gagal']);
        }
        $superduperdelete->delete($id);
        return redirect()->back()->with('update','Berhasil Update');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use DB;
use Illuminate\Http\Request;
use \Illuminate\Database\Eloquent\ModelNotFoundException;
use Alert;
use Carbon\Carbon;

use Session;

class pelangganController extends Controller
{
    public function m_pelanggan()
    {
        $user = Session::get('id');
        $inisial = Session::get('inisial');
        $namapem = Session::get('nama');
        $hakaksesindex = Session::get('hakakses');
        // pelanggan adalah db nama pelanggan
        $lihatpelangganku = DB::table('master_nama_pelanggan')->paginate(100);
        $data = ['lihatpelangganku' => $lihatpelangganku];

        if ($user == null) {
            $message = "Waktu anda habis, silahkan login kembali untuk mengakses Aplikasi.";
            return redirect()->route('login')->with('alert', $message);
        } else {
            return view('.admin.pelanggan', $data);
        }

    }
    protected $fillable = ['id', 'namapelanggan'];

    public function tambahpelanggan(Request $request){
        $tambah = new pelanggan;
        $tambah->namapelanggan=$request->namapelanggan;
        $tambah->Alamat=$request->alamat;
        $tambah->Telp=$request->telp;
        $tambah->email=$request->emel;
        $tambah->save();

        $user = Session::get('id');
        $inisial = Session::get('inisial');
        $namapem = Session::get('nama');
        $hakaksesindex = Session::get('hakakses');

        $date = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('DD/MMMM/YYYY');
        $time = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
        $alamatip  = request()->ips();
        $useragent  = request()->userAgent();
        $aktifitas = "Pengguna bernama " . $namapem . " telah melakukan penambahan data Pelanggan ". $request->namapelanggan ." baru pada jam " . $time . " tanggal " . $date;
        $rincidatasblm = "Data Baru";

        $rincidatassdh = "Rincian Data Sesudah " . "ID [" . $tambah->id . "] " . $request->namapelanggan . ", " .
        $request->alamat . ", " . $request->telp . ", " . $request->emel . ".";

        $iddata = $tambah->id;
        $metode = "POST";

        $postkefirestore = app('firebase.firestore')->database()->collection('mini-log')->newDocument();
        $postkefirestore->set([
            'name' => $namapem,
            'rightaccses' => $hakaksesindex,
            'iduser' => $user,
            'iddata' => $iddata,
            'jenisdata' => "pelanggan",
            'rincidatasblm' => $rincidatasblm,
            'rincidatassdh' => $rincidatassdh,
            'activity' => $aktifitas,
            'date'    => $date,
            'time'    => $time,
            'ipinfo'    => $alamatip,
            'useragent'    => $useragent,
            'method'    => $metode
        ]);

        Alert::success('update','Berhasil Update');
        return redirect()->back();

    }

    public function updet(Request $request){
        $idx = $request->ubah_id;
        $x = pelanggan::where('ids', $idx)->first();
        $updt = pelanggan::find($request->ubah_id);

        $updt->namapelanggan    =$request->e_namapelanggan;
        $updt->Alamat = $request->e_alamat;
        $updt->Telp = $request->e_telp;
        $updt->email = $request->e_emel;
        $updt->save();

        $user = Session::get('id');
        $inisial = Session::get('inisial');
        $namapem = Session::get('nama');
        $hakaksesindex = Session::get('hakakses');

        $date = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('DD/MMMM/YYYY');
        $time = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
        $alamatip  = request()->ips();
        $useragent  = request()->userAgent();
        $aktifitas = "Pengguna bernama " . $namapem . " telah melakukan perubahan data Pelanggan " .  $updt->namapelanggan . " baru pada jam " . $time . " tanggal " . $date;
        $rincidatasblm =
        "Rincian Data Sebelum diubah " . "ID [" . $idx . "] " . $x->namapelanggan . ", " .
        $x->alamat . ", " . $x->tlp . ", " . $x->email . ".";

        $rincidatassdh = "Rincian Data Sesudah " . "ID [" . $idx . "] " . $request->e_namapelanggan . ", " .
        $request->e_alamat . ", " . $request->e_telp . ", " . $request->e_emel . ".";

        $iddata = $idx;
        $metode = "POST";

        $postkefirestore = app('firebase.firestore')->database()->collection('mini-log')->newDocument();
        $postkefirestore->set([
            'name' => $namapem,
            'rightaccses' => $hakaksesindex,
            'iduser' => $user,
            'iddata' => $iddata,
            'jenisdata' => "pelanggan",
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

    public function delete(Request $request){
        $idx = $request->del_id;


        try{
            $del = pelanggan::WHERE('id', $idx)->first();

            $user = Session::get('id');
            $inisial = Session::get('inisial');
            $namapem = Session::get('nama');
            $hakaksesindex = Session::get('hakakses');

            $date = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('DD/MMMM/YYYY');
            $time = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
            $alamatip  = request()->ips();
            $useragent  = request()->userAgent();
            $aktifitas = "Pengguna bernama " . $namapem . " telah melakukan Penghapusan data Supplier " .  $del->namapelanggan . " pada jam " . $time . " tanggal " . $date;
            $rincidatasblm =
            "Rincian Data Sebelum diubah " . "ID [" . $idx . "] " . $del->namapelanggan . ", " .
            $del->Alamat . ", " . $del->Telp . ", " . $del->email . ".";

            $rincidatassdh = "Data ini TELAH DIHAPUS";

            $iddata = $idx;
            $metode = "POST";

            $postkefirestore = app('firebase.firestore')->database()->collection('mini-log')->newDocument();
            $postkefirestore->set([
                'name' => $namapem,
                'rightaccses' => $hakaksesindex,
                'iduser' => $user,
                'iddata' => $iddata,
                'jenisdata' => "supplier",
                'rincidatasblm' => $rincidatasblm,
                'rincidatassdh' => $rincidatassdh,
                'activity' => $aktifitas,
                'date'    => $date,
                'time'    => $time,
                'ipinfo'    => $alamatip,
                'useragent'    => $useragent,
                'method'    => $metode
            ]);
            // $hpuspelanggan = DB::table('master_nama_pelanggan')->where('id_pelanggan',$id)->first();
        }catch(ModelNotFoundException $e){
            return redirect()->back()->with(['upps'=> 'gagal']);
        }

        $del->delete($idx);
        return redirect()->back()->with('update','Berhasil Menghapus');
    }
}

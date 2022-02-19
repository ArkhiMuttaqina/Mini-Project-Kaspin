<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Session;
use Kreait\Firebase\Contract\Firestore;
use Alert;

class supplierController extends Controller
{
    public function m_supplier(){
        $user = Session::get('id');
        $inisial = Session::get('inisial');
        $namapem = Session::get('nama');
        $hakaksesindex = Session::get('hakakses');

        // kebun adalah db nama pelanggan
        $lihatsupplierku  = DB::table('master_supplier')->paginate(100);
        $data = ['lihatsupplierku' => $lihatsupplierku];

        if ($user == null) {
            $message = "Waktu anda habis, silahkan login kembali untuk mengakses E-FAKTUR.";
            return redirect()->route('login')->with('alert', $message);
        } else {
            return view('.admin.supplier', $data);
        }
    }

    public function tambahsupplier(Request $request)
    {
        $tambah = new supplier;
        $tambah->nama_supplier = $request->xnamasupplierx;
        $tambah->alamat_supplier = $request->alamatnya;
        $tambah->no_supplier = $request->xtelp;
        $tambah->email_supplier = $request->xemel;
        $tambah->save();

        $user = Session::get('id');
        $inisial = Session::get('inisial');
        $namapem = Session::get('nama');
        $hakaksesindex = Session::get('hakakses');

        $date = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('DD/MMMM/YYYY');
        $time = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
        $alamatip  = request()->ips();
        $useragent  = request()->userAgent();
        $aktifitas = "Pengguna bernama " . $namapem . " telah melakukan penambahan data Supplier baru pada jam " . $time . " tanggal " . $date;
        $rincidatasblm = "Data Baru";

        $rincidatassdh = "Rincian Data Sesudah " . "ID [" . $tambah->ids . "] " . $request->xnamasupplierx . ", " .
        $request->alamatnya . ", " . $request->xtelp . ", " . $request->xemel . ".";

        $iddata = $tambah->ids;
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

        Alert::success('update', 'Berhasil Update');
        return redirect()->back();
    }

    public function updet(Request $request)
    {
        $idx = $request->ubah_id;
        $x = supplier::where('ids', $idx)->first();
        $updt = supplier::where('ids', $idx)->first();
        $updt->nama_supplier    = $request->namasupplier;
        $updt->alamat_supplier = $request->alamat;
        $updt->no_supplier = $request->telp;
        $updt->email_supplier = $request->emel;
        $updt->update();

        $user = Session::get('id');
        $inisial = Session::get('inisial');
        $namapem = Session::get('nama');
        $hakaksesindex = Session::get('hakakses');

        $date = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('DD/MMMM/YYYY');
        $time = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
        $alamatip  = request()->ips();
        $useragent  = request()->userAgent();
        $aktifitas = "Pengguna bernama " . $namapem . " telah melakukan perubahan data Supplier " .  $updt->nama_supplier . " baru pada jam " . $time . " tanggal " . $date;
        $rincidatasblm =
        "Rincian Data Sebelum diubah " . "ID [" . $idx . "] " . $x->nama_supplier . ", " .
        $x->alamat_supplier . ", " . $x->no_supplier . ", " . $x->email_supplier . ".";

        $rincidatassdh = "Rincian Data Sesudah " . "ID [" . $idx . "] " . $request->namasupplier . ", " .
        $request->alamat . ", " . $request->telp . ", " . $request->emel . ".";

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

        return redirect()->back()->with('update', 'Berhasil Update');
    }

    public function delete(Request $request)

    {
        $idx = $request->del_id;

        // dd($idx);
        try {
            $del = supplier::where('ids', $idx)->first();
            $user = Session::get('id');
            $inisial = Session::get('inisial');
            $namapem = Session::get('nama');
            $hakaksesindex = Session::get('hakakses');

            $date = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('DD/MMMM/YYYY');
            $time = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
            $alamatip  = request()->ips();
            $useragent  = request()->userAgent();
            $aktifitas = "Pengguna bernama " . $namapem . " telah melakukan Penghapusan data Supplier ".  $del->nama_supplier . " pada jam " . $time . " tanggal " . $date;
            $rincidatasblm =
            "Rincian Data Sebelum diubah " . "ID [" . $idx . "] " . $del->nama_supplier . ", " .
            $del->alamat_supplier . ", " . $del->no_supplier . ", " . $del->email_supplier . ".";

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

            // $del = DB::table('master_supplier')->where('id_supplier',$idx)->first();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with(['upps' => 'gagal']);
        }

        $del->delete($idx);
        return redirect()->back()->with('update', 'Berhasil Menghapus');
    }

}

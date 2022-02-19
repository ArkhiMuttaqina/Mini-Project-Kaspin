<?php

namespace App\Http\Controllers;

use App\Models\mastermaterial;
use App\Models\supplier;
use Illuminate\Http\Request;
use \Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Session;
use DB;

class materialController extends Controller
{
    public function m_material(){

        $user = Session::get('id');
        $inisial = Session::get('inisial');
        $namapem = Session::get('nama');
        $hakaksesindex = Session::get('hakakses');

        $get_materialmaster = DB::table('master_material')->leftJoin('master_supplier', 'master_supplier.ids', '=', 'master_material.supllier')->get();
        $totalmaterial = array_sum(array_column($get_materialmaster->toArray(), 'stok'));
        $totalaset = array_sum(array_column($get_materialmaster->toArray(), 'hargabeli_material'));
        // dd($get_materialmaster);
        $thedata = ['get_materialmaster' => $get_materialmaster,
            'totalmaterial' => $totalmaterial,
            'totalaset' => $totalaset];

        if ($user == null) {
            $message = "Waktu anda habis, silahkan login kembali untuk mengakses Aplikasi.";
            return redirect()->route('login')->with('alert', $message);
        } else {
            return view('.admin.material', $thedata);
        }
    }
    protected $fillable = ['id', 'namamaterial', 'kodematerial'];

    public function pilihsupplier(Request $request){
        $barangs = [];

        if ($request->has('q')) {
            $search = $request->q;
            //    $baranga = DB::table('master_material')->select('id', 'namamaterial', 'kodematerial')
            //     ->where('namamaterial', 'LIKE', "%$search%")->get();
            $barangs = supplier::select("ids", "nama_supplier")
            ->where('nama_supplier', 'LIKE', "%$search%")
            ->get();
        }
        return response()->json($barangs);
    }

    public function TambahMaterial(Request $request){
        $tanggal = $request->date_mater;
        // dd($tanggal);

        $tambah = new mastermaterial;
        $tambah->namamaterial = $request->inp_namamater;
        $tambah->supllier = $request->nama_sup;
        $tambah->hargabeli_material = $request->inp_hargabelimater;
        $tambah->hargamaterial = $request->inp_hargamater;
        $tambah->stok = $request->inp_stok;
        $tambah->selisih = ((int)$request->inp_hargamater - (int)$request->inp_hargabelimater);
        $tambah->belikalistok = ((int)$request->inp_stok * (int)$request->inp_hargabelimater);
        $tambah->jualkalistok = ((int)$request->inp_hargamater * (int)$request->inp_stok);
        $dateString = date('d-m-Y', strtotime($request->date_mater));
        $tambah->batch_date = $dateString;
        $tambah->kodematerial = rand(6, 1000000);
        $tambah->save();

        $user = Session::get('id');
        $inisial = Session::get('inisial');
        $namapem = Session::get('nama');
        $hakaksesindex = Session::get('hakakses');

        $date = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('DD/MMMM/YYYY');
        $time = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
        $alamatip  = request()->ips();
        $useragent  = request()->userAgent();
        $aktifitas = "Pengguna bernama " . $namapem . " telah melakukan penambahan data Barang " . $request->namamaterial .
         " baru pada jam " . $time . " tanggal " . $date;
        $rincidatasblm = "Data Baru";

        $rincidatassdh = "Rincian Data Sesudah " . "ID [" . $tambah->id . "] "
        . $tambah->namamaterial . ", "
        . $tambah->supllier . ", "
        . $tambah->hargabeli_material . ", "
        . $tambah->hargamaterial . "."
        . $tambah->stok . "."
        . $tambah->selisih . "."
        . $tambah->belikalistok . "."
        . $tambah->jualkalistok . "."
        . $tambah->batch_date . "."
        . $tambah->kodematerial . ".";

        $iddata = $tambah->id;
        $metode = "POST";

        $postkefirestore = app('firebase.firestore')->database()->collection('mini-log')->newDocument();
        $postkefirestore->set([
            'name' => $namapem,
            'rightaccses' => $hakaksesindex,
            'iduser' => $user,
            'iddata' => $iddata,
            'jenisdata' => "barang",
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

    public function UpdateMaterial(Request $request){
        $datenew = $request->ubh_date;
        $supnew = $request->enama_sup;
        $x = mastermaterial::find($request->ubah_id);
        $updt = mastermaterial::find($request->ubah_id);
        $updt->namamaterial = $request->editnamamaterial;
        if($supnew == NULL){
            $updt->supllier = $request->enama_sup2;
        }else{
            $updt->supllier = $request->enama_sup;
        }

        $updt->hargabeli_material = $request->hargabeli_brg;
        $updt->hargamaterial = $request->hargajual_brg;
        $updt->stok = $request->stokedit;
        $updt->selisih = $request->hargajual_brg - $request->hargabeli_brg;
        $updt->belikalistok = ((int)$request->stokedit * (int)$request->hargabeli_brg);
        $updt->jualkalistok = ((int)$request->hargajual_brg * (int)$request->stokedit);
        if($datenew == NULL){
            $updt->batch_date = $request->date_lama;

        }else{
            $dateString = date('d-m-Y', strtotime($request->ubh_date));
            $updt->batch_date = $dateString;
        }
        $updt->save();

        $user = Session::get('id');
        $inisial = Session::get('inisial');
        $namapem = Session::get('nama');
        $hakaksesindex = Session::get('hakakses');

        $date = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('DD/MMMM/YYYY');
        $time = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
        $alamatip  = request()->ips();
        $useragent  = request()->userAgent();
        $aktifitas = "Pengguna bernama " . $namapem . " telah melakukan penambahan data Barang " . $request->editnamamaterial .
            " baru pada jam " . $time . " tanggal " . $date;
        $rincidatasblm =
        "Rincian Data sebelum diubah " . "ID [" . $x->id . "] "
        . $x->namamaterial . ", "
        . $x->supllier . ", "
        . $x->hargabeli_material . ", "
        . $x->hargamaterial . "."
        . $x->stok . "."
        . $x->selisih . "."
        . $x->belikalistok . "."
        . $x->jualkalistok . "."
        . $x->batch_date . "."
        . $x->kodematerial . ".";

        $rincidatassdh = "Rincian Data Sesudah " . "ID [" . $updt->id . "] "
        . $updt->namamaterial . ", "
        . $updt->supllier . ", "
        . $updt->hargabeli_material . ", "
        . $updt->hargamaterial . "."
        . $updt->stok . "."
        . $updt->selisih . "."
        . $updt->belikalistok . "."
        . $updt->jualkalistok . "."
        . $updt->batch_date . "."
        . $updt->kodematerial . ".";

        $iddata = $updt->id;
        $metode = "POST";

        $postkefirestore = app('firebase.firestore')->database()->collection('mini-log')->newDocument();
        $postkefirestore->set([
            'name' => $namapem,
            'rightaccses' => $hakaksesindex,
            'iduser' => $user,
            'iddata' => $iddata,
            'jenisdata' => "barang",
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

    public function deletematerial(Request $request)
    {
        $id = $request->del_id;

        try {
            $x = mastermaterial::WHERE('id', $id)->first();
            $hpusmaterial = mastermaterial::WHERE('id', $id)->first();
            $user = Session::get('id');
            $inisial = Session::get('inisial');
            $namapem = Session::get('nama');
            $hakaksesindex = Session::get('hakakses');

            $date = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('DD/MMMM/YYYY');
            $time = Carbon::now('GMT+7')->setTimezone('Asia/Jakarta')->isoFormat('HH:mm:ss');
            $alamatip  = request()->ips();
            $useragent  = request()->userAgent();
            $aktifitas = "Pengguna bernama " . $namapem . " telah melakukan Penghapusan data Supplier " .  $x->namamaterial . " pada jam " . $time . " tanggal " . $date;
            $rincidatasblm =
                $rincidatasblm =
                "Rincian Data sebelum diubah " . "ID [" . $x->id . "] "
                . $x->namamaterial . ", "
                . $x->supllier . ", "
                . $x->hargabeli_material . ", "
                . $x->hargamaterial . "."
                . $x->stok . "."
                . $x->selisih . "."
                . $x->belikalistok . "."
                . $x->jualkalistok . "."
                . $x->batch_date . "."
                . $x->kodematerial . ".";

            $rincidatassdh = "Data ini TELAH DIHAPUS";

            $iddata = $id;
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

        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with(['upps' => 'gagal']);
        }
        $hpusmaterial->delete($id);
        return redirect()->back()->with('update', 'Berhasil Update');
    }
}

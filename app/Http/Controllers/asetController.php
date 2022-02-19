<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Session;
use Alert;

class supplierController extends Controller
{
    public function m_supplier(){
        $user = Session::get('id');
        $inisial = Session::get('inisial');
        $namapem = Session::get('nama');
        $hakaksesindex = Session::get('hakakses');

        // kebun adalah db nama pelanggan
        $lihatsupplierku  = DB::table('master_supplier');
        $data = ['lihatsupplierku' => $lihatsupplierku];

        if ($user == null) {
            $message = "Waktu anda habis, silahkan login kembali untuk mengakses Aplikasi.";
            return redirect()->route('login')->with('alert', $message);
        } else {
            return view('.laporan.labarugi', $data);
        }
    }

    public function tambahsupplier(Request $request)
    {
        $tambah = new supplier;
        $tambah->nama_supplier = $request->namasupplier;
        $tambah->alamat_supplier = $request->alamat;
        $tambah->no_supplier = $request->telp;
        $tambah->email_supplier = $request->emel;
        $tambah->save();
        Alert::success('update', 'Berhasil Update');
        return redirect()->back();
    }

    public function updet(Request $request)
    {

        $updt = supplier::find($request->ubah_id);
        $updt->nama_supplier    = $request->namasupplier;
        $updt->alamat_supplier = $request->alamat;
        $updt->no_supplier = $request->telp;
        $updt->email_supplier = $request->emel;
        $updt->save();


        return redirect()->back()->with('update', 'Berhasil Update');
    }

    public function delete(Request $request)

    {
        $idx = $request->del_id;


        try {
            $hpuskebun = supplier::WHERE('id', $idx)->first();
            // $hpuskebun = DB::table('master_nama_kebun')->where('id_kebun',$id)->first();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with(['upps' => 'gagal']);
        }

        $hpuskebun->delete($idx);
        return redirect()->back()->with('update', 'Berhasil Menghapus');
    }

}

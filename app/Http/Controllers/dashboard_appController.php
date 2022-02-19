<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class dashboard_appController extends Controller
{
    public function dashboard()
    {

        $user = Session::get('id');
        $inisial = Session::get('inisial');
        $namapem = Session::get('nama');
        $hakaksesindex = Session::get('hakakses');
        if ($user == null) {
            $message = "Waktu anda habis, silahkan login kembali untuk mengakses Aplikasi.";
            return redirect()->route('login')->with('alert', $message);
        } else {
            return view('.dashboard');
        }
    }

}

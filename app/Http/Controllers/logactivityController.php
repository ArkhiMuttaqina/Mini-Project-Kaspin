<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Contract\Database;

use Google\Cloud\Firestore\FirestoreClient;



class logactivityController extends Controller
{

public function __construct()
{
        static::$db = self::firestoreDatabaseInstance();

}

    public function xx()
    {
 
        $docRef = app('firebase.firestore')->database()->collection('mini-log');
        $snapshot = $docRef->documents();
        $dataaa = $snapshot;

        // dd($dataaa);
        $user = Session::get('id');
        $inisial = Session::get('inisial');
        $namapem = Session::get('nama');
        $hakaksesindex = Session::get('hakakses');
        if ($user == null
        ) {
            $message = "Waktu anda habis, silahkan login kembali untuk mengakses Aplikasi.";
            return redirect()->route('login')->with('alert', $message);
        } else {
            return view('.admin.logactivity', compact('dataaa'));
        }
    }
}

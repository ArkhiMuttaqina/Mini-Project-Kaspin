<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Contract\Database;

use Google\Cloud\Firestore\FirestoreClient;



class cvArkhiController extends Controller
{

    public function xx()
    {

       //Nothing to see just ordinary cv

            return view('.cvArkhi');

    }
}

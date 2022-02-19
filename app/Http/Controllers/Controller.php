<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Google\Cloud\Firestore\FirestoreClient;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected static $database;
    protected static $db;

    // protected static function firebaseDatabaseInstance()
    // {
    //     $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebase-credential.json');
    //     $firebase = (new Factory)
    //         ->withServiceAccount($serviceAccount)
    //         ->create();
    //     return $firebase->getDatabase();
    // }

    protected static function firestoreDatabaseInstance()
    {
        $db = new FirestoreClient([
            'projectId' => 'mini-007'
        ]);

        return $db;
    }
}

<?php

namespace App\Http\Controllers;

use Google\Cloud\Storage\StorageClient;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    protected static function firestoreDatabaseInstance()
    {


        # Your Google Cloud Platform project ID
        $projectId = 'mini-007';

        # Instantiates a client
        $storage = new StorageClient([
            'projectId' => $projectId
        ]);

        # The name for the new bucket
        $bucketName = 'my-new-bucket';

        # Creates the new bucket
        $bucket = $storage->createBucket($bucketName);

        echo 'Bucket ' . $bucket->name() . ' created.';
    }
}

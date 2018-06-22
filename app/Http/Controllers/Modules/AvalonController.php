<?php

namespace App\Http\Controllers\Modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Beberlei\AzureBlobStorage\BlobClient;
use App\Models\Avalon;
use Illuminate\Support\Facades\Storage;
// use App\Http\Controllers\Modules\BlobController;
class AvalonController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * csrf_token verification was temporarily disabled in http\kernel.php
     */
    public function store(Request $request){
        $req  = $request->all();
        if($request->ExistingVault){
            echo "existing Vault";
        }
        else{
            $transaction    = new Avalon();
            $file           = $request->file("filename");
            if(strtoupper($request->type) == 'BLOB'){
                $req            = $request->all();
                $accountUrl     = env('ACCOUNT_URL');
                $req['type']    = "BLOB"; 
                $accountName    = env('ACCOUNT_NAME');
                $accountKey     = env('ACCOUNT_KEY');
                $container      = env('CONTAINER'); 
                $client         = new BlobClient($accountUrl, $accountName, $accountKey);
                $blobFileName   = $file->getpathName();
                $client->putBlob($container, $request->prefix."/".$request->wallet."/".$file->getClientOriginalName(), $blobFileName);
            }
            elseif(strtoupper($request->type) == 'S3'){
                $req            = $request->all();
                $req['type']    = "S3";
                $s3 = Storage::disk('s3');
                $s3->put($request->prefix."/".$request->wallet."/".$file->getClientOriginalName(),$file,"public");
            }

                $req['class']   = "OV-VAULT";
                $req['filesize']= $file->getSize();
                $req['filename']= $file->getClientOriginalName();
                $transaction->savetransaction($req);
                return array("success" => true, "message" => "AvalonVault-transaction-success");
        }
    }
}

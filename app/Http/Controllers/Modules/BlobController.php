<?php

namespace App\Http\Controllers\Modules;
use App\Http\Controllers\Controller;
use Beberlei\AzureBlobStorage\BlobClient;
use Illuminate\Http\Request;

class BlobController extends Controller
{
    public function blobstore(Request $request)
    {
        $req            = $request->all();
        echo "<pre>sdfds";
        print_r($req);
        echo "</pre>";
        
        // $file           = $request->file("filename");
        // $accountUrl     = env('ACCOUNT_URL');
        // $accountName    = env('ACCOUNT_NAME');
        // $accountKey     = env('ACCOUNT_KEY');
        // $container      = env('CONTAINER'); 
        // $client         = new BlobClient($accountUrl, $accountName, $accountKey);
        // $blobFileName   = $file->getpathName();
        // $client->putBlob($container, $request->prefix."/".$request->wallet."/".$file->getClientOriginalName(), $blobFileName);
        // $req['class'] = "OV-VAULT";
        // $req['type'] = "BLOB";  
        // $req['filesize'] = $file->getSize();
        // $req['filename'] = $file->getClientOriginalName();
        // $transaction    = new Avalon();
        // $transaction->savetransaction($req);
        // return array("success" => true, "message" => "AvalonVault-transaction-success");
        // $request->session()->flash('AvalonVault-transaction-success', 'Successfully Saved');
        // $client->putBlobData($container, $request->ovcode."/".$file->getClientOriginalName(), file_get_contents($blobFileName));
    }
}

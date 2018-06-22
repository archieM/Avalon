<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use DB;
class Avalon extends Model
{
    public function savetransaction($req){
        foreach ($req as $key => $value) {
        	if($key == 'ExistingVault')
        		continue;
            $this->$key = $value;
        }
        $this->save();
    }
}

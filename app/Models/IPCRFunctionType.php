<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IPCRFunctionType extends Model
{
    use HasFactory;
    protected $table = 'ipcr_function_types';

    public function mfo() {
        return $this->belongsTo(MFO::class,'functiontype_id','id');
    }
}

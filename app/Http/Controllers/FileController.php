<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class FileController extends Controller
{
    public static function upload($file,$type) {

        switch($type) {
            case 'img': $destinationPath = url('assets/avatar'); break;
            case 'docs': $destinationPath = url('assets/docs'); break;
        }

        $filename = Carbon::now()->getPreciseTimestamp().'.'.$file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);

        return $dir.'/'.$filename;
    }
}

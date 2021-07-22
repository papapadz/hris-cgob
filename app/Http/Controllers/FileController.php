<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class FileController extends Controller
{
    public static function upload($file,$type) {

        switch($type) {
            case 'img': $dir = 'assets/avatar'; break;
            case 'docs': $dir = 'assets/docs'; break;
        }

        $filename = Carbon::now()->getPreciseTimestamp().'.'.$file->getClientOriginalExtension();
        $file->move(public_path($dir), $filename);

        return $dir.'/'.$filename;
    }
}

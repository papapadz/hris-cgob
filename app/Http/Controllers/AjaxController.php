<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barangay;
use App\Models\Town;
use App\Models\Province;

class AjaxController extends Controller
{
    public function getAddress(Request $request) {

        switch($request->flag) {
            case 2: return Town::where('province_id',$request->id)->orderBy('town')->get(); break;
            case 3: return Barangay::where('town_id',$request->id)->orderBy('barangay')->get(); break;
        }
    }
}

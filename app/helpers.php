<?php

//use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\CivilStatus;
use App\Models\Citizenship;

if (! function_exists('getCivilStatus')) {
    function getCivilStatus() {
        
        return CivilStatus::orderBy('civil_status')->get();
    }
}
if (! function_exists('getCitizenship')) {
    function getCitizenship() {
        return Citizenship::orderBy('citizenship')->get();
    }
}
if (! function_exists('getClinicCode')) {

    function getClinicCode($id) {
        $clinic = null;
        switch($id) {
            case 3: 
                $clinic = DB::table('clinics')->select('tscode','clinic')->where('tscode','PCR')->first();
                break;
            case 4:
                $clinic = DB::table('clinics')->select('tscode','clinic')->where('tscode','MRI')->first();
                break;
            case 5: 
                $clinic = DB::table('clinics')->select('tscode','clinic')->where('tscode','CT')->first();
                break;
            case 6: 
                $clinic = DB::table('clinics')->select('tscode','clinic')->where('tscode','XRAY')->first();
                break;
            case 7: 
                $clinic = DB::table('clinics')->select('tscode','clinic')->where('tscode','ULTZ')->first();
                break;
            case 8: 
                $clinic = DB::table('clinics')->select('tscode','clinic')->where('tscode','2DECHO')->first();
                break;
        }
        return $clinic;
    }
}
?>
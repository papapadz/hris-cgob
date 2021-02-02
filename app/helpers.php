<?php

//use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\CivilStatus;
use App\Models\Citizenship;
use App\Models\Province;

if (! function_exists('getCivilStatus')) {
    function getCivilStatus() {
        
        return CivilStatus::orderBy('civil_status')->get();
    }
}
if (! function_exists('getCitizenships')) {
    function getCitizenships() {
        return Citizenship::orderBy('citizenship')->get();
    }
}

if (! function_exists('listProvinces')) {

    function listProvinces() {
      return Province::orderBy('province')->get();
    }
}

if (! function_exists('getBarangay')) {

    function getBarangay() {
      return Barangay::orderBy('barangay')->get();
    }
}
?>
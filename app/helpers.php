<?php

//use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\CivilStatus;
use App\Models\Citizenship;
use App\Models\Province;
use App\Models\Position;
use App\Models\EmploymentType;
use App\Models\Employee;
use App\Models\AppointmentType;
use App\Models\Department;

if (! function_exists('getEmployeeName')) {
  function getEmployeeName($emp_id) {
      $employee = Employee::find($emp_id);
      return $employee->lastname.', '.$employee->firstname.' '.$employee->middlename;
  }
}
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

if (! function_exists('getPositions')) {

    function getPositions() {
      return Position::orderBy('position')->get();
    }
}

if (! function_exists('getAllEmployees')) {

    function getAllEmployees() {
      return Employee::orderBy('lastname')->get();
    }
}

if (! function_exists('getEmploymentTypes')) {

    function getEmploymentTypes() {
      return EmploymentType::orderBy('employmenttype')->get();
    }
}

if (! function_exists('getAppointmentTypes')) {

    function getAppointmentTypes() {
      return AppointmentType::orderBy('appointmenttype')->get();
    }
}

if (! function_exists('getDepartments')) {

    function getDepartments() {
      return Department::orderBy('department')->get();
    }
}
?>
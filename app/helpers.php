<?php

//use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\CivilStatus;
use App\Models\Citizenship;
use App\Models\Province;
use App\Models\Town;
use App\Models\Barangay;
use App\Models\Position;
use App\Models\EmploymentType;
use App\Models\Employee;
use App\Models\AppointmentType;
use App\Models\Department;
use App\Models\Appointment;

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

if (! function_exists('listTowns')) {

  function listTowns($province) {
    return Town::where('province_id',$province)->orderBy('town')->get();
  }
}

if (! function_exists('listBarangays')) {

    function listBarangays($town) {
      return Barangay::where('town_id',$town)->orderBy('barangay')->get();
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

if (! function_exists('listAppointments')) {

  function listAppointments($emp_id) {
    return Appointment::where('emp_id',$emp_id)->orderBy('startdate','desc')->get();
  }
}

if (! function_exists('listEducationLevel')) {

  function listEducationLevel($level) {
    switch($level) {
      case 1: return 'Elementary';
      case 2: return 'High School';
      case 3: return 'Vocational';
      case 4: return 'College';
      case 5: return 'Graduate School';
    }
  }
}
?>
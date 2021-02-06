<?php

//use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
use App\Models\EmployeeContactDetail;
use App\Models\EmployeeDtr;
use App\Models\EmployeeEducation;
use App\Models\EmployeeEligibility;
use App\Models\EmployeeFamily;
use App\Models\EmployeeHobby;
use App\Models\EmployeeIpcrf;
use App\Models\EmployeeLeave;
use App\Models\EmployeeLicenseNumber;
use App\Models\EmployeeMembership;
use App\Models\EmployeeNonacademicDistinction;
use App\Models\EmployeePayroll;
use App\Models\EmployeeTraining;
use App\Models\EmployeeVoluntaryWork;
use App\Models\EmployeeWorkExperience;

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

if (! function_exists('leaveStatus')) {

  function leaveStatus($id) {
    switch($id) {
      case 1: return 'Pending';
      case 2: return 'Approved';
      case 3: return 'Disapproved';
      case 4: return 'Cancelled';
    }
  }
}

if (! function_exists('formatDisplay')) {

  function formatDisplay($type,$val) {
    
    if($val==null)
      return null;
    
    $val = Carbon::parse($val);

    switch($type) {
      case 'time': return $val->format('h:i A');
      case 'date': return $val->format('m-d-Y');
      case 'datetime': return $val->format('m-d-Y h:i: A');
    }
  }
}

if (! function_exists('getIpcrGrade')) {

  function getIpcrGrade($rating) {
    
    if($rating>=4.5)
      return 'O';
    else if($rating >= 3.5 && $rating<4.5)
      return 'VS';
    else if($rating >= 2.5 && $rating<3.5)
      return 'S';
    else if($rating >= 1.5 && $rating<2.5)
      return 'U';
    else
      return 'P';
  }
}

if (! function_exists('getModelInstance')) {

  function getModelInstance($index) {
    
    switch($index) {
      case 0: return new Employee;break;
      case 1: return new Appointment;break;
      case 2: return new EmployeeWorkExperience;break;
      case 3: return new EmployeeEducation;break;
      case 4: return new EmployeeEligibility;break;
      case 5: return new EmployeeTraining;break;
      case 6: return new EmployeeLeave;break;
      case 7: return new EmployeeDtr;break;
      case 8: return new EmployeeIpcrf;break;
    }
  }
}
?>
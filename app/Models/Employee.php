<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Employee extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'emp_id';
    protected $casts = [
        'emp_id' => 'string'
    ];
    protected $fillable = [
        'emp_id',
        'lastname',
        'firstname',
        'middlename',
        'extension',
        'birthdate',
        'birthplace',
        'address_id',
        'civilstat_id',
        'citizenship_id',
        'gender',
        'height',
        'weight',
        'bloodtype',
        'image_url',
        'isapplicant',
    ];
    
    
    protected $dates = [
        'birthdate',
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];

    /* ************************ ACCESSOR ************************* */

    public function appointments() {
        return $this->hasOne(Appointment::class,'emp_id')->orderBy('startdate','desc')->with(['department','plantilla']);
    }

    public function address() {
        return $this->hasOne(Barangay::class,'id','address_id')->with('town');
    }

    public function citizenship() {
        return $this->hasOne(Citizenship::class,'id','citizenship_id');
    }

    public function civilStatus() {
        return $this->hasOne(CivilStatus::class,'id','civilstat_id');
    }

    public function applications() {
        return $this->belongsTo(Applicant::class,'emp_id');
    }

    public function contactDetails() {
        return $this->hasMany(EmployeeContactDetail::class,'emp_id');
    }

    public function dtrs() {
        return $this->hasMany(EmployeeDtr::class,'emp_id');
    }

    public function educations() {
        return $this->hasMany(EmployeeEducation::class,'emp_id')->with(['school','course']);
    }

    public function eligibilities() {
        return $this->hasMany(EmployeeEligibility::class,'emp_id');
    }

    public function families() {
        return $this->hasMany(EmployeeFamily::class,'emp_id');
    }

    public function hobbies() {
        return $this->hasMany(EmployeeHobby::class,'emp_id');
    }

    public function ipcrs() {
        return $this->hasMany(EmployeeIpcrf::class,'emp_id')->with(['ratings','mfo','ipcrtype','period']);
    }

    public function leaves() {
        return $this->hasMany(EmployeeLeave::class,'emp_id')->with(['leaveType','leaveDays','leaveCard','leaveDetails']);
    }

    public function licenses() {
        return $this->hasMany(EmployeeLicenseNumber::class,'emp_id');
    }

    public function memberships() {
        return $this->hasMany(EmployeeMembership::class,'emp_id');
    }

    public function distinctions() {
        return $this->hasMany(EmployeeNonacademicDistinction::class,'emp_id');
    }

    public function payrolls() {
        return $this->hasMany(EmployeePayroll::class,'emp_id')->with('payrollItem');
    }

    public function payrollsGenerations() {
        return $this->hasManyThrough(EmployeePayrollGeneration::class,EmployeePayroll::class);
    }

    public function trainings() {
        return $this->hasMany(EmployeeTraining::class,'emp_id')->with(['trainingType']);
    }

    public function userAccount() {
        return $this->hasOne(EmployeeUserAccount::class,'emp_id');
    }

    public function voluntaryWorks() {
        return $this->hasMany(EmployeeVoluntaryWork::class,'emp_id');
    }

    public function workExperiences() {
        return $this->hasMany(EmployeeWorkExperience::class,'emp_id')->with(['position','employmentStat']);;
    }

    public function getLeaveCredits($type) {

        $today = \Carbon\Carbon::now();
        $max = DB::table('leave_types')->where('id',$type)->first()->maxvalue;

        $leave_credits = $this->hasMany(EmployeeLeave::class,'emp_id')
                    ->where('leavetype_id',$type)
                    ->join('employee_leave_dates','employee_leave_dates.employeeleave_id','=','employee_leaves.id')
                    ->whereBetween('leavedate',[$today->startOfYear()->toDateString(),$today->endOfYear()->toDateString()])
                    ->count();

        return ($max-$leave_credits);
    }

}

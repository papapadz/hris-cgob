<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Models\EmployeeLeave;
use App\Models\EmployeeLeaveDate;
use App\Models\LeaveCard;
use App\Models\LeaveType;
use App\Models\Appointment;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $leave = $this::createEmployeeLeave(array(
            'emp_id' => $request->emp_id,
            'leavetype_id' => $request->leavetype_id,
            'remarks' => $request->remarks,
            'days' => $request->leavedays,
        ));
        
        $this::createLeaveCard($leave,$leave->numdays);
        return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leave = EmployeeLeave::find($id);
        return view('pages.leave.view')
            ->with([
                'index' => 6,
                'employee' => $leave->employee,
                'appointments' => listAppointments($id),
                'leave' => $leave
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function initial($emp_id) {
        $appointment = Appointment::select('startdate')->where('emp_id',$emp_id)->latest()->first();
        $startdate = $appointment->startdate;
        $last_of_month = $startdate->lastOfMonth();
        $days = $last_of_month->diffInDays($appointment->startdate);
        $leave_table = DB::table('leave_table')->where([['unit','day'],['num',$days]])->first();

        $leave = createEmployeeLeave(array(
            'emp_id' => $emp_id,
            'leavetype_id' => LeaveType::select('id')->where('leavetype','Initial Leave Credits')->first()->id,
            'remarks' => 'Initial leave credits of the employee',
            'numdays' => $appointment->startdate->toDateString()
        ));

        $this::createLeaveCard($leave,$leave_table->value);
        return 1;
    }

    public function increment($emp_id,$dateadd) {

        $leave = createEmployeeLeave(array(
            'emp_id' => $emp_id,
            'leavetype_id' => LeaveType::select('id')->where('leavetype','Monthly Increment')->first()->id,
            'remarks' => 'Increment of the month',
            'numdays' => $dateadd
        ));

        $this::createLeaveCard($leave,1.25);
        return 1;
    }

    public function createEmployeeLeave($data) {
       
        $days = explode(',',$data['days']);

        $leave = EmployeeLeave::create([
            'emp_id' => $data['emp_id'],
            'leavetype_id' => $data['leavetype_id'],
            'remarks' => $data['remarks'],
            'numdays' => count($days)
        ]);

        foreach($days as $day) {
            EmployeeLeaveDate::create([
                'employeeleave_id' => $leave->id,
                'leavedate' => Carbon::parse($day)->toDateString()
            ]);
        }

        return $leave;
    }

    public function createLeaveCard($leave,$value) {

        $vl = $sl = 0;
        $recentleavedata = EmployeeLeave::select('sl','vl')
            ->where('emp_id',$leave->emp_id)
            ->join('leave_cards','leave_cards.leave_id','=','employee_leaves.id')
            ->orderBy('leave_cards.created_at','desc')
            ->first();

        if($recentleavedata) {
            $vl = $recentleavedata->vl;
            $sl = $recentleavedata->sl;
        }

        LeaveCard::create([
            'leave_id' => $leave->id,
            'value' => $value,
            'vl' => computeLeave($vl,$value,'vl',$leave->leaveType),
            'sl' => computeLeave($sl,$value,'sl',$leave->leaveType)
        ]);
    }
}

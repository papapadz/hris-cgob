<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Appointment;
use App\Models\EmployeeIpcrf;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.employee.index')->with([
            'employees' => Employee::orderBy('lastname')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = Employee::create($request->all());
        Appointment::create($request->all());

        $filename = FileController::upload($request->file('image'),'img');
        Employee::where('emp_id',$request->emp_id)->update([
            'image_url' => $filename
        ]);

        Session::flash('alert','success');
        Session::flash('title','Alright! ');
        Session::flash('message','Employee record created successfully.');
        $leave = new LeaveController;
        $leave->initial($request->emp_id);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $employee = Employee::find($id);
        return view('pages.employee.profile')
            ->with([
                'index' => $request['index'],
                'employee' => $employee,
                'appointments' => listAppointments($id),
                'ipcrs' => EmployeeIpcrf::select('emp_id','period_id','type_id')->where('emp_id',$id)->groupBy('emp_id','period_id','type_id')->get()
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeePayroll;
use App\Models\EmployeePayrollGeneration;
use App\Models\Employee;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get unique payroll date
        $data = EmployeePayrollGeneration::select('payrolldate')
            ->orderBy('payrolldate','desc')
            ->groupBy('payrolldate')
            ->get();
            
        $payrolls = [];
        foreach($data as $d) {
            //get the payroll generation by payrolldate
            $val = EmployeePayrollGeneration::where('payrolldate',$d->payrolldate)->first();
            array_push($payrolls,$val);
        }
        
        return view('pages.payroll.index')->with(['payrolls' => $payrolls]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $data = EmployeePayrollGeneration::where('payrolldate',EmployeePayrollGeneration::find($id)->payrolldate)
            ->with('employeePayroll')
            ->get();
        
        $emp = [];
        foreach($data as $d) {
            array_push($emp,$d->employeePayroll[0]->emp_id);
        }

        foreach(array_unique($emp) as $emp_id) {
            $employees = Employee::find($emp_id);
        }

        return view('pages.payroll.view')->with(['employees'=>$employees]);
        
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

<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\EmployeePayroll;
use App\Models\EmployeePayrollGeneration;
use App\Models\Employee;
use App\Models\PayrollGeneration;
use App\Models\PayrollItem;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // //get unique payroll date
        // $data = EmployeePayrollGeneration::select('payrolldate')
        //     ->orderBy('payrolldate','desc')
        //     ->groupBy('payrolldate')
        //     ->get();
            
        // $payrolls = [];
        // foreach($data as $d) {
        //     //get the payroll generation by payrolldate
        //     $val = EmployeePayrollGeneration::where('payrolldate',$d->payrolldate)->first();
        //     array_push($payrolls,$val);
        // }
        
        // return view('pages.payroll.index')->with(['payrolls' => $payrolls]);

        $payrolls = PayrollGeneration::orderBy('payroll_date','desc')->get();
        return view('pages.payroll.index')->with(['payrolls' => $payrolls]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        return view('pages.payroll.create')->with('employees',$employees);
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
        $payroll_date = Carbon::parse($request->pdate);
        
        if($payroll_date->day <= 15)
            $payroll_date->day == 1;
        else
            $payroll_date->day = 16;

        $payroll_generation = PayrollGeneration::firstOrCreate(
            [
                'payroll_date' => $payroll_date->toDateString()
            ],
            [
                'generated_by' => Auth::user()->emp_id
            ]
        );

        $employees = Employee::all();
        foreach($employees as $employee) {
            if($employee->payrolls) {
                $startdate = Carbon::parse($employee->appointments->startdate);
                if($payroll_date->greaterThanOrEqualTo($startdate)) {
                    foreach($employee->payrolls as $payroll) {
                        EmployeePayrollGeneration::updateOrCreate(
                            [
                                'employeepayroll_id' => $payroll->id,
                                'payroll_generation_id' => $payroll_generation->id,
                                'value' => $payroll->value
                            ]
                        );
                    }
                }
            }
        }
        Session::flash('alert','success');
        Session::flash('title','Alright! ');
        Session::flash('message','Payroll has been succcessfully generated.');
        return view('pages.payroll.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($emp_id)
    {   
        // $data = EmployeePayrollGeneration::where('payrolldate',EmployeePayrollGeneration::find($id)->payrolldate)
        //     ->with('employeePayroll')
        //     ->get();
        
        // $emp = [];
        // foreach($data as $d) {
        //     array_push($emp,$d->employeePayroll[0]->emp_id);
        // }

        // foreach(array_unique($emp) as $emp_id) {
        //     $employees = Employee::find($emp_id);
        // }

        // return view('pages.payroll.view')->with(['employees'=>$employees]);
        
        $payrollItems = PayrollItem::all();
        $employeePayrolls = EmployeePayroll::where('emp_id',$emp_id);
        
        return view('pages.payroll.edit')->with([
            'emp_id' => $emp_id,
            'payrollItems' => $payrollItems,
            'employeePayrolls' => $employeePayrolls
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
    public function update(Request $request, $emp_id)
    {
        if($request->has('payroll_items_delete'))
            foreach($request->payroll_items_delete as $item) 
                EmployeePayroll::where([
                    ['emp_id',$emp_id],['payrollitem_id',$item]
                ])->delete();
        
        if($request->has('payroll_items')) 
            foreach($request->payroll_items as $k => $item) {

                $employeePayroll = EmployeePayroll::firstOrCreate(
                        [
                            'emp_id' => $emp_id,
                            'payrollitem_id' => $item,
                            'value' => $request->payroll_item_values[$k]
                        ]
                    );

                if($employeePayroll->wasRecentlyCreated === true)
                    EmployeePayroll::where([
                            ['emp_id',$emp_id],['payrollitem_id',$item],['id','!=',$employeePayroll->id]
                        ])->oldest()->delete();
            }

        Session::flash('alert','success');
        Session::flash('title','Alright! ');
        Session::flash('message','Employee payroll data has been updated.');
        return route('payroll.create');
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

    public function view($id) {

        $employee_payroll_generations = EmployeePayrollGeneration::select('emp_id')
            ->where('payroll_generation_id',$id)
            ->join('employee_payrolls','employee_payrolls.id','employee_payroll_generations.employeepayroll_id')
            ->groupBy('emp_id')
            ->get();
            
        return view('pages.payroll.view')->with(
            [
                'payroll_generation_id' => $id,
                'employee_payroll_generations' => $employee_payroll_generations
            ]);
    }
}

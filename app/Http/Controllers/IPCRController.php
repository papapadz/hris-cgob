<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\EmployeeIpcrf;
use App\Models\EmployeeIpcrfRating;
use App\Models\MFO;
use App\Models\IPCRPeriod;
use DB;
use Carbon\Carbon;

class IPCRController extends Controller
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
    public function create(Request $request)
    {
        $ipcr = null;
        if($request['ipcr'])
            $ipcr = EmployeeIpcrf::find($request->ipcr);

        $data = array(
            'employee' =>Employee::find($request->emp_id),
            'ipcr' => $ipcr
        );

        return view('pages.ipcr.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $period = IPCRPeriod::firstOrcreate($request->only(['year','type','period']));
        EmployeeIpcrf::create([
            'emp_id' => $request->emp_id,
            'type_id' => $request->type_id,
            'target' => $request->target,
            'mfo_id' => $request->mfo_id,
            'period_id' => $period->id
        ]);
        return redirect()->back()->with('fireAlert','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function view($period,$emp_id) {

        $ipcrs = EmployeeIpcrf::where([
            ['emp_id',$emp_id],
            ['period_id',$period]
        ])->get();
        
        return view('pages.ipcr.view')
            ->with([
                'ipcrs' => $ipcrs,
                'employee' => Employee::find($emp_id)
            ]);
    }

    public function addAccomplishment(Request $request) {
        EmployeeIpcrf::where('id',$request->id)->update(['accomplishment'=>$request->accomplishment]);
        return 1;
    }

    public function addRating(Request $request) {
        EmployeeIpcrfRating::updateOrCreate(
            ['rating_by'=>$request->emp_id,'ipcr_id'=>$request->id],
            [
                'quality'=>$request->quality,
                'effectiveness'=>$request->effectiveness,
                'timeliness'=>$request->timeliness,
                'remarks'=>$request->remarks
            ]
        );
        return 1;
    }
}

@extends('dashboard.base')

@section('css')
<style>
  label {
    font-weight: bold;
  }
</style>
@endsection


@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-boxed">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#employment" role="tab" aria-controls="employment">
                Leave ID No. <b>{{ $leave->id }}</b> <span>{{ leaveStatus($leave->status) }}
              </a></li>
            </ul>
            {{-- <form id="employment-info" method="POST" action="{{ route('ipcr.store') }}" enctype="multipart/form-data"> --}}
              
              <div class="tab-content">
                  @csrf
                  <div class="tab-pane active" id="employment" role="tabpanel">
                    @if(isset($employee))
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Employee ID</label>
                            <input name="emp_id" readonly type="text" value="{{ $employee->emp_id }}" class="form-control-plaintext">
                        </div>
                        <div class="col-md-6">
                            <label>Name</label>
                            <input type="text" value="{{ getEmployeeName($employee->emp_id) }}" readonly class="form-control-plaintext">
                        </div>
                    </div>
                    @endif
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label>Dates</label><br>
                        @foreach($leave->leaveDays as $day)
                            <span class="badge badge-primary">{{ Carbon\Carbon::parse($day->leavedate)->toFormattedDateString() }}</span>
                        @endforeach
                      </div>
                      <div class="col-md-6">
                        <label>Leave Type</label><br>
                        {{ $leave->leaveType->leavetype }}  
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-12">
                        <label>Remarks</label><br>
                        {{ $leave->remarks }}
                    </div>
                  </div>
                  <hr>
                  <div class="form-group row">
                    <div class="col-12">
                        <button class="btn btn-success mb-1">Approve</button>
                        <button class="btn btn-warning mb-1">Print</button>
                        <button class="btn btn-danger mb-1">Cancel</button>
                        <button class="btn btn-danger mb-1">Disapprove</button>
                        <a href="{{ url('employees/'.$employee->emp_id.'?index=6') }}" class="btn btn-primary">{{ __('Return') }}</a> 
                    </div>
                  </div>
                </div>
            {{-- </form> --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@extends('dashboard.base')

@section('css')
<style>
  label {
    font-weight: bold;
  },
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <img src="{{ $employee->image_url }}" class="card-img-top" height="100%" width="100%">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>{{ $employee->emp_id }}</strong></li>
                    <li class="list-group-item">{{ getEmployeeName($employee->emp_id) }}</li>
                    <li class="list-group-item">{{ $employee->appointments->plantilla->position->position }}</li>
                    <li class="list-group-item">{{ $employee->appointments->department->department }}</li>
                </ul>
            </div>
        </div>
        <div class="col-md-8 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#basic">I</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#address">II</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#appointment">III</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#education">IV</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#eligibility">V</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#training">VI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#leave">VII</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#dtr">VIII</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#ipcr">IX</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="basic" role="tabpanel">
                            @include('pages.employee.include.basic-info')
                        </div>
                        <div class="tab-pane" id="address" role="tabpanel">
                            @include('pages.employee.include.address-info')
                        </div>
                        <div class="tab-pane" id="appointment" role="tabpanel">
                            @include('pages.appointment.include.appointment-list')
                        </div>
                        <div class="tab-pane" id="education" role="tabpanel">
                            @include('pages.education.include.education-list')
                        </div>
                        <div class="tab-pane" id="eligibility" role="tabpanel">
                            @include('pages.eligibility.include.eligibility-list')
                        </div>
                        <div class="tab-pane" id="training" role="tabpanel">
                            @include('pages.training.include.training-list')
                        </div>
                        <div class="tab-pane" id="leave" role="tabpanel">
                            @include('pages.leave.include.leave-list')
                        </div>
                        <div class="tab-pane" id="dtr" role="tabpanel">
                            @include('pages.dtr.include.dtr-list')
                        </div>
                        <div class="tab-pane" id="ipcr" role="tabpanel">
                            @include('pages.ipcr.include.ipcr-list')
                        </div>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
$(document).ready(function() {
    $('input').prop('readonly',true)
    $('input').prop('class','form-control-plaintext')
    $('table').DataTable()
    select2.select2('destroy')
});
</script>
@endsection
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
              <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#ipcr" role="tab" aria-controls="employment">
                IPCR
              </a></li>
            </ul>
            <form id="ipcr-info" method="POST" action="{{ route('ipcr.store') }}" enctype="multipart/form-data">
              
              <div class="tab-content">
                  @csrf
                  <div class="tab-pane active" id="ipcr" role="tabpanel">
                    @if(isset($employee))
                    <div class="form-group row">
                        <div class="col-6">
                            <label>Employee ID</label>
                            <input name="emp_id" readonly type="text" value="{{ $employee->emp_id }}" class="form-control-plaintext">
                        </div>
                        <div class="col-6">
                            <label>Name</label>
                            <input type="text" value="{{ getEmployeeName($employee->emp_id) }}" readonly class="form-control-plaintext">
                        </div>
                    </div>
                    @endif
                    @include('pages.ipcr.include.add')
                    <div class="form-group row">
                      <div class="col-12">
                        <button class="btn btn-block btn-success" type="submit">{{ __('Add') }}</button>
                        @if($ipcr)
                          <a href="{{ url('ipcr/'.$ipcr->id.'/'.$employee->emp_id) }}" class="btn btn-block btn-primary">{{ __('Return') }}</a> 
                        @else
                          <a href="{{ url('employees/'.$employee->emp_id.'?index=8') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a> 
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
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
  @include('layouts.star-rating')
    <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-boxed">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#employment" role="tab" aria-controls="employment">
                @if($ipcrs->first())
                  {{ $ipcrs->first()->ipcrtype->type }}
                @else
                N/A
                @endif
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
                    <div class="form-group row">
                        <div class="col-12">
                            <label>Period</label>
                            <input name="emp_id" readonly type="text" value="@if($ipcrs->first()) {{$ipcrs->first()->period->type}} {{$ipcrs->first()->period->period}} {{$ipcrs->first()->period->year}} @endif" class="form-control-plaintext">
                        </div>
                    </div>
                    @endif
                    @include('pages.ipcr.include.ipcr-items-list')
                    <div class="form-group row">
                      <div class="col-12">
                        @if($ipcrs->first())
                          <a href='{{ url("ipcr/create?emp_id=".$employee->emp_id."&ipcr=".$ipcrs->first()->id) }}' class="btn btn-block btn-success">{{ __('Add') }}</a>
                        @else
                          <a href='{{ url("ipcr/create?emp_id=".$employee->emp_id) }}' class="btn btn-block btn-success">{{ __('Add') }}</a>
                        @endif
                        {{-- <a href="{{ route('employees.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>  --}}
                      </div>
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
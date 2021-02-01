@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ __('Create Employee Record') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('notes.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label>Employee ID Number</label>
                                <input class="form-control" type="text" placeholder="{{ __('Employee ID Number') }}" name="emp_id" required autofocus>
                            </div>

                            <div class="form-group row">
                                <label>Last Name</label>
                                <input class="form-control" type="text" placeholder="{{ __('Last Name') }}" name="lastname" required>
                            </div>

                            <div class="form-group row">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="{{ __('First Name') }}" name="firstname" required>
                            </div>

                            <div class="form-group row">
                                <label>Middle Name</label>
                                <input class="form-control" type="text" placeholder="{{ __('Middle Name') }}" name="middlename">
                            </div>

                            <div class="form-group row">
                                <label>Extension</label>
                                <input class="form-control" type="text" placeholder="{{ __('Middle Name') }}" name="middlename">
                            </div>
                            
                            <div class="form-group row">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control" name="birthdate" required/>
                            </div>

                            <div class="form-group row">
                                <label>Citizenship</label>
                                <select id="ctzn" class="form-control" name="status_id">
                                <option>adsad</option>
                                <option>adasdasd</option>
                                    @foreach(getCitizenship() as $citizenship)
                                        <option value="{{ $citizenship_id->id }}">{{ $citizenship_id->citizenship }}</option>
                                    @endforeach
                                </select>
                            </div>
 
                            <button class="btn btn-block btn-success" type="submit">{{ __('Add') }}</button>
                            <a href="{{ route('employees.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a> 
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('javascript')
<script>
$(document).ready(function () { 
    alert($)
});
</script>
@endsection
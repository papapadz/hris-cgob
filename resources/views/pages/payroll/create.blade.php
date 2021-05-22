@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Payroll') }}
                      <span class="float-right form-inline">
                          <form action="{{ route('payroll.store') }}" method="post"> 
                          @csrf 
                          Payroll Date<input class="form-control" type="date" name="pdate" value="{{ Carbon\Carbon::now()->toDateString() }}">
                          <button type="submit" class="btn btn-success ">{{ __('Save and Generate') }}</button>
                          </form>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                          <thead>
                            <tr>
                              <th>Employee ID</th>
                              <th>Name</th>
                              <th>Department</th>
                              <th>Position</th>
                              <th>Salaries and Benefits</th>
                              <th>Deductions</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($employees as $employee)
                            
                              <tr>
                                <td>{{ $employee->emp_id }}</td>
                                <td>{{ getEmployeeName($employee->emp_id) }}</td>
                                <td>{{ $employee->appointments->department->department }}</td>
                                <td>{{ $employee->appointments->plantilla->position->position }}</td>
                                <td>
                                    @php
                                        $empPayrolls = $employee->payrolls;
                                    @endphp
                                    <ul class="list-group list-group-flush">
                                        @foreach($empPayrolls as $payroll)
                                            @if($payroll->payrollItem->type==1)
                                                <li class="list-group-item text-success">{{ $payroll->payrollItem->payrollitem }}: {{ number_format($payroll->value,2,'.',',') }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul class="list-group list-group-flush ">
                                        @foreach($empPayrolls as $payroll)
                                            @if($payroll->payrollItem->type==0)
                                                <li class="list-group-item text-danger">{{ $payroll->payrollItem->payrollitem }}: {{ number_format($payroll->value,2,'.',',') }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                  <a href="{{ url('/employee/payroll/' . $employee->emp_id) }}" class="btn btn-block btn-primary">Edit</a>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
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
  $('table').DataTable({
      'order': [1,'asc']
  })
  
})
</script>
@endsection


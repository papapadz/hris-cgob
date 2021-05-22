@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Payroll') }}
                      <a href="{{ route('payroll.create') }}" class="btn btn-success float-right">{{ __('Generate Payroll') }}</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                          <thead>
                            <tr>
                              <th>Payroll Date</th>
                              <th>Number of Employees</th>
                              <th>Generated By</th>
                              <th>Date Generated</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($payrolls as $payroll)
                            <tr>
                                <td>{{ Carbon\Carbon::parse($payroll->payroll_date)->toDateString() }}</td>
                                <td>
                                  @php
                                    $arr = [];
                                    foreach($payroll->employeePayrollGeneration as $emp_payroll_generation)
                                      foreach($emp_payroll_generation->employeePayroll as $emp_payroll)
                                      if(!in_array($emp_payroll->emp_id,$arr))
                                          array_push($arr,$emp_payroll->emp_id);
                                    
                                  @endphp
                                  {{ count($arr) }}
                                </td>
                                <td>{{ getEmployeeName($payroll->generated_by) }}</td>
                                <td>{{ Carbon\Carbon::parse($payroll->created_at)->toDateTimeString() }}</td>
                                <td>
                                  <a href="{{ url('employee/payroll/generation/' . $payroll->id) }}" class="btn btn-block btn-primary">View</a>
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
      'order': [0,'desc']
  })
})
</script>
@endsection


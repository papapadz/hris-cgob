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
                              <th>Name</th>
                              <th>Number of Employees</th>
                              <th>Generated By</th>
                              <th>Date Generated</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($employees as $employee)
                              <tr>
                                <td>{{ getEmployeeName($employee->emp_id) }}</td>
                                <td></td>
                                <td></td>
                                <td>{{ $payroll->created_at }}</td>
                                <td>
                                  <a href="{{ url('/payroll/' . $payroll->id) }}" class="btn btn-block btn-primary">View</a>
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

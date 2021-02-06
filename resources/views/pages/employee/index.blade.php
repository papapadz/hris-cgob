@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Employee') }}
                      <a href="{{ route('employees.create') }}" class="btn btn-success float-right">{{ __('Add Employee') }}</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                          <thead>
                            <tr>
                              <th>Employee ID</th>
                              <th>Name</th>
                              <th>Position</th>
                              <th>Department</th>
                              <th>Status</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($employees as $employee)
                              <tr>
                                <td><strong>{{ $employee->emp_id }}</strong></td>
                                <td>{{ getEmployeeName($employee->emp_id) }}</td>
                                <td>{{ $employee->appointments->plantilla->position->position }}</td>
                                <td>{{ $employee->appointments->department->department }}</td>
                                <td>{{ $employee->appointments->employmentStat->employmenttype }}</td>
                                <td>
                                  <a href="{{ url('/employees/' . $employee->emp_id) }}" class="btn btn-block btn-primary">View</a>
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
  $('table').DataTable()
})
</script>
@endsection


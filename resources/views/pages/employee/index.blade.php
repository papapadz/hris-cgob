@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Employee') }}</div>
                    <div class="card-body">
                        <div class="row"> 
                          <a href="{{ route('employees.create') }}" class="btn btn-primary m-2">{{ __('Add Employee') }}</a>
                        </div>
                        <br>
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($employees as $employee)
                            <tr>
                              <td><strong>{{ $employee->emp_id }}</strong></td>
                              <td><strong>{{ $employee->name }}</strong></td>
                              <td>{{ $employee->appointments->plantilla->position }}</td>
                              <td>{{ $employee->appointments->department }}</td>
                              <td>{{ $employee->employmentStat }}</td>
                              <td>
                                <a href="{{ url('/employee/' . $employee->emp_id) }}" class="btn btn-block btn-primary">View</a>
                              </td>
                              <td>
                                <form action="{{ route('employees.destroy', $employee->emp_id ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-block btn-danger">Delete</button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $employees->links() }}
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection


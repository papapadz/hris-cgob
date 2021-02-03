<table class="table table-responsive-sm table-striped">
    <thead>
      <tr>
        @if(!isset($employee))
        <th>Employee ID</th>
        <th>Name</th>
        @endif
        <th>Date</th>
        <th>Position</th>
        <th>Department</th>
        <th>Status</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($employee->eligibilities as $eligibility)
        <tr>
        @if(!isset($employee))
          <td><strong>{{ $employee->emp_id }}</strong></td>
          <td>{{ getEmployeeName($employee->emp_id) }}</td>
        @endif
          <td>{{ $appointment->startdate->format('Y-m-d') }} 
            to 
            @if($appointment->enddate==null) Present @else {{ $appointment->enddate->format('Y-m-d') }} @endif
          </td>
          <td>{{ $appointment->plantilla->position->position }}</td>
          <td>{{ $appointment->department->department }}</td>
          <td>{{ $appointment->employmentStat->employmenttype }}</td>
          <td>
            <a href="{{ url('/appointments/' . $appointment->id) }}" class="btn btn-block btn-primary">View</a>
          </td>
          <td>
            <form action="{{ route('appointments.destroy', $employee->emp_id ) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-block btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
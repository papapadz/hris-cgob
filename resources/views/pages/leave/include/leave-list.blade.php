<table class="table table-responsive-sm table-striped">
    <thead>
      <tr>
        @if(!isset($employee))
        <th>Employee ID</th>
        <th>Name</th>
        @endif
        <th>Date</th>
        <th>Type</th>
        <th>VL</th>
        <th>SL</th>
        <th>Status</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($employee->leaves as $leave)
        <tr>
        @if(!isset($employee))
          <td><strong>{{ $employee->emp_id }}</strong></td>
          <td>{{ getEmployeeName($employee->emp_id) }}</td>
        @endif
          <td>
            {{ $leave->leaveDays->first()->leavedate->format('m-d-Y') }}
            @if($leave->numdays>1)
                to {{ $leave->leaveDays[count($leave->leaveDays)-1]->leavedate->format('m-d-Y') }}
            @endif
          </td>
          <td>{{ $leave->leaveType->leavetype }}</td>
          <td>{{ $leave->vl }}</td>
          <td>{{ $leave->sl }}</td>
          <td>{{ leaveStatus($leave->status) }}</td>
          <td>
            <a href="{{ url('/leaves/' . $leave->id) }}" class="btn btn-block btn-primary">View</a>
          </td>
          <td>
            <form action="{{ route('appointments.destroy', $leave->id ) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-block btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
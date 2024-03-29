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
          <td>{{ $leave->leaveDetails->vl }}</td>
          <td>{{ $leave->leaveDetails->sl }}</td>
          <td>
            @if($leave->leaveType->is_leave)
              {{ leaveStatus($leave->status) }}
            @else
              <span class="badge badge-success">Update</span>
            @endif
          </td>
          <td>
            @if($leave->leaveType->is_leave)
              <a href="{{ url('/leaves/' . $leave->id) }}" class="btn btn-block btn-primary">View</a>
            @endif
          </td>
          <td>
            @if($leave->leaveType->is_leave)
            <form action="{{ route('appointments.destroy', $leave->id ) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-block btn-danger">Delete</button>
            </form>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
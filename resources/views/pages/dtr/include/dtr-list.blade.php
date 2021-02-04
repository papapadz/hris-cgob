<table class="table table-responsive-sm table-striped">
    <thead>
      <tr>
        @if(!isset($employee))
        <th>Employee ID</th>
        <th>Name</th>
        @endif
        <th>Date</th>
        <th>AM IN</th>
        <th>AM OUT</th>
        <th>PM IN</th>
        <th>PM OUT</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($employee->dtrs as $dtr)
        <tr>
        @if(!isset($employee))
          <td><strong>{{ $employee->emp_id }}</strong></td>
          <td>{{ getEmployeeName($employee->emp_id) }}</td>
        @endif
          <td>{{ formatDisplay('date',$dtr->dtrdate) }}</td>
          <td>{{ formatDisplay('time',$dtr->amin) }}</td>
          <td>{{ formatDisplay('time',$dtr->amout) }}</td>
          <td>{{ formatDisplay('time',$dtr->pmin) }}</td>
          <td>{{ formatDisplay('time',$dtr->pmout) }}</td>
          <td>
            <a href="{{ url('/dtrs/' . $dtr->id) }}" class="btn btn-block btn-primary">View</a>
          </td>
          <td>
            <form action="{{ route('appointments.destroy', $dtr->id ) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-block btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
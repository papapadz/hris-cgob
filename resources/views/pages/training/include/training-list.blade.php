<table class="table table-responsive-sm table-striped">
    <thead>
      <tr>
        @if(!isset($employee))
        <th>Employee ID</th>
        <th>Name</th>
        @endif
        <th>Title</th>
        <th>Date</th>
        <th>Type</th>
        <th>Hrs</th>
        <th>Venue</th>
        <th>Sponsor</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($employee->trainings as $training)
        <tr>
        @if(!isset($employee))
          <td><strong>{{ $employee->emp_id }}</strong></td>
          <td>{{ getEmployeeName($employee->emp_id) }}</td>
        @endif
          <td>{{ $training->trainingtitle }}</td>
          <td>{{ $training->startdate->format('m-d-Y') }} to {{ $training->enddate->format('m-d-Y') }}</td>
          <td>{{ $training->trainingType->trainingtype }}</td>
          <td>{{ $training->hrs }}</td>
          <td>{{ $training->venue }}</td>
          <td>{{ $training->sponsor }}</td>
          <td>
            <a href="{{ url('/trainings/' . $training->id) }}" class="btn btn-block btn-primary">View</a>
          </td>
          <td>
            <form action="{{ route('trainings.destroy', $training->id ) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-block btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
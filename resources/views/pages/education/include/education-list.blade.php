<table class="table table-responsive-sm table-striped">
    <thead>
      <tr>
        @if(!isset($employee))
        <th>Employee ID</th>
        <th>Name</th>
        @endif
        <th>Level</th>
        <th>Date</th>
        <th>Degree</th>
        <th>Units</th>
        <th>Honors</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($employee->educations as $education)
        <tr>
        @if(!isset($employee))
          <td><strong>{{ $education->employee->emp_id }}</strong></td>
          <td>{{ getEmployeeName($education->employee->emp_id) }}</td>
        @endif
          <td>{{ listEducationLevel($education->level) }}</td>
          <td>{{ $education->yearstarted->format('Y') }} 
            to 
            @if($education->yeargraduated==null) Present @else {{ $education->yeargraduated->format('Y') }} @endif
          </td>
          <td>{{ $education->course->course }}</td>
          <td>{{ $education->units }}</td>
          <td>{{ $education->honors }}</td>
          <td>
            <a href="{{ url('/appointments/' . $education->id) }}" class="btn btn-block btn-primary">View</a>
          </td>
          <td>
            <form action="{{ route('appointments.destroy', $education->id ) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-block btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
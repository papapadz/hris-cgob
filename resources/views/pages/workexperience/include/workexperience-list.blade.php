<table class="table table-responsive-sm table-striped">
    <thead>
      <tr>
        @if(!isset($employee))
        <th>Employee ID</th>
        <th>Name</th>
        @endif
        <th>Date</th>
        <th>Position</th>
        <th>Company</th>
        <th>Salary</th>
        <th>SG-Step</th>
        <th>Status</th>
        <th>Government</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($employee->workExperiences as $workExperience)
        <tr>
        @if(!isset($employee))
          <td><strong>{{ $employee->emp_id }}</strong></td>
          <td>{{ getEmployeeName($employee->emp_id) }}</td>
        @endif
          <td>{{ $workExperience->startdate->format('Y-m-d') }} 
            to 
            @if($workExperience->enddate==null) Present @else {{ $workExperience->enddate->format('Y-m-d') }} @endif
          </td>
          <td>{{ $workExperience->position->position }}</td>
          <td>{{ $workExperience->company }}</td>
          <td>{{ displayMonetary($workExperience->salary) }}</td>
          <td>{{ $workExperience->sg }} - {{ $workExperience->step }}</td>
          <td>{{ $workExperience->employmentStat->employmenttype }}</td>
          <td>{{ displayTrueFalse($workExperience->isgovernment) }}</td>
          <td>
            <a href="{{ url('/appointments/' . $workExperience->id) }}" class="btn btn-block btn-primary">View</a>
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
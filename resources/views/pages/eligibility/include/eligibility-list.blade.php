<table class="table table-responsive-sm table-striped">
    <thead>
      <tr>
        @if(!isset($employee))
        <th>Employee ID</th>
        <th>Name</th>
        @endif
        <th>Eligibility</th>
        <th>License No.</th>
        <th>Confer Date</th>
        <th>Confer Place</th>
        <th>Rating</th>
        <th>Expiry Date</th>
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
          <td>{{ $eligibility->eligibilityType->eligibility }}</td>
          <td>{{ $eligibility->licensenum }}</td>
          <td>{{ $eligibility->startdate->format('Y-m-d') }}</td>
          <td>{{ $eligibility->place }}</td>
          <td>{{ $eligibility->rating }}%</td> 
          <td>
            @if($eligibility->enddate!=null)  
                {{ $eligibility->enddate->format('Y-m-d') }}
            @else
                N/A
            @endif
          </td>
          <td>
            <a href="{{ url('/appointments/' . $eligibility->id) }}" class="btn btn-block btn-primary">View</a>
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
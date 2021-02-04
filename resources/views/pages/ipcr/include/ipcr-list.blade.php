<table class="table table-responsive-sm table-striped">
    <thead>
      <tr>
        @if(!isset($employee))
        <th>Employee ID</th>
        <th>Name</th>
        @endif
        <th>Date</th>
        <th>Target</th>
        <th>Accomplishment</th>
        <th>Self Rating</th>
        <th>Supervisor's Rating</th>
        <th>Ave. Rating</th>
        <th>Grade</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($employee->ipcrfs as $ipcr)
        <tr>
        @if(!isset($employee))
          <td><strong>{{ $employee->emp_id }}</strong></td>
          <td>{{ getEmployeeName($employee->emp_id) }}</td>
        @endif
          <td>{{ Carbon\Carbon::parse($ipcr->ipcrfdate)->year }} Q{{ Carbon\Carbon::parse($ipcr->ipcrfdate)->quarter }}</td>
          <td>{{ $ipcr->target }}</td>
          <td>{{ $ipcr->accomplishment }}</td>
          <td>
            @if($ipcr->rating)
              {{ $ipcr->rating->selfrating }}
            @else
              N/A
            @endif
          </td>
          <td>
            @if($ipcr->rating)
              {{ $ipcr->rating->supervisorrating }}
            @else
              N/A
            @endif
          </td>
          <td>
            @if($ipcr->rating)
              @php
                $ave = ($ipcr->rating->selfrating + $ipcr->rating->supervisorrating)/2;
                echo number_format($ave,2);
              @endphp
            @else
              N/A
            @endif
          </td>
          <td>
            @if($ipcr->rating)
              {{ getIpcrGrade($ave) }}
            @else
              N/A
            @endif
          </td>
          <td>
            <a href="{{ url('/leaves/' . $ipcr->id) }}" class="btn btn-block btn-primary">View</a>
          </td>
          <td>
            <form action="{{ route('appointments.destroy', $ipcr->id ) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-block btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
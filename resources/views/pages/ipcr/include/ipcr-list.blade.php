<table class="table table-responsive-sm table-striped">
    <thead>
      <tr>
        @if(!isset($employee))
        <th>Employee ID</th>
        <th>Name</th>
        @endif
        <th>Date</th>
        <th>Rating</th>
        <th>Grade</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($ipcrs as $ipcr)
        <tr>
        @if(!isset($employee))
          <td><strong>{{ $employee->emp_id }}</strong></td>
          <td>{{ getEmployeeName($employee->emp_id) }}</td>
        @endif
          <td>{{ $ipcr->period->year }}</td>
          <td>{{ getIPCRAverage($ipcr->emp_id,$ipcr->period_id) }}</td>
          <td>N/A</td>
          <td>
            <a href="{{ url('/ipcr/'.$ipcr->period->id.'/'.$employee->emp_id) }}" class="btn btn-block btn-primary">View</a>
          </td>
          <td>
            <form  method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-block btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
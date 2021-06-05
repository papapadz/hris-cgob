@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Applicants') }}
                      <button class="btn btn-success float-right" onclick="newApplicant()">{{ __('New Applicant') }}</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                          <thead>
                            <tr>
                              <th>Name of Applicant</th>
                              <th>Current Position</th>
                              <th>Training Hrs</th>
                              <th>Position Applying For</th>
                              <th>Date Applied</th>
                              <th>Status</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($applicants as $applicant)
                            <tr>
                                <td>{{ getEmployeeName($applicant->applicant_id) }}</td>
                                <td>{{ $applicant->employee->workExperiences->first() ?? 'N/A' }}</td>
                                <td>{{ $applicant->employee->trainings->sum('hrs') }}</td>
                                <td>{{ $applicant->plantilla->position->position }} ({{ $applicant->plantilla->plantilla }})</td>
                                <td>{{ Carbon\Carbon::parse($applicant->created_at)->toDateTimeString() }}</td>
                                <td></td>
                                <td>
                                  <a href="{{ url('applicant/' . $applicant->id) }}" class="btn btn-block btn-primary">View</a>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')
<script>
$(document).ready(function() {
  $('table').DataTable({
      'order': [0,'desc']
  })
})

function newApplicant() {
  Swal.fire({
    title: 'Do you want to save the changes?',
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: `Save`,
    denyButtonText: `Don't save`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      Swal.fire('Saved!', '', 'success')
    } else if (result.isDenied) {
      Swal.fire('Changes are not saved', '', 'info')
    }
  })
}
</script>
@endsection


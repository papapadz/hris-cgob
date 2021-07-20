@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Applicants') }}
                      <a class="btn btn-success float-right" href="{{ url('applicants/create') }}">{{ __('New Applicant') }}</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                          <thead>
                            <tr>
                              <th>Position</th>
                              <th>Plantilla Number</th>
                              <th>SG</th>
                              <th>Qualifications</th>
                              <th>Number of Applicants</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($applicants as $applicant)
                            <tr>
                                <td>{{ $applicant->plantilla->position->position }}</td>
                                <td>{{ $applicant->plantilla->plantilla }}</td>
                                <td>{{ $applicant->plantilla->position->sg }}</td>
                                <td>
                                  @if($applicant->plantilla->position->qualification)
                                    <table>
                                      <tr>
                                        <td><b>Education</b></td>
                                        <td><b>Work Experience (# of years)</b></td>
                                        <td><b>Training (# of hrs)</b></td>
                                      </tr>
                                      <tr>
                                        <td>{{ $applicant->plantilla->position->qualification->educationLevel->level }}</td>
                                        <td>{{ $applicant->plantilla->position->qualification->workexperience }}</td>
                                        <td>{{ $applicant->plantilla->position->qualification->training }}</td>
                                      </tr>
                                    </table>
                                  @else
                                  --None--
                                  @endif
                                </td>
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

// function newApplicant() {
//   Swal.fire({
//     title: 'Do you want to save the changes?',
//     showDenyButton: true,
//     showCancelButton: true,
//     confirmButtonText: `Save`,
//     denyButtonText: `Don't save`,
//   }).then((result) => {
//     /* Read more about isConfirmed, isDenied below */
//     if (result.isConfirmed) {
//       Swal.fire('Saved!', '', 'success')
//     } else if (result.isDenied) {
//       Swal.fire('Changes are not saved', '', 'info')
//     }
//   })
// }
</script>
@endsection


@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i>{{ __('Payroll') }}
                      <a href="#" class="btn btn-warning float-right">{{ __('Print all') }}</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                          <thead>
                            <tr>
                              <th>Employee ID</th>
                              <th>Name</th>
                              <th>Salaries and Benefits</th>
                              <th>Deductions</th>
                              <th>Summary</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($employee_payroll_generations as $payroll)
                            <tr>
                                <td>{{ $payroll->emp_id }}</td>
                                <td>{{ getEmployeeName($payroll->emp_id) }}</td>
                                <td>
                                  <ul class="list-group list-group-flush">
                                  @if(!empty($arr = getPayrollGenerationItems($payroll->emp_id,1,$payroll_generation_id)))
                                    @foreach ($arr['items'] as $item1)
                                    <li class="list-group-item text-success">
                                      <span class="text-success">
                                        <i class="cil-plus"></i>
                                        {{ $item1->payrollitem }}
                                        {{ number_format($item1->value,2,'.',',') }}
                                      </span>
                                    </li>
                                    @endforeach  
                                  @endif
                                  </ul>
                                </td>
                                <td>
                                  <ul class="list-group list-group-flush">
                                  @if(!empty($arr2 = getPayrollGenerationItems($payroll->emp_id,0,$payroll_generation_id)))
                                    @foreach ($arr2['items'] as $item2)
                                    <li class="list-group-item text-danger">
                                      <span class="text-danger">
                                        <i class="cil-minus"></i>
                                        {{ $item2->payrollitem }}
                                        {{ number_format($item2->value,2,'.',',') }}
                                      </span>
                                    </li>
                                    @endforeach  
                                  @endif
                                  </ul>
                                </td>
                                <td align="right">
                                  <p>Salaries and Benefits: <b>{{ number_format($arr['sum'],2,'.',',') }}</b></p>
                                  <p>Deductions: <b>{{ number_format($arr2['sum'],2,'.',',') }}</b></p>
                                  <p>Net Pay: <b>{{ number_format(floatval($arr['sum'])-floatval($arr2['sum']),2,'.',',') }}</b></p>
                                </td>
                                <td>
                                  <a href="#" class="btn btn-block btn-primary">View Payslip</a>
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
</script>
@endsection


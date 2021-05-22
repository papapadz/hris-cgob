@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                  <form action="{{ url('employee/payroll/'.$emp_id.'/update') }}">
                    <div class="card-header">
                      <strong>{{ $emp_id }} - {{ getEmployeeName($emp_id) }}</strong>
                      <button type="submit" class="btn btn-success float-right">{{ __('Save Payroll') }}</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                          <thead>
                            <tr>
                              <th></th>
                              <th>Payroll Item</th>
                              <th>Amount</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                            @foreach($payrollItems as $item)
                            @php
                            $pitem = $employeePayrolls->get()->where('payrollitem_id',$item->id)->first();
                            
                            @endphp
                            <tr>
                                <td>
                                  <input type="checkbox" class="form-control check" name="payroll_items[]" value="{{ $item->id }}"
                                  @if($pitem)
                                    checked
                                  @endif
                                  >
                                </td>
                                <td>
                                  @if($item->type==1)
                                  <span class="text-success">
                                    <i class="cil-plus"></i> 
                                  @else
                                  <span class="text-danger">
                                    <i class="cil-minus"></i>
                                  @endif
                                    {{ $item->payrollitem }}
                                  </span>
                                </td>
                                <td>
                                  <input class="form-control" type="number" step="0.01" name="payroll_item_values[]" 
                                  @if($pitem)
                                    value="{{ $pitem->value }}"
                                  @else
                                    value="{{ $item->value }}"
                                  @endif
                                  >
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                  </form>
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
      'order': [1,'desc']
  })

  $('input.check').change(function() {
    if(!this.checked) 
      $('form').append(
        '<input id="delete_item_'+this.value+'" type="number" name="payroll_items_delete[]" value="'+this.value+'" hidden>'
      )
    else
      $('input#delete_item_'+this.value).remove()
  })
})
</script>
@endsection


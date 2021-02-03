@extends('dashboard.base')

@section('css')
<style>
  label {
    font-weight: bold;
  }
</style>
@endsection

@section('content')
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-boxed">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#basic" role="tab" aria-controls="basic">Basic Information</a></li>
              <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#address" role="tab" aria-controls="address">Address</a></li>
              <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#employment" role="tab" aria-controls="employment">Appointment</a></li>
            </ul>
            <form id="employment-info" method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
              
              <div class="tab-content">
                  @csrf

                  <div class="tab-pane active" id="basic" role="tabpanel">
                    @include('pages.employee.include.basic-info')
                  </div>

                  <div class="tab-pane" id="address" role="tabpanel">
                    @include('pages.employee.include.address-info')
                  </div>

                  <div class="tab-pane" id="employment" role="tabpanel">
                    @include('pages.employee.include.employment-info')
                    <div class="form-group row">
                      <div class="col-12">
                        <button class="btn btn-block btn-success" type="submit">{{ __('Add') }}</button>
                        <a href="{{ route('employees.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a> 
                      </div>
                    </div>
                  </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function() {
        
        function getAjax(url,element,flag,id) {
            $.ajax({
                method: "GET",
                url: "{{ url('ajax/get') }}/"+url,
                data: { flag:flag, id:id }
            }).done(function( response ) {
                console.log(response)
                $('#'+element).empty()
                response.forEach(function (data, index, arr) {
                    $('#'+element).append(
                        '<option value="'+data.id+'">'+data[element]+'</option>'
                    )
                });
                if(flag==2)
                    getAjax('address','barangay',3,response[0].id)
            })
        }

        $('#province').on('change', function() {
            getAjax('address','town',2,$(this).val())
        })

        $('#town').on('change', function() {
            getAjax('address','barangay',3,$(this).val())
        })

        $('#position').on('change', function() {
            getAjax('plantilla','plantilla',0,$(this).val())
        })
    })
</script>
@endsection
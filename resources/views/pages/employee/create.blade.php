@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-md-12">
                <div class="nav-tabs-boxed">
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home">Home</a></li>
                      <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Profile</a></li>
                      <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages" role="tab" aria-controls="messages">Messages</a></li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane active" id="home" role="tabpanel">
                      <form method="POST" action="{{ route('notes.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label>Employee ID Number</label>
                                <input class="form-control" type="text" placeholder="{{ __('Employee ID Number') }}" name="emp_id" required autofocus>
                            </div>

                            <div class="form-group row">
                                <label>Last Name</label>
                                <input class="form-control" type="text" placeholder="{{ __('Last Name') }}" name="lastname" required>
                            </div>

                            <div class="form-group row">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="{{ __('First Name') }}" name="firstname" required>
                            </div>

                            <div class="form-group row">
                                <label>Middle Name</label>
                                <input class="form-control" type="text" placeholder="{{ __('Middle Name') }}" name="middlename">
                            </div>

                            <div class="form-group row">
                                <label>Extension</label>
                                <input class="form-control" type="text" placeholder="{{ __('Middle Name') }}" name="middlename">
                            </div>
                            
                            <div class="form-group row">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control" name="birthdate" required/>
                            </div>

                            <div class="form-group row">
                                <label>Citizenship</label>
                                <select id="ctzn" class="form-control"name="status_id">
                                    @foreach(getCitizenships() as $citizenship)
                                        <option value="{{ $citizenship->id }}">{{ $citizenship->citizenship }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row">
                                <label>Province</label>
                                <select id="province" class="form-control">
                                    <option disabled selected>Choose...</option>
                                    @foreach(listProvinces() as $province)
                                        <option value="{{ $province->id }}">{{ $province->province }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row">
                                <label>Town</label>
                                <select id="town" class="form-control"></select>
                            </div>

                            <div class="form-group row">
                                <label>Barangay</label>
                                <select id="barangay" name="address_id" class="form-control"></select>
                            </div>
 
                            <button class="btn btn-block btn-success" type="submit">{{ __('Add') }}</button>
                            <a href="{{ route('employees.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a> 
                        </form>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    
<script type="text/javascript">
    $(document).ready(function() {

        function getAddress(element,flag,id) {
            $.ajax({
                method: "GET",
                url: "{{ url('ajax/get/address') }}",
                data: { flag:flag, id:id }
            }).done(function( response ) {
                $('#'+element).empty()
                response.forEach(function (data, index, arr) {
                    $('#'+element).append(
                        '<option value="'+data.id+'">'+data[element]+'</option>'
                    )
                });
            })
        }

        $('#province').on('change', function() {
            getAddress('town',2,$(this).val())
        })

        $('#town').on('change', function() {
            getAddress('barangay',3,$(this).val())
        })
    })
</script>
@endsection
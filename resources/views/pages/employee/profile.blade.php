@extends('dashboard.base')

@section('css')
<style>
  label {
    font-weight: bold;
  },
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            @include('pages.employee.include.card')
        </div>
        <div class="col-md-9 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-header">
                  <ul id="profile-tabs" class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" title="Basic Information" data-toggle="tooltip" data-placement="top" href="#tab1">Basic Information</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link"  title="Address" data-toggle="tooltip" data-placement="top"  href="#address">II</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link"  title="Work Experience" data-toggle="tooltip" data-placement="top" href="#appointment">III</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  title="Educational Background" data-toggle="tooltip" data-placement="top"  href="#education">IV</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  title="Eligibility" data-toggle="tooltip" data-placement="top" href="#eligibility">V</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  title="Trainings" data-toggle="tooltip" data-placement="top" href="#training">VI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  title="Leave Card" data-toggle="tooltip" data-placement="top" href="#leave">VII</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  title="Daily Time Record" data-toggle="tooltip" data-placement="top" href="#dtr">VIII</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  title="IPCRF" data-toggle="tooltip" data-placement="top" href="#ipcr">IX</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1" role="tabpanel">
                            <ul class="nav nav-pills nav-fill">
                                <li class="nav-item">
                                  <a class="nav-link active" href="#basic">Active</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#">Longer nav link</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#">Link</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link disabled" href="#">Disabled</a>
                                </li>
                              </ul>
                        </div>
                        <div class="tab-pane" id="address" role="tabpanel">
                            @include('pages.employee.include.address-info')
                        </div>
                        <div class="tab-pane" id="appointment" role="tabpanel">
                            @include('pages.appointment.include.appointment-list')
                        </div>
                        <div class="tab-pane" id="education" role="tabpanel">
                            @include('pages.education.include.education-list')
                        </div>
                        <div class="tab-pane" id="eligibility" role="tabpanel">
                            @include('pages.eligibility.include.eligibility-list')
                        </div>
                        <div class="tab-pane" id="training" role="tabpanel">
                            @include('pages.training.include.training-list')
                        </div>
                        <div class="tab-pane" id="leave" role="tabpanel">
                            @include('pages.leave.include.leave-list')
                        </div>
                        <div class="tab-pane" id="dtr" role="tabpanel">
                            @include('pages.dtr.include.dtr-list')
                        </div>
                        <div class="tab-pane" id="ipcr" role="tabpanel">
                            @include('pages.ipcr.include.ipcr-list')
                        </div>
                        <button style="display: none; background-color:green" id="addbutton" class="btn float">Add</button>
                        <button style="display: none; background-color: red" id="floating-button-cancel" class="btn float">
                            Cancel
                        </button>
                        @include('layouts.floating-button')
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane" id="basic" role="tabpanel">
                            @include('pages.employee.include.basic-info')
                        </div>
                    </div>
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
    
    var btnpress = 0
    var tabindex = 0
    initial()
    $('table').DataTable()

    $('#floating-button').on('click', function() {
        if(btnpress==0)
            edit()
        else
            initial()
    })

    $('#save-generated-form').on('click',function() {
        var formData = new FormData( document.getElementById('myGeneratedForm') )
        
        $.ajax({
                method: "POST",
                url: "{{ url('ajax/save/formdata') }}",
                data: formData,
                processData: false,
                contentType: false,
            }).done(function( response ) {
                if(response.data==1)
                    fireAlert('success','Changes have been saved!')
                else
                    fireAlert('danger','An error has occured!')
                $('#myModal').modal('hide')
        })
    })

    $('#addbutton').on('click', function(){
        
        $.ajax({
                method: "GET",
                url: "{{ url('ajax/generate/modal/fields') }}",
                data: { 
                        emp_id: '{{ $employee->emp_id }}',
                        index: tabindex,
                        formname: 'myGeneratedForm'
                    }
            }).done(function( response ) {
                $('#myModal-body').empty()
                $('#myModal-body').append(response)
                $('#myModal').modal('show')
                $('.generated-form-select').select2({
                    theme: 'bootstrap4'
                })
        })
    })

    function edit() {
        select2.select2()
        $('span.form-control-plaintext').hide()
        $('input').prop('readonly',false)
        $('input').prop('class','form-control')
        $('#floating-button').css('background-color','red')
        $('#floating-button').text('Cancel')
        btnpress = 1
    }

    function initial() {
        select2.select2('destroy')
        $('input').prop('readonly',true)
        $('input').prop('class','form-control-plaintext')
        $('#floating-button').css('background-color','blue')
        $('#floating-button').text('Edit')
        btnpress = 0
    }

    $('.nav a').click(function(e){
        e.preventDefault() 
        $(this).tab('show')
        tabindex = $(e.target).parent().index()

        switch($(this).text()) {
            case 'I': togglebuttons(true); break
            case 'II': togglebuttons(true); break
            default: togglebuttons(false); break
        }
    })

    function togglebuttons($flag) {
        if($flag) {
            $('#floating-button').show()
            $('#addbutton').hide()
        } else {
            $('#floating-button').hide()
            $('#addbutton').show()
        }

    }
});
</script>
@endsection
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
            <div class="col">
            @include('pages.employee.include.card')
            </div>   
        </div>
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <ul id="profile-tabs" class="nav nav-tabs card-header-tabs nav-fill">
                    <li class="nav-item">
                      <a class="nav-link @if($index==0) active @endif" title="Basic Information" data-toggle="tooltip" data-placement="top" href="#basic">Basic</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link @if($index==1) active @endif"  title="Appointments" data-toggle="tooltip" data-placement="top"  href="#appointment">Appointments</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link @if($index==2) active @endif"  title="Work Experience" data-toggle="tooltip" data-placement="top" href="#workexperience">Work Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($index==3) active @endif"  title="Educational Background" data-toggle="tooltip" data-placement="top"  href="#education">Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($index==4) active @endif"  title="Eligibility" data-toggle="tooltip" data-placement="top" href="#eligibility">Eligibility</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($index==5) active @endif"  title="Trainings" data-toggle="tooltip" data-placement="top" href="#training">Trainings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($index==6) active @endif"  title="Leave Card" data-toggle="tooltip" data-placement="top" href="#leave">Leave</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($index==7) active @endif"  title="Daily Time Record" data-toggle="tooltip" data-placement="top" href="#dtr">DTR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($index==8) active @endif"  title="IPCRF" data-toggle="tooltip" data-placement="top" href="#ipcr">IPCR</a>
                    </li>
                  </ul>
                  <!-- <ul class="nav nav-tabs">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="dropdown1" role="button" aria-expanded="false">Basic Information</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown1">
                          <a class="dropdown-item" target="basic" href="#basic">I. Personal Info</a>
                          <a class="dropdown-item" target="address" href="#address">II. Address</a>
                          <a class="dropdown-item" target="education" href="#education">III. Education</a>
                          <a class="dropdown-item" target="eligibility" href="#eligibility">IV. Eligibility</a>
                        </div>
                      </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="dropdown2" role="button" aria-expanded="false">Professional Information</a>
                      <div class="dropdown-menu" aria-labelledby="dropdown2">
                        <a class="dropdown-item" id="appointment-info-tab" href="#appointment">I. Appointment</a>
                        <a class="dropdown-item" id="workexperience-info-tab" href="#appointment">II. Work Experience</a>
                        <a class="dropdown-item" id="training-info-tab" href="#training">III. Trainings</a>
                        <a class="dropdown-item" id="ipcrf-info-tab" href="#">IV. IPCRF</a>
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="dropdown3" role="button" aria-expanded="false">Attendance</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown3">
                          <a class="dropdown-item" id="appointment-info-tab" href="#appointment">I. Daily Time Record</a>
                          <a class="dropdown-item" id="workexperience-info-tab" href="#appointment">II. Leave</a>
                        </div>
                      </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                    </li>
                 </ul> -->
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane @if($index==0) active @endif" id="basic" role="tabpanel">
                            @include('pages.employee.include.basic-info')
                            <hr>
                            @include('pages.employee.include.address-info')
                        </div>
                        <div class="tab-pane @if($index==1) active @endif" id="appointment" role="tabpanel">
                            @include('pages.appointment.include.appointment-list')
                        </div>
                        <div class="tab-pane @if($index==2) active @endif" id="workexperience" role="tabpanel">
                        @include('pages.workexperience.include.workexperience-list')
                        </div>
                        <div class="tab-pane @if($index==3) active @endif" id="education" role="tabpanel">
                            @include('pages.education.include.education-list')
                        </div>
                        <div class="tab-pane @if($index==4) active @endif" id="eligibility" role="tabpanel">
                            @include('pages.eligibility.include.eligibility-list')
                        </div>
                        <div class="tab-pane @if($index==5) active @endif" id="training" role="tabpanel">
                            @include('pages.training.include.training-list')
                        </div>
                        <div class="tab-pane @if($index==6) active @endif" id="leave" role="tabpanel">
                            @include('pages.leave.include.leave-list')
                        </div>
                        <div class="tab-pane @if($index==7) active @endif" id="dtr" role="tabpanel">
                            @include('pages.dtr.include.dtr-list')
                        </div>
                        <div class="tab-pane @if($index==8) active @endif" id="ipcr" role="tabpanel">
                            @include('pages.ipcr.include.ipcr-list')
                        </div>
                        <button style="display: none; background-color:green" id="addbutton" class="btn float">Add</button>
                        <button style="display: none; background-color: red" id="floating-button-cancel" class="btn float">
                            Cancel
                        </button>
                        @include('layouts.floating-button')
                    </div>
                    {{-- <div class="tab-content">
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
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane" id="basic" role="tabpanel">
                            @include('pages.employee.include.basic-info')
                        </div>
                    </div> --}}
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
    var tabindex = '{{$index ?? 0}}'
    
    initial()
    var dtable = $('table').DataTable()
    
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
                $('#myModal').modal('hide')
                console.log(response)
                if(response==1) {
                    fireAlert('success','Changes have been saved!')
                    setInterval(function(){ 
                        window.location.href = '{{ url("employees/".$employee->emp_id) }}'+'?index='+tabindex
                    }, 1000)
                }
                else
                    fireAlert('danger','An error has occured!')
                
        })
    })

    $('#addbutton').on('click', function(){
        
        if(tabindex==1)
            window.location.href = '{{ url("appointments/add/".$employee->emp_id) }}'
        else if(tabindex==8)
            window.location.href = '{{ url("ipcr/add/".$employee->emp_id) }}'

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
                $('#leavedays').datepicker({
                    multidate: true
                });
        })
    })

    function edit() {
        select2.select2()
        $('span.form-control-plaintext').hide()
        $('input').prop('readonly',false)
        $('input').prop('class','form-control')
        $('#floating-button').css('background-color','red')
        $('#floating-button').text('Cancel')
        $('span.form-control-plaintext').hide()
        btnpress = 1
    }

    function initial() {
        select2.select2('destroy')
        $('input').prop('readonly',true)
        $('input').prop('class','form-control-plaintext')
        $('#floating-button').css('background-color','blue')
        $('#floating-button').text('Edit')
        $('span.form-control-plaintext').show()
        btnpress = 0
        if(tabindex>0)
            togglebuttons(false)
    }

    $('.nav-tabs a').click(function(e){
        e.preventDefault() 
        
        $(this).tab('show')
        tabindex = $(e.target).parent().index()
        
        switch(tabindex) {
            case 0: togglebuttons(true); break
            default: togglebuttons(false); break
        }
    })

    // $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    //     e.target // newly activated tab
    //     e.relatedTarget // previous active tab
    //     tabindex = $(e.target).parent().index()
    //     console.log(e.target)
    //     switch(e.target.id) {
    //         case 'personal-info-tab': togglebuttons(true); break
    //         case 'address-info-tab': togglebuttons(true); break
    //         default: togglebuttons(false); break
    //     }
    // })

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
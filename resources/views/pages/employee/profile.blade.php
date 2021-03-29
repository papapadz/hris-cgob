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
                        <a class="nav-link @if($index==0) active @endif" title="Basic Information" href="#basic">Basic</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link @if($index==1) active @endif"  title="Appointments"  href="#appointment">Appointments</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link @if($index==2) active @endif"  title="Work Experience" href="#workexperience">Work Experience</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($index==3) active @endif"  title="Educational Background"  href="#education">Education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($index==4) active @endif"  title="Eligibility" href="#eligibility">Eligibility</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($index==5) active @endif"  title="Trainings" href="#training">Trainings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($index==6) active @endif"  title="Leave Card" href="#leave">Leave</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($index==7) active @endif"  title="Daily Time Record" href="#dtr">DTR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($index==8) active @endif"  title="IPCRF" href="#ipcr">IPCR</a>
                        </li>
                    </ul>
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
                                <div class="row">
                                    <div class="col-12">
                                        {{ leaveCredits($employee->emp_id) }}
                                        <hr>
                                    </div>
                                </div>
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
            window.location.href = '{{ url("ipcr/create?emp_id=".$employee->emp_id) }}'
        else {
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
        }
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
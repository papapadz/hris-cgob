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
              <li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#education" role="tab" aria-controls="address">Education</a></li>
              <li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#workexp" role="tab" aria-controls="address">Work Experience</a></li>
              <li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#training" role="tab" aria-controls="training">Trainings</a></li>
              <li class="nav-item"><a class="nav-link disabled" data-toggle="tab" href="#eligibility" role="tab" aria-controls="eligibility">Eligibility</a></li>
              <li class="nav-item bg-success"><a class="nav-link text-white" data-toggle="tab" href="#save" role="tab" aria-controls="save">Save</a></li>
            </ul>
            {{-- <form id="employment-info" method="POST" action="{{ route('applicants.store') }}" enctype="multipart/form-data"> --}}
              
              <div class="tab-content">
                  <div class="tab-pane active" id="basic" role="tabpanel">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Position</label>
                            <select id="position" name="position" class="form-control" required>
                                <option disabled selected>Choose...</option>
                                @foreach(getPositions() as $position)
                                    <option value="{{ $position->id }}">{{ $position->position }} (SG {{ $position->sg }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Plantilla Number</label>
                            <select id="plantilla" name="plantilla_id" class="form-control" required></select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <button type="button" class="btn btn-sm btn-success float-right" onclick="showAddNew()" id="toggle-menu">New</button>
                        
                            <div id="name-search">
                                <label>Name</label>
                                <select id="emp_id" name="emp_id" class="form-control" required>
                                    <option disabled selected>Choose...</option>
                                    @foreach($employees as $emp)
                                        <option value="{{ $emp->emp_id }}">{{ getEmployeeName($emp->emp_id) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="new-menu" hidden="true" class="col-12">
                            <form id="form-basic" enctype="multipart/form-data">
                                @csrf
                                <input type="number" class="form-control" name="is_applicant" value="1" hidden/>
                                @include('pages.employee.include.basic-info')
                                <hr>
                                @include('pages.employee.include.address-info')
                                <hr>
                            </form>
                            <button type="button" class="btn btn-success" onclick="next()">Next</button>
                        </div>
                    </div>
                  </div>

                  <div class="tab-pane" id="education" role="tabpanel">
                    
                        @include('pages.education.include.add')
                   
                      <div class="form-group row">
                        <div class="col-12">
                          <button class="btn btn-block btn-success" type="button" onclick="addDetails(2)">{{ __('Add') }}</button>
                        </div>
                      </div>
                      <div class="form-group row">
                        <table id="table-education" class="table">
                            <th>#</th>
                            <th>Level</th>
                            <th>School</th>
                            <th>Date</th>
                            <th></th>
                        </table>
                    </div>
                  </div>

                  <div class="tab-pane" id="workexp" role="tabpanel">
                        @include('pages.workexperience.include.add')
                    <div class="form-group row">
                        <div class="col-12">
                          <button class="btn btn-block btn-success" type="button" onclick="addDetails(3)">{{ __('Add') }}</button>
                        </div>
                      </div>
                      <div class="form-group row">
                        <table id="table-workexp" class="table">
                            <th>#</th>
                            <th>Position</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th></th>
                        </table>
                    </div>
                  </div>

                  <div class="tab-pane" id="training" role="tabpanel">
                        @include('pages.training.include.add')
                    <div class="form-group row">
                      <div class="col-12">
                        <button class="btn btn-block btn-success" type="button" onclick="addDetails(4)">{{ __('Add') }}</button>
                      </div>
                    </div>
                    <div class="form-group row">
                        <table id="table-trainings" class="table">
                            <th>#</th>
                            <th>Training Title</th>
                            <th>Type</th>
                            <th>No. of Hrs</th>
                            <th></th>
                        </table>
                    </div>
                  </div>

                  <div class="tab-pane" id="eligibility" role="tabpanel">
                        @include('pages.eligibility.include.add')
                    <div class="form-group row">
                      <div class="col-12">
                        <button class="btn btn-block btn-success" type="button" onclick="addDetails(5)">{{ __('Add') }}</button>
                      </div>
                    </div>
                    <div class="form-group row">
                        <table id="table-eligibility" class="table">
                            <th>#</th>
                            <th>Eligibility</th>
                            <th>Rating</th>
                            <th>Date</th>
                            <th></th>
                        </table>
                    </div>
                  </div>

                  <div class="tab-pane" id="save" role="tabpanel">
                    <p>Are you sure you want to save these details?</p>
                    <button class="btn btn-success" type="button" onclick="saveApplicant()">Save</button>
                  </div>
                </div>
            {{-- </form> --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('javascript')
<!-- GLOBAL -->
<script>
    
    var _token = '{{ csrf_token() }}'
    var emp_id
    var counters = [1,1,1,1]
    var is_outsider = 0
    // var data = {
    //     education: [], workexp: [], training: [], eligibility: []
    // }
    
    function saveApplicant() {
        $.ajax({
            method: "POST",
            url: "{{ url('ajax/applicant/save') }}",
            data: {
                _token: _token,
                applicant_id: emp_id,
                plantilla_id: $("#plantilla").val(),
                is_outsider: is_outsider
            },
            contentType: false, 
            processData: false
        }).done(function(response) {
            
            fireAlert('success','Application record has been saved!')
            window.location.replace('{{ url("applicants") }}')
        })
    }

    function addDetails(index) {
        
        var data = null
        var target = null
        
        switch(index) {
            case 1:
                data = $("form[id='form-basic']")[0]
                target = 'basic'
            break
            case 2:
                data = $("form[id='form-education']")[0]
                target = 'education'
            break
            case 3:
                data = $("form[id='form-workexp']")[0]
                target = 'work-experience'
            break
            case 4:
                data = $("form[id='form-training']")[0]
                target = 'training'
            break
            case 5:
                data = $("form[id='form-eligibility']")[0]
                target = 'eligibility'
            break
        }
        
        var formData = new FormData(data)
        formData.append('emp_id',emp_id)
        formData.append('plantilla_id',$("#plantilla").val())
        
        $.ajax({
            method: "POST",
            url: "{{ url('ajax/set/applicant') }}/"+target+"/save",
            data: formData,
            contentType: false, 
            processData: false
        }).done(function(response) {
            
            switch(index) {
                case 1:
                    emp_id = response
                    $('.nav-tabs a[href="#education"]').tab('show')
                break

                case 2:
                    appendEducation(response)
                break

                case 3:
                    appendWorkExp(response)
                break

                case 4:
                    appendTraining(response)
                break

                case 5:
                    appendEligibility(response)
                break
            }
        })

        // var fields = []
        // var matches = []
        // var target = ''

        // switch(index) {
        //     case 0: 
        //         target = 'education'
        //         fields = ['level','school_id','course_id','yearstarted','yeargraduated','units','honors','file_url']
        //     break
        //     case 1: 
        //         target = 'workexp'
        //         fields = ['position_id','company','startdate','enddate','sg','step','employmenttype_id','isgovernment','file_url']
        //     break
        //     case 2: 
        //         target = 'training'
        //         fields = ['trainingtitle','sponsor','venue','trainingtype_id','hrs','startdate','enddate','file']
        //     break
        //     case 3: 
        //         target = 'eligibility'
        //         fields = ['eligibilitytype_id','rating','licensenum','startdate','enddate','place','file_url']
        //     break
        // }

        // var inputs = document.getElementsByClassName('form-' + target)
       
        // for(var key in inputs) {
        //     var flag = 1
        //     var name = inputs[key].name
        //     var value = inputs[key].value
        //     var required = inputs[key].getAttribute('required')
        //     console.log(name,value,required!=null)

        //     if(fields.includes(name)) {
        //         if(required!=null) {
        //             if(value==null || value=="" || value==0) {
        //                 Swal.fire(
        //                     'Required Fields',
        //                     'Please fill up all required fields before saving',
        //                     'error'
        //                 )
        //                 flag = 0
        //                 break
        //             } else {
        //                 matches.push(value);
        //                 inputs[key].value = null
        //             }
        //         } else {
        //             matches.push(value);
        //             inputs[key].value = null
        //         }
                    
        //     }
        // }

        // if(flag==1) {
        //     if(index==0) {
        //         count = data.education.length
        //         data.education.push(matches)
        //     } else if(index==1) {
        //         count = data.workexp.length
        //         data.workexp.push(matches)
        //     } else if(index==2) {
        //         count = data.training.length
        //         data.training.push(matches)
        //     } else if(index==3) {
        //         count = data.eligibility.length
        //         data.eligibility.push(matches)
        //     }

        //     $('#table-'+target).append(
        //         '<tr>'+
        //         '<td>'+count+'</td><td>'+matches[0]+'</td><td>'+matches[2]+'</td><td>'+matches[4]+'</td>'+
        //         '</tr>'
        //     )
        //     console.log(data)
        // } 
    }

    function next() {
        emp_id = 0
        is_outsider = 1
        $('a.nav-link').removeClass('disabled')
        addDetails(1)
    }

    function getEmpDetails(target) {
        $.ajax({
            method: "POST",
            url: "{{ url('ajax/get/employee/details') }}",
            data: {
                _token: _token,
                emp_id: emp_id,
                target: target
            }
        }).done(function(response){
            
            if(response!=null)
                for(let obj of response) {
                    switch(target) {
                        case 'education':
                            appendEducation(obj)
                        break
                        case 'work-experience':
                            appendWorkExp(obj)
                        break
                        case 'training':
                            appendTraining(obj)
                        break
                        case 'eligibility':
                            appendEligibility(obj)
                        break
                    }               
                }
        })
    }

    function appendEducation(arrObj) {
        console.log(arrObj)
        $('#table-education').append(
            '<tr>'+
            '<td>'+(counters[0]++)+'</td>'+
            '<td>'+arrObj['course']['course']+'</td>'+
            '<td>'+arrObj['school']['school']+'</td>'+
            '<td>'+arrObj['yearstarted']+' to '+arrObj['yeargraduated']+'</td>'+
            '<td><a target="_blank" href="{{ url("/") }}/'+arrObj['file_url']+'"><i class="cil-file"></i>File</a></td>'+
            '</tr>'
        )
    }

    function appendWorkExp(arrObj) {
        console.log(arrObj)
        $('#table-workexp').append(
            '<tr>'+
            '<td>'+(counters[1]++)+'</td>'+
            '<td>'+arrObj['position']['position']+'</td>'+
            '<td>'+arrObj['company']+'</td>'+
            '<td>'+arrObj['employment_stat']['employmenttype']+'</td>'+
            '<td>'+arrObj['startdate']+' to '+arrObj['enddate']+'</td>'+
            '</tr>'
        )
    }

    function appendTraining(arrObj) {
        console.log(arrObj)
        $('#table-trainings').append(
            '<tr>'+
            '<td>'+(counters[2]++)+'</td>'+
            '<td>'+arrObj['trainingtitle']+'</td>'+
            '<td>'+arrObj['training_type']['trainingtype']+'</td>'+
            '<td>'+arrObj['hrs']+'</td>'+
            '</tr>'
        )
    }

    function appendEligibility(arrObj) {
        console.log(arrObj)
        $('#table-eligibility').append(
            '<tr>'+
            '<td>'+(counters[3]++)+'</td>'+
            '<td>'+arrObj['eligibility_type']['eligibility']+'</td>'+
            '<td>'+arrObj['rating']+'</td>'+
            '<td>'+arrObj['startdate']+'</td>'+
            '</tr>'
        )
    }
</script>
<!-- BASIC INFO -->
<script>
function showAddNew() {
    console.log(this.event.target.class)
    var btn_name = 'Search'
    var btn_class = 'btn btn-sm btn-primary float-right'

    if($('#new-menu').is(':hidden')) {
        $('#name-search').prop('hidden',true)
        $('#new-menu').prop('hidden',false)
        $('a.nav-link').addClass('disabled')
    }
    else {
        var btn_name = 'New'
        var btn_class = 'btn btn-sm btn-success float-right'
        $('#name-search').prop('hidden',false)
        $('#new-menu').prop('hidden',true)
    }
    document.getElementById(this.event.target.id).innerHTML = btn_name
    document.getElementById(this.event.target.id).class = btn_class
    
}

$('#emp_id').change(function() {
    emp_id = $(this).val()
    $('a.nav-link').removeClass('disabled')
    $('.nav-tabs a[href="#education"]').tab('show')
    getEmpDetails('education')
    getEmpDetails('work-experience')
    getEmpDetails('training')
    getEmpDetails('eligibility')
})
</script>

<!-- EDUCATION -->
<script>
    $('#level').change(function() {
        var level = $(this).val()
        
        $.ajax({
            url: "{{ url('ajax/get/schools/by-level') }}",
            data: { level: level }
        }).done(function(response) {
            $('#school_id').val(null).trigger('change')
            for(var k in response) {
                var newOption = new Option(response[k].school, response[k].id, false, false)
                $('#school_id').append(newOption).trigger('change')
            }
        })

        $.ajax({
            url: "{{ url('ajax/get/courses/by-level') }}",
            data: { level: level }
        }).done(function(response) {
            $('#course_id').val(null).trigger('change')
            for(var k in response) {
                var newOption = new Option(response[k].course, response[k].id, false, false)
                $('#course_id').append(newOption).trigger('change')
            }
        })
    })

    $('#school_id').change(function() {

        if($(this).val()=='-')
            $('#input-school').prop('hidden',false)
        else {
            $('#input-school').prop('hidden',true)
        }
    })

    $('#course_id').change(function() {

        if($(this).val()=='-')
            $('#input-course').prop('hidden',false)
        else {
            $('#input-course').prop('hidden',true)
        }
    })
</script>

<!-- WORK EXP -->
<script>
    $('#position_id').change(function() {
        if($(this).val()=='-')
            $('#input-position').prop('hidden',false)
        else
            $('#input-position').prop('hidden',true)
    })
</script>

<!-- TRAINING -->
@endsection
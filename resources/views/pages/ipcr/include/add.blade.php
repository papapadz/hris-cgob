<div class="form-group row">
  <div class="col-md-12">
      <label>Type</label>
      @if($ipcr)
      <input name="type_id" class="form-control-plaintext" value="{{ $ipcr->type_id }}" hidden>
      <input class="form-control-plaintext" value="{{ $ipcr->ipcrtype->type }}" readonly>
      @else
      <select name="type_id" class="form-control">
        @foreach(getIPCRTypes() as $type)
        <option value="{{ $type->id }}">{{ $type->type }}</option>
        @endforeach
      </select>
      @endif
  </div>
</div>

@if($ipcr)
<div class="row">
<div class="col-12">
  <label>IPCR Date</label>
</div>
</div>
<div class="row">
<div class="col-md-6">
  <label>Year</label>
  <input name="year" class="form-control-plaintext" value="{{ $ipcr->period->year }}" readonly>
</div>
<div class="col-md-6">
  <label>Period</label>
  <input name="type" class="form-control-plaintext" value="{{ $ipcr->period->type }}" hidden>
  <input name="period" class="form-control-plaintext" value="{{ $ipcr->period_id }}" hidden>
  <input class="form-control-plaintext" value="{{ $ipcr->period->type }} {{ $ipcr->period->period }} {{ $ipcr->period->year }}" readonly>
</div>
</div>
<hr>
@else
<div class="form-group row">
<div class="col-12">
  <label>IPCR Date</label>
</div>
<div class="col-md-6">
<label>Year</label>
<select name="year" class="form-control">
  <option value="{{ Carbon\Carbon::now()->subYear()->year }}">{{ Carbon\Carbon::now()->subYear()->year }}</option>
  <option selected value="{{ Carbon\Carbon::now()->year }}">{{ Carbon\Carbon::now()->year }}</option>
  @for ($i = 1; $i <= 3; $i++)
      <option value="{{ Carbon\Carbon::now()->addYears($i)->year }}">{{ Carbon\Carbon::now()->addYears($i)->year }}</option>
  @endfor
</select>
</div>
<div class="col-md-6">
<div class="row">
  <div class="col-md-6">
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="type" value="quarter">
        <label class="form-check-label">Quarter</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="type" value="semester">
        <label class="form-check-label" >Semester</label>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="period" value="1">
      <label class="form-check-label" >1</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="period" value="2">
      <label class="form-check-label" >2</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="period" value="3">
      <label class="form-check-label" >3</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="period" value="4">
      <label class="form-check-label" >4</label>
    </div>
  </div>
</div>
</div>
</div>
@endif

<div class="form-group row">
<div class="col-md-12">
    <label>MFO</label><button type="button" class="btn btn-sm btn-success" onclick="addMFO()">add</button>
    <select name="mfo_id" class="form-control">
        @foreach(getMFO(0) as $mfo)
        <option value="{{ $mfo->id }}">{{ $mfo->mfo }}</option>
        @endforeach
    </select>
</div>
</div>

<div class="form-group row">
  <div class="col-12">
      <label>Target</label>
      <textarea id="target" class="form-control" name="target"></textarea>
  </div>
</div>

@section('javascript')
<script>
function addMFO() {
  $.ajax({
              method: "GET",
              url: "{{ url('ajax/generate/modal/fields') }}",
              data: { 
                      emp_id: '{{ $employee->emp_id }}',
                      index: 9,
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
                      window.location.reload()
                  }, 2000)
              }
              else
                  fireAlert('danger','An error has occured!')
              
      })
  })
</script>
@endsection
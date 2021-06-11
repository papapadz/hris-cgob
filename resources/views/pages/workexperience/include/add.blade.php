<form id="form-workexp" enctype="multipart/form-data">
    @csrf
<div class="form-group row">
    <div class="col-md-6">
        <label>Start Date <span class="text-danger">*<span></label>
        <input type="date" class="form-control form-workexp" name="startdate" required/>
    </div>
    <div class="col-md-6">
        <label>End Date</label>
        <input type="date" class="form-control form-workexp" name="enddate"/>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-12">
        <label>Position <span class="text-danger">*<span></label>
        <select class="form-control form-workexp" id="position_id" name="position_id" required>
            <option disabled selected value=0>Choose one...</option>
            @foreach(getPositions() as $pos)
                <option
                 value="{{ $pos->id }}">{{ $pos->position }}</option>
            @endforeach
            <option value="-">Others (Pls. specify)</option>
        </select>
        <input type="text" class="form-control form-workexp" id="input-position" name="input-position" placeholder="Type position here" hidden="true">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-12">
        <label>Company/Institution Name <span class="text-danger">*<span></label>
        <input class="form-control form-workexp" type="text" placeholder="{{ __('Company/Institution Name') }}" name="company" required></input>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <label>Salary <span class="text-danger">*<span></label>
        <input class="form-control form-workexp" type="number" step="0.01" placeholder="{{ __('Salary') }}" name="salary" required>
    </div>
    <div class="col-md-3">
        <label>SG</label>
        <input class="form-control form-workexp" type="text" placeholder="{{ __('SG') }}" name="sg">
    </div>
    <div class="col-md-3">
        <label>Step</label>
        <input class="form-control form-workexp" type="text" placeholder="{{ __('Step') }}" name="step">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-4">
        <div class="form-check">
            <input type="checkbox" class="form-check-input form-workexp" name="isgovernment">
            <label class="form-check-label" for="exampleCheck1">Government?</label>
        </div>
    </div>
    <div class="col-md-4">
        <label>Employment <span class="text-danger">*<span></label>
        <select class="form-control form-workexp" id="employmenttype_id" name="employmenttype_id" required>
            <option disabled selected value=0>Choose one...</option>
            @foreach(getEmploymentTypes() as $employment)
                <option
                 value="{{ $employment->id }}">{{ $employment->employmenttype }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label>Certificate of Employment <span class="text-danger">*<span></label>
        <input type="file" class="form-control form-workexp" name="file_url" required/>
    </div>
</div>
</form>

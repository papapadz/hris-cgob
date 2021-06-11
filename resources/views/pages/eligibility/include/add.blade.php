<form id="form-eligibility" enctype="multipart/form-data">
@csrf
<div class="form-group row">
    <div class="col-md-12">
        <label>Eligibility <span class="text-danger">*<span></label>
        <select class="form-control form-eligibility" id="eligibilitytype_id" name="eligibilitytype_id" required>
            <option disabled selected value=0>Choose one...</option>
            @foreach(getEligibilityTypes() as $eligibility)
                <option
                 value="{{ $eligibility->id }}">{{ $eligibility->eligibility }}</option>
            @endforeach
            <option value="-">Others (Pls. specify)</option>
        </select>
        <input type="text" class="form-control form-eligibility" id="input-eligibility" name="input-eligibility" placeholder="Type eligibility here" hidden="true">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <label>Rating</label>
        <input class="form-control form-eligibility" type="number" step="0.01" placeholder="{{ __('Rating') }}" name="rating" >
    </div>
    <div class="col-md-6">
        <label>License Number</label>
        <input class="form-control form-eligibility" type="text" placeholder="{{ __('License Number') }}" name="licensenum">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-12">
        <label>Place of conferment <span class="text-danger">*<span></label>
        <input class="form-control form-eligibility" type="text" placeholder="{{ __('Place of conferment') }}" name="place" required>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <label>Date of Conferment <span class="text-danger">*<span></label>
        <input class="form-control form-eligibility" type="date" name="startdate" required>
    </div>
    <div class="col-md-6">
        <label>Expiry Date</label>
        <input class="form-control form-eligibility" type="date" name="enddate">
    </div>
</div>

<div class="form-group row">
   <div class="col-md-6">
        <label>Certificate of Eligibility <span class="text-danger">*<span></label>
        <input type="file" class="form-control form-eligibility" name="file_url" required/>
    </div>
</div>
</form>

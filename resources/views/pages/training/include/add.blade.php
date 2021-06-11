<form id="form-training" enctype="multipart/form-data">
    @csrf
<div class="form-group row">
    <div class="col-md-12">
        <label>Training Title <span class="text-danger">*<span></label>
        <textarea class="form-control form-training" type="text" placeholder="{{ __('Training Title') }}" name="trainingtitle" required autofocus></textarea>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <label>Sponsor <span class="text-danger">*<span></label>
        <input class="form-control form-training" type="text" placeholder="{{ __('Sponsor') }}" name="sponsor" required>
    </div>
    <div class="col-md-6">
        <label>Venue <span class="text-danger">*<span></label>
        <input class="form-control form-training" type="text" placeholder="{{ __('Venue') }}" name="venue" required>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <label>Type of Training <span class="text-danger">*<span></label>
        <select class="form-control form-training" name="trainingtype_id" required>
            <option disabled selected value=0>Choose one...</option>
            @foreach(getTrainingTypes() as $type)
                <option
                 value="{{ $type->id }}">{{ $type->trainingtype }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label>No. of Hrs <span class="text-danger">*<span></label>
        <input class="form-control form-training" type="number" placeholder="{{ __('No. of Hrs') }}" name="hrs" required>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <label>Start Date <span class="text-danger">*<span></label>
        <input type="date" class="form-control form-training" name="startdate" required/>
    </div>
    <div class="col-md-6">
        <label>End Date <span class="text-danger">*<span></label>
        <input type="date" class="form-control form-training" name="enddate" required/>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <label>Certificate of Training <span class="text-danger">*<span></label>
        <input type="file" class="form-control form-training" name="file" required/>
    </div>
</div>
</form>
<form id="form-education" enctype="multipart/form-data">
@csrf
<div class="form-group row">
    <div class="col-md-12">
        <label>Education Level <span class="text-danger">*<span></label>
        <select class="form-control form-education" name="level" id="level" required>
            <option disabled selected value=0>Choose one...</option>
            @foreach(getSchoolLevels() as $level)
                <option
                 value="{{ $level->id }}">{{ $level->level }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-12">
        <label>School <span class="text-danger">*<span></label>
        <select class="form-control form-education" id="school_id" name="school_id" required>
            <option disabled selected value=0>Choose one...</option>
            <option value="-">Others (Pls. specify)</option>
        </select>
        <input type="text" class="form-control form-education" id="input-school" name="input-school" placeholder="Type the Name of School" hidden="true">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-12">
        <label>Course <span class="text-danger">*<span></label>
        <select class="form-control form-education" id="course_id" name="course_id" required>
            <option disabled selected value=0>Choose one...</option>
            <option value="-">Others (Pls. specify)</option>
        </select>
        <input type="text" class="form-control form-education" id="input-course" name="input-course" placeholder="Type Course here" hidden="true">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <label>Start Date <span class="text-danger">*<span></label>
        <input class="form-control form-education" type="date" name="yearstarted" required>
    </div>
    <div class="col-md-6">
        <label>Graduate Date</label>
        <input class="form-control form-education" type="date" name="yeargraduated" >
    </div>
</div>

<div class="form-group row">
    <div class="col-md-4">
        <label>Unit</label>
        <input type="number" class="form-control form-education" name="units"/>
    </div>
    <div class="col-md-4">
        <label>Honors</label>
        <input type="text" class="form-control form-education" name="honors"/>
    </div>
    <div class="col-md-4">
        <label>Diploma <span class="text-danger">*<span></label>
        <input type="file" class="form-control form-education" name="file_url" required/>
    </div>
</div>
</form>
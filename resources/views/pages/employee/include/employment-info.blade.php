<form id="employment-info">
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
            <label>Step Increment</label>
            <input type="number" min="1" value="1" max="8" name="step" class="form-control" required></select>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-12">
            <label>Plantilla Number</label>
            <select id="plantilla" name="plantilla_id" class="form-control" required></select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-12">
            <label>Vice</label>
            <select name="vice_id" class="form-control" required>
                <option selected>N/A</option>
                @foreach(getAllEmployees() as $employee)
                    <option value="{{ $employee->emp_id }}">{{ $employee->lastname }}, {{ $employee->firstname }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label>Employment Status</label>
            <select name="employmenttype_id" class="form-control" required>
                @foreach(getEmploymentTypes() as $employment)
                    <option value="{{ $employment->id }}">{{ $employment->employmenttype }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label>Nature of Appointment</label>
            <select name="employmenttype_id" class="form-control" required>
                @foreach(getAppointmentTypes() as $appointment)
                    <option value="{{ $appointment->id }}">{{ $appointment->appointmenttype }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label>Date of Appointment</label>
            <input type="date" class="form-control" name="startdate" required>
        </div>
        <div class="col-md-6">
            <label>Department</label>
            <select name="employmenttype_id" class="form-control" required>
                @foreach(getDepartments() as $department)
                    <option value="{{ $department->id }}">{{ $department->department }}</option>
                @endforeach
            </select>
        </div>
    </div>
    
</form>
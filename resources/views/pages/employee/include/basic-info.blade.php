    <div class="form-group row">
        <div class="col-md-6">
            <label>Employee ID Number</label>
            <input class="form-control" type="text" placeholder="{{ __('Employee ID Number') }}" name="emp_id" required autofocus>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label>Last Name</label>
            <input class="form-control" type="text" placeholder="{{ __('Last Name') }}" name="lastname" required>
        </div>
        <div class="col-md-6">
            <label>First Name</label>
            <input class="form-control" type="text" placeholder="{{ __('First Name') }}" name="firstname" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label>Middle Name</label>
            <input class="form-control" type="text" placeholder="{{ __('Middle Name') }}" name="middlename">
        </div>
        <div class="col-md-6">
            <label>Extension</label>
            <input class="form-control" type="text" placeholder="{{ __('Middle Name') }}" name="extension">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label>Date of Birth</label>
        <input type="date" class="form-control" name="birthdate" required/>
        </div>
        <div class="col-md-6">
            <label>Place of Birth</label>
        <input class="form-control" type="text" placeholder="{{ __('Place of Birth') }}" name="birthplace" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label>Gender</label>
            <select class="form-control" name="gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        <div class="col-md-6">
            <label>Blood Type</label>
            <select class="form-control" name="bloodtype">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="AB">AB</option>
                <option value="O">O</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label>Civil Status</label>
            <select id="ctzn" class="form-control" name="civilstat_id">
                @foreach(getCivilStatus() as $civilstat_id)
                    <option value="{{ $civilstat_id->id }}">{{ $civilstat_id->civil_status }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label>Citizenship</label>
            <select id="ctzn" class="form-control"name="citizenship_id">
                @foreach(getCitizenships() as $citizenship)
                    <option value="{{ $citizenship->id }}">{{ $citizenship->citizenship }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label>Height (in meters)</label>
            <input type="number" step="0.1" class="form-control" name="height" required/>
        </div>
        <div class="col-md-6">
            <label>Weight (in Kilograms)</label>
            <input type="number" step="0.1" class="form-control" name="weight" required/>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label>Picture</label>
            <input type="file" class="form-control" name="image" required/>
        </div>
    </div>
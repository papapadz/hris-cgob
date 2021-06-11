    @isset($employee)
    <div class="form-group row">
        <div class="col-md-6">
            <label>Employee ID Number</label>
            <input class="form-control" value="{{ $employee->emp_id ?? null }}" type="text" placeholder="{{ __('Employee ID Number') }}" name="emp_id" required autofocus>
        </div>
    </div>
    @endisset

    <div class="form-group row">
        <div class="col-md-6">
            <label>Last Name</label>
            <input class="form-control" value="{{ $employee->lastname ?? null }}" type="text" placeholder="{{ __('Last Name') }}" name="lastname" required>
        </div>
        <div class="col-md-6">
            <label>First Name</label>
            <input class="form-control" value="{{ $employee->firstname ?? null }}" type="text" placeholder="{{ __('First Name') }}" name="firstname" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label>Middle Name</label>
            <input class="form-control" value="{{ $employee->middlename ?? null }}" type="text" placeholder="{{ __('Middle Name') }}" name="middlename">
        </div>
        <div class="col-md-6">
            <label>Extension</label>
            <input class="form-control" value="{{ $employee->extension ?? null }}" type="text" placeholder="{{ __('Extension') }}" name="extension">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label>Date of Birth</label>
            <input type="date" class="form-control" 
                @isset($employee)
                    value="{{ $employee->birthdate->format('Y-m-d') ?? null }}" 
                @endisset
                 name="birthdate" required/>
        </div>
        <div class="col-md-6">
            <label>Place of Birth</label>
            <input class="form-control" type="text" 
                @isset($employee)
                    value="{{ $employee->birthplace }}" placeholder="{{ __('Place of Birth') }}"
                @endisset
                 name="birthplace" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label>Gender</label>
            @if(isset($employee))
                <span class="form-control-plaintext">@if($employee->gender=='M') Male @else Female @endif</span>
            @endif
            <select @isset($employee) hidden @endif class="form-control" name="gender">
                <option
                    @isset($employee)
                        @if($employee->gender=='M')
                            selected
                        @endif
                    @endisset
                     value="M">Male</option>
                <option
                    @isset($employee)
                        @if($employee->gender=='F')
                            selected
                        @endif
                    @endisset
                     value="F">Female</option>
            </select>
        </div>
        <div class="col-md-6">
            <label>Blood Type</label>
            @if(isset($employee))
                <span class="form-control-plaintext">{{ $employee->bloodtype }}</span>
            @endif
            <select @isset($employee) hidden @endif class="form-control" name="bloodtype">
                <option
                    @isset($employee)
                        @if($employee->bloodtype=='A')
                            selected
                        @endif
                    @endisset
                 value="A">A</option>
                 <option
                    @isset($employee)
                        @if($employee->bloodtype=='B')
                            selected
                        @endif
                    @endisset
                 value="B">B</option>
                 <option
                    @isset($employee)
                        @if($employee->bloodtype=='AB')
                            selected
                        @endif
                    @endisset
                 value="AB">AB</option>
                 <option
                    @isset($employee)
                        @if($employee->bloodtype=='O')
                            selected
                        @endif
                    @endisset
                 value="O">O</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label>Civil Status</label>
            @if(isset($employee))
                <span class="form-control-plaintext">{{ $employee->civilStatus->civil_status }}</span>
            @endif
            <select @isset($employee) hidden @endif class="form-control" name="civilstat_id">
                @foreach(getCivilStatus() as $civilstat_id)
                    <option 
                        @if(isset($employee))
                            @if($employee->civilstat_id==$civilstat_id->id)
                                selected
                            @endif
                        @endif
                         value="{{ $civilstat_id->id }}">{{ $civilstat_id->civil_status }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label>Citizenship</label>
            @if(isset($employee))
                <span class="form-control-plaintext">{{ $employee->citizenship->citizenship }}<span
            @endif
            <select @isset($employee) hidden @endif class="form-control" name="citizenship_id">
                @foreach(getCitizenships() as $citizenship)
                    <option
                        @if(isset($employee))
                            @if($employee->citizenship_id==$citizenship->id)
                                selected
                            @endif
                        @endif
                     value="{{ $citizenship->id }}">{{ $citizenship->citizenship }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <label>Height (in meters)</label>
            <input type="number" step="0.1" value="{{ $employee->height ?? null }}" class="form-control" name="height" required/>
        </div>
        <div class="col-md-6">
            <label>Weight (in Kilograms)</label>
            <input type="number" step="0.1" value="{{ $employee->weight ?? null }}" class="form-control" name="weight" required/>
        </div>
    </div>

    @if(!isset($employee))
    <div class="form-group row">
        <div class="col-md-6">
            <label>Picture</label>
            <input type="file" class="form-control" name="image" required/>
        </div>
    </div>
    @endif
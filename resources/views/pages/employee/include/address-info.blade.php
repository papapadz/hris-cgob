    <div class="form-group row">
        <div class="col-12">
            <label>Province</label>
            @if(isset($employee))
                <span class="form-control-plaintext">{{ $employee->address->town->province->province }}</span>
            @endif
            <select @isset($employee) hidden @endif id="province" class="form-control">
                @if(isset($employee))
                    @foreach(listProvinces() as $province)
                        <option 
                            @if($employee->address->town->province_id==$province->id)
                                selected
                            @endif
                             value="{{ $province->id }}">{{ $province->province }}</option>
                    @endforeach
                @else
                    <option disabled selected>Choose...</option>
                    @foreach(listProvinces() as $province)
                        <option value="{{ $province->id }}">{{ $province->province }}</option>
                    @endforeach
                @endif
                
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-12">
            <label>Town</label>
            @if(isset($employee))
                <span class="form-control-plaintext">{{ $employee->address->town->town }}</span>
            @endif
            <select @isset($employee) hidden @endif id="town" class="form-control">
                @if(isset($employee))
                    @foreach(listTowns($employee->address->town->province_id) as $town)
                        <option 
                            @if($employee->address->town_id==$town->id)
                                selected
                            @endif
                             value="{{ $town->id }}">{{ $town->town }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-12">
            <label>Barangay</label>
            @if(isset($employee))
                <span class="form-control-plaintext">{{ $employee->address->barangay }}</span>
            @endif
            <select @isset($employee) hidden @endif id="barangay" name="address_id" class="form-control">
                @if(isset($employee))
                    @foreach(listBarangays($employee->address_id) as $barangay)
                        <option 
                            @if($employee->address_id==$barangay->id)
                                selected
                            @endif
                             value="{{ $barangay->id }}">{{ $barangay->barangay }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
<form id="address-info">
    <div class="form-group row">
        <div class="col-12">
            <label>Province</label>
            <select id="province" class="form-control">
                <option disabled selected>Choose...</option>
                @foreach(listProvinces() as $province)
                    <option value="{{ $province->id }}">{{ $province->province }}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-12">
            <label>Town</label>
            <select id="town" class="form-control"></select>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-12">
            <label>Barangay</label>
            <select id="barangay" name="address_id" class="form-control"></select>
        </div>
    </div>
</form>
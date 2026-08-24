<div class="row">

    <!-- Lead No -->
    <div class="col-md-4 mb-3">
        <label class="form-label">Lead No</label>

        <input type="text"
            class="form-control"
            value="{{ isset($lead) ? $lead->lead_no : 'Auto Generated' }}"
            readonly>
    </div>

    <!-- Name -->
    <div class="col-md-4 mb-3">
        <label class="form-label">Lead Name <span class="text-danger">*</span></label>

        <input type="text"
            name="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $lead->name ?? '') }}"
            placeholder="Enter Lead Name">

        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <!-- Company -->
    <div class="col-md-4 mb-3">
        <label class="form-label">Company</label>

        <input type="text"
            name="company"
            class="form-control"
            value="{{ old('company', $lead->company ?? '') }}"
            placeholder="Company Name">
    </div>

    <!-- Email -->
    <div class="col-md-4 mb-3">
        <label class="form-label">Email</label>

        <input type="email"
            name="email"
            class="form-control"
            value="{{ old('email', $lead->email ?? '') }}"
            placeholder="Email Address">
    </div>

    <!-- Phone -->
    <div class="col-md-4 mb-3">
        <label class="form-label">Phone <span class="text-danger">*</span></label>

        <input type="text"
            name="phone"
            class="form-control @error('phone') is-invalid @enderror"
            value="{{ old('phone', $lead->phone ?? '') }}"
            placeholder="Phone Number">

        @error('phone')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <!-- City -->
    <div class="col-md-4 mb-3">
        <label class="form-label">City</label>

        <input type="text"
            name="city"
            class="form-control"
            value="{{ old('city', $lead->city ?? '') }}"
            placeholder="City">
    </div>

    <!-- Address -->
    <div class="col-md-12 mb-3">
        <label class="form-label">Address</label>

        <textarea name="address"
            rows="3"
            class="form-control"
            placeholder="Enter Address">{{ old('address', $lead->address ?? '') }}</textarea>
    </div>

    <!-- Lead Source -->
    <div class="col-md-4 mb-3">
        <label class="form-label">Lead Source <span class="text-danger">*</span></label>

        <select name="source_id" class="form-select">

            <option value="">Select Source</option>

            @foreach($sources as $source)

            <option value="{{ $source->id }}"
                {{ old('source_id', $lead->source_id ?? '') == $source->id ? 'selected' : '' }}>

                {{ $source->name }}

            </option>

            @endforeach

        </select>
    </div>

    <!-- Lead Status -->
    <div class="col-md-4 mb-3">
        <label class="form-label">Lead Status <span class="text-danger">*</span></label>

        <select name="status_id" class="form-select">

            <option value="">Select Status</option>

            @foreach($statuses as $status)

            <option value="{{ $status->id }}"
                {{ old('status_id', $lead->status_id ?? '') == $status->id ? 'selected' : '' }}>

                {{ $status->name }}

            </option>

            @endforeach

        </select>
    </div>

    <!-- Assign User -->
    <div class="col-md-4 mb-3">
        <label class="form-label">Assign To</label>

        <select name="assigned_to" class="form-select">

            <option value="">Select User</option>

            @foreach($users as $user)

            <option value="{{ $user->id }}"
                {{ old('assigned_to', $lead->assigned_to ?? '') == $user->id ? 'selected' : '' }}>

                {{ $user->name }}

            </option>

            @endforeach

        </select>
    </div>

    <!-- Expected Value -->
    <div class="col-md-4 mb-3">
        <label class="form-label">Expected Value</label>

        <input type="number"
            step="0.01"
            name="expected_value"
            class="form-control"
            value="{{ old('expected_value', $lead->expected_value ?? 0) }}">
    </div>

    <!-- Remarks -->
    <div class="col-md-8 mb-3">
        <label class="form-label">Remarks</label>

        <textarea name="remarks"
            rows="3"
            class="form-control"
            placeholder="Remarks">{{ old('remarks', $lead->remarks ?? '') }}</textarea>
    </div>

</div>

<div class="text-end">

    <button type="submit" class="btn btn-success">
        <i class="fa fa-save"></i> Save
    </button>

    <a href="{{ route('leads.index') }}" class="btn btn-secondary">
        Cancel
    </a>

</div>

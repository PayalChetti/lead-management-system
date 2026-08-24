<div class="mb-3">
    <label class="form-label">Source Name <span class="text-danger">*</span></label>

    <input type="text"
        name="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $leadSource->name ?? '') }}"
        placeholder="Enter Source Name">

    @error('name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Status</label>

    <select name="is_active" class="form-select">

        <option value="1"
            {{ old('is_active', $leadSource->is_active ?? 1) == 1 ? 'selected' : '' }}>
            Active
        </option>

        <option value="0"
            {{ old('is_active', $leadSource->is_active ?? 1) == 0 ? 'selected' : '' }}>
            Inactive
        </option>

    </select>
</div>

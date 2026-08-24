<div class="mb-3">
    <label for="name" class="form-label">Status Name <span class="text-danger">*</span></label>

    <input type="text"
        name="name"
        id="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $leadStatus->name ?? '') }}"
        placeholder="Enter Status Name">

    @error('name')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="color" class="form-label">Color</label>

    <select name="color"
        id="color"
        class="form-select @error('color') is-invalid @enderror">

        <option value="">Select Color</option>

        <option value="primary" {{ old('color', $leadStatus->color ?? '') == 'primary' ? 'selected' : '' }}>Primary (Blue)</option>

        <option value="success" {{ old('color', $leadStatus->color ?? '') == 'success' ? 'selected' : '' }}>Success (Green)</option>

        <option value="danger" {{ old('color', $leadStatus->color ?? '') == 'danger' ? 'selected' : '' }}>Danger (Red)</option>

        <option value="warning" {{ old('color', $leadStatus->color ?? '') == 'warning' ? 'selected' : '' }}>Warning (Yellow)</option>

        <option value="info" {{ old('color', $leadStatus->color ?? '') == 'info' ? 'selected' : '' }}>Info (Light Blue)</option>

        <option value="secondary" {{ old('color', $leadStatus->color ?? '') == 'secondary' ? 'selected' : '' }}>Secondary (Gray)</option>

        <option value="dark" {{ old('color', $leadStatus->color ?? '') == 'dark' ? 'selected' : '' }}>Dark (Black)</option>

    </select>

    @error('color')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="mb-3">
    <label for="is_active" class="form-label">Status</label>

    <select name="is_active"
        id="is_active"
        class="form-select">

        <option value="1" {{ old('is_active', $leadStatus->is_active ?? 1) == 1 ? 'selected' : '' }}>
            Active
        </option>

        <option value="0" {{ old('is_active', $leadStatus->is_active ?? 1) == 0 ? 'selected' : '' }}>
            Inactive
        </option>

    </select>
</div>

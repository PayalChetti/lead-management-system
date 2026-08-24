<div class="row">

    <!-- Lead -->
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Lead <span class="text-danger">*</span>
        </label>

        <select name="lead_id"
            class="form-select @error('lead_id') is-invalid @enderror">

            <option value="">Select Lead</option>

            @foreach($leads as $lead)

            <option value="{{ $lead->id }}"
                {{ old('lead_id', $followUp->lead_id ?? '') == $lead->id ? 'selected' : '' }}>

                {{ $lead->lead_no }} - {{ $lead->name }}

            </option>

            @endforeach

        </select>

        @error('lead_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>

    <!-- Follow-up Date -->
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Follow-up Date <span class="text-danger">*</span>
        </label>

        <input type="date"
            name="followup_date"
            class="form-control @error('followup_date') is-invalid @enderror"
            value="{{ old('followup_date', $followUp->followup_date ?? '') }}">

        @error('followup_date')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>

    <!-- Status -->
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Status <span class="text-danger">*</span>
        </label>

        <select name="status"
            class="form-select @error('status') is-invalid @enderror">

            <option value="">Select Status</option>

            <option value="Pending"
                {{ old('status', $followUp->status ?? '') == 'Pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="Completed"
                {{ old('status', $followUp->status ?? '') == 'Completed' ? 'selected' : '' }}>
                Completed
            </option>

            <option value="Missed"
                {{ old('status', $followUp->status ?? '') == 'Missed' ? 'selected' : '' }}>
                Missed
            </option>

        </select>

        @error('status')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>

    <!-- Remarks -->
    <div class="col-md-12 mb-3">

        <label class="form-label">
            Remarks <span class="text-danger">*</span>
        </label>

        <textarea name="remarks"
            rows="4"
            class="form-control @error('remarks') is-invalid @enderror"
            placeholder="Enter Follow-up Remarks">{{ old('remarks', $followUp->remarks ?? '') }}</textarea>

        @error('remarks')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>

</div>

<div class="text-end">

    <button type="submit" class="btn btn-success">

        <i class="fa fa-save"></i> Save

    </button>

    <a href="{{ route('follow-ups.index') }}" class="btn btn-secondary">

        Cancel

    </a>

</div>

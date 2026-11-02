
<div class="card shadow-sm">

    <div class="card-header bg-primary text-white">
        <h2 class="h5 mb-0">
            {{ $editing ? 'Edit Course' : 'Register a Course' }}
        </h2>
    </div>

    <div class="card-body">

        @if($errors->any())
            <div class="notice error">
                <strong>Please fix the following errors:</strong>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST"
              action="{{ $editing ? route('courses.update', $editing->id) : route('courses.store') }}">

            @csrf

            @if($editing)
                @method('PUT')
            @endif

            <div class="row g-3">

                <div class="col-md-6">
                    <label for="course_code" class="form-label">
                        Course Code
                    </label>

                    <input
                        type="text"
                        id="course_code"
                        name="course_code"
                        class="form-control @error('course_code') is-invalid @enderror"
                        value="{{ old('course_code', $editing?->course_code) }}"
                        maxlength="20"
                        required
                    >

                    @error('course_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="course_name" class="form-label">
                        Course Name
                    </label>

                    <input
                        type="text"
                        id="course_name"
                        name="course_name"
                        class="form-control @error('course_name') is-invalid @enderror"
                        value="{{ old('course_name', $editing?->course_name) }}"
                        maxlength="150"
                        required
                    >

                    @error('course_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="credit_hours" class="form-label">
                        Credit Hours
                    </label>

                    <input
                        type="number"
                        id="credit_hours"
                        name="credit_hours"
                        class="form-control @error('credit_hours') is-invalid @enderror"
                        value="{{ old('credit_hours', $editing?->credit_hours) }}"
                        min="1"
                        max="6"
                        required
                    >

                    @error('credit_hours')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="semester" class="form-label">
                        Semester
                    </label>

                    <select
                        id="semester"
                        name="semester"
                        class="form-select @error('semester') is-invalid @enderror"
                        required
                    >
                        <option value="">Select semester</option>

                        <option value="Spring 2026"
                            @selected(old('semester', $editing?->semester) === 'Spring 2026')>
                            Spring 2026
                        </option>

                        <option value="Fall 2026"
                            @selected(old('semester', $editing?->semester) === 'Fall 2026')>
                            Fall 2026
                        </option>
                    </select>

                    @error('semester')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">

                    <button type="submit" class="btn btn-primary">
                        {{ $editing ? 'Save Changes' : 'Register Course' }}
                    </button>

                    @if($editing)
                        <a href="{{ route('dashboard') }}"
                           class="btn btn-secondary">
                            Cancel
                        </a>
                    @endif

                </div>

            </div>
        </form>

    </div>
</div>

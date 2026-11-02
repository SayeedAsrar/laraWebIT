
<div>
    <div class="details-header">
        <h2>Course Details</h2>
        <span class="course-name">{{ $viewing->course_name }}</span>
    </div>

    <div class="detail-grid">
        <div class="field">
            <strong>Course Code</strong>
            <p>{{ $viewing->course_code }}</p>
        </div>

        <div class="field">
            <strong>Course Name</strong>
            <p>{{ $viewing->course_name }}</p>
        </div>

        <div class="field">
            <strong>Credit Hours</strong>
            <p>{{ $viewing->credit_hours }}</p>
        </div>

        <div class="field">
            <strong>Semester</strong>
            <p>{{ $viewing->semester }}</p>
        </div>

        <div class="field">
            <strong>Registered On</strong>
            <p>{{ $viewing->created_at?->format('d M Y, h:i A') ?? 'N/A' }}</p>
        </div>
    </div>

    <div class="actions">
        <a href="{{ route('courses.edit', $viewing->id) }}"
           class="btn-primary">
            Edit This Course
        </a>

        <a href="{{ route('dashboard') }}"
           class="btn-neutral">
            Close Details
        </a>
    </div>
</div>

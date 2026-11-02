<div class="card shadow-sm mb-4">

    <div class="card-header">
        <h2 class="h5 mb-0">
            Registered Courses ({{ $courses->count() }})
        </h2>
    </div>

    <div class="card-body">

        @if($courses->isEmpty())

            <p>No courses registered yet.</p>

        @else

            <div class="table-wrap">

                <table class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Credit Hours</th>
                            <th>Semester</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($courses as $course)

                            <tr @if($editing && $editing->id == $course->id) class="editing-row" @endif>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $course->course_code }}</td>

                                <td>{{ $course->course_name }}</td>

                                <td>{{ $course->credit_hours }}</td>

                                <td>{{ $course->semester }}</td>

                                <td>
                                    <a href="{{ route('courses.show', $course->id) }}">
                                        View
                                    </a>

                                    |

                                    <a href="{{ route('courses.edit', $course->id) }}">
                                        Edit
                                    </a>

                                    |

                                    <form
                                        method="POST"
                                        action="{{ route('courses.destroy', $course->id) }}"
                                        style="display:inline;"
                                        onsubmit="return confirm('Are you sure you want to delete this course?');"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @endif

    </div>

</div>
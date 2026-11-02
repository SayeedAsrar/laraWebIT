
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Course Dashboard</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/dashboard.css') }}"
    >
</head>

<body>

    <!-- Navigation Bar -->
    <header class="topbar">

        <div class="container nav-row">

            <a
                href="{{ route('dashboard') }}"
                class="brand"
            >
                Course Dashboard
            </a>

            <form
                method="POST"
                action="{{ route('logout') }}"
            >
                @csrf

                <button
                    type="submit"
                    class="btn btn-light"
                >
                    Logout
                </button>
            </form>

        </div>

    </header>

    <!-- Main Dashboard -->
    <main class="container page">

        <h1>
            Welcome,
            {{ auth()->user()->name }}!
        </h1>

        <p class="muted">
            Register and manage your own courses.
        </p>

        <!-- Success Message -->
        @if(session('success'))

            <div class="notice success">
                {{ session('success') }}
            </div>

        @endif

        <!-- Dashboard Grid -->
        <div class="dashboard-grid">

            <!-- Course Registration Form -->
            <div>
                @include('courses.form')
            </div>

            <!-- Registered Courses Table -->
            <div>
                @include('courses.table')
            </div>

        </div>

        <!-- Course Details -->
        @if($viewing)

            <div class="card details">

                @include('courses.details')

            </div>

        @endif

    </main>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Student</h2>

    <form action="{{ route('students.update', $student->id) }}" method="POST" class="card p-4 shadow">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name', $student->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" name="age" value="{{ old('age', $student->age) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Grade</label>
            <input type="number" name="grade" value="{{ old('grade', $student->grade) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Contact Number</label>
            <input type="text" name="contact_number" value="{{ old('contact_number', $student->contact_number) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email', $student->email) }}" class="form-control" required>
        </div>

            <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary px-5 me-3">Update Student</button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary px-5">Cancel</a>
    </div>

    </form>
</div>

</body>
</html>

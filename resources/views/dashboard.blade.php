<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
    }
    .navbar {
      margin-bottom: 30px;
    }
    .card {
      border-radius: 12px;
    }
  </style>
</head>
<body>

  
  <nav class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">Student Management System</a>
    </div>
  </nav>

  
  <div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold">Dashboard</h2>
      <a href="{{ route('students.create') }}" class="btn btn-primary">+ Add Student</a>
    </div>

    
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="card-title mb-3">Student List</h4>
        <div class="table-responsive">
          <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Grade</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
              <tbody>
      @forelse($students as $student)
          <tr>
              <td>{{ $student->id }}</td>
              <td>{{ $student->name }}</td>
              <td>{{ $student->age }}</td>
              <td>{{ $student->grade }}</td>
              <td>{{ $student->contact_number }}</td>
              <td>{{ $student->email }}</td>
              <td>
                  <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>

                  <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm"
                          onclick="return confirm('Are you sure you want to delete this student?')">
                          Delete
                      </button>
                  </form>
              </td>
          </tr>
      @empty
          <tr>
              <td colspan="7" class="text-center">No students found</td>
          </tr>
      @endforelse
  </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
  
  
  


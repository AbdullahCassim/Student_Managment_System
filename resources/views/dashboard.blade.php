<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">SMS System</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>

                </ul>
            </div>
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
  
  
  


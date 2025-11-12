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
  </style>
</head>
<body>

  
  <nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">Student Management System</a>
    </div>
  </nav>
  
</div>


  
  <div class="container" >
    <h2 class="text-center mb-4">Dashboard</h2>
    <div class="card shadow-sm">
      <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
  
        <h4 class="card-title mb-3">Student List</h4>
        <table class="table table-bordered table-striped">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Age</th>
              <th>Grade</th>
              <th>Contact</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($students as $student)
              <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->age }}</td>
                <td>{{ $student->grade }}</td>
                <td>{{ $student->contact_number }}</td>
                <td>{{ $student->email }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center text-muted">No students found</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

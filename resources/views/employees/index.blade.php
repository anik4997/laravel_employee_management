<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/employee.css') }}">
</head>
<body>
    <div class="container">
        <h2 class="my-3">Employee List</h2>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Serial no</th>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Role</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
        @if ($employees->count() > 0)
            @foreach ($employees as $key => $employee)
                <tbody>
                    <tr>
                      <th scope="row">{{ $key + 1 }}</th>
                      <td><img class="employee_img" src="{{ asset('uploads/' . $employee->photo) }}" alt="{{ $employee->name }}"></td>
                      <td>{{ $employee->name }}</td>
                      <td>{{ $employee->role }}</td>
                      <td>{{ $employee->email }}</td>
                      <td>{{ $employee->phone }}</td>
                      <td>
                          <!-- Delete Button -->
                          <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                          </form>
                          
                          <!-- Edit Button -->
                          <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary btn-sm ml-1">Edit</a>
                      </td>
                    </tr>
                </tbody>
            @endforeach
        @else
            <p>No employees found.</p>
        @endif
</table>
        <button type="button" class="btn btn-primary add_employee_btn"><a href="{{ route('employees.create') }}" class="btn-add">Add New Employee</a></button>  
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

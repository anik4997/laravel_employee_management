<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/employee.css') }}">
</head>
<body>
    <div class="container">
        <h2>Edit Employee</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Change Name or, remain it same</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $employee->name) }}">
            </div>

            <div class="form-group">
                <label for="email">Change Email or, remain it same</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $employee->email) }}">
            </div>

            <div class="form-group">
                <label for="role">Change Role or, remain it same</label>
                <input type="text" class="form-control" id="role" name="role" value="{{ old('role', $employee->role) }}">
            </div>

            <div class="form-group">
                <label for="phone">Change Phone no or, remain it same</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $employee->phone) }}">
            </div>

            <div class="form-group">
                <label for="photo">Change Photo or, leave empty to remain it same</label>
                <input type="file" class="form-control-file" id="photo" name="photo">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>

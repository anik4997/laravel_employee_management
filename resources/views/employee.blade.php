<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin panel | Dashboard</title>
  @include('layouts.partial.css_link')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  @include('layouts.partial.preloader')
  @include('layouts.partial.navbar')

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  @include('layouts.partial.brand_logo')
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      @include('layouts.partial.admin_info')
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('admin')}}" class="nav-link">
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <p>
                Employee lists
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('create')}}" class="nav-link">
              <p>
                Add an Employee
              </p>
            </a>
          </li>
          <li class="nav-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="btn btn-success justify-content-center" type="submit">Logout</button>
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Employee list</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List of Employees</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
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
                      <td><img class="employee_img" src="{{ asset('uploads/' . $employee->photo) }}" alt="{{ $employee->name }}" style="height: 50px; width: 50px; border-radius: 50%;"></td>
                      <td>{{ $employee->name }}</td>
                      <td>{{ $employee->role }}</td>
                      <td>{{ $employee->email }}</td>
                      <td>{{ $employee->phone }}</td>
                      <td>
                          <!-- Delete Button -->
                          <form action="{{ route('destroy', $employee->id) }}" method="POST" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                          </form>
                          
                          <!-- Edit Button -->
                          <a href="{{ route('edit', $employee->id) }}" class="btn btn-primary btn-sm ml-1">Edit</a>
                      </td>
                    </tr>
                </tbody>
            @endforeach
        @else
            <p>No employees found.</p>
        @endif
</table>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @include('layouts.partial.footer')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('layouts.partial.js_links')
</body>
</html>

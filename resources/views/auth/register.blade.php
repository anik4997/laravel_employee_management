<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Registration Page</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/plugins')}}/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('css/plugins')}}/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/dist')}}/css/adminlte.min.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <style>
    .alert-danger {
    color: #dc3545;
    /* background-color: #dc3545; 
    border-color: #d32535; */
    background: none !important;
    }
    .alert {
    position: relative;
    padding: 10px 16px;
    margin-bottom: 0rem; 
    border: none; 
    border-radius: 0rem;
    }
  </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="{{route('register')}}"><b>Admin</b>Registration</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register as admin</p>

      <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="input-group mb-3">
            <input type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" placeholder="Full Name" value="{{ old('full_name') }}" required>
            <!-- Error message container -->
            @error('full_name')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" autocomplete="new-email" required>
            <!-- Error message container -->
            @error('email')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="new-password" required>
            <!-- Error message container -->
            @error('password')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Retype Password" required>
            <!-- Error message container -->
            @error('password_confirmation')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>

        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" required>
                <label class="custom-file-label" for="image">Choose image</label>
                <!-- Error message container -->
                @error('image')
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>

        <div class="icheck-primary">
            <input type="checkbox" id="agreeTerms" name="terms" value="1" {{ old('terms') ? 'checked' : '' }} required>
            <label for="agreeTerms">
                I agree to the <a href="#">terms</a>
            </label>
            <!-- Error message container -->
            @error('terms')
                <div class="alert alert-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>


        <div class="g-recaptcha mb-1" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
    
        <button type="submit" class="btn btn-primary btn-block">Register</button>
      </form>

      <a href="{{route('login')}}" class="text-center">Already registered as admin</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('js/plugins')}}/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('js/plugins')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/dist')}}/js/adminlte.min.js"></script>

<!-- Custom script for displaying selected file name -->
<script>
  // Add event listener to file input field
  document.getElementById('image').addEventListener('change', function(e) {
    // Get the selected file name
    var fileName = e.target.files[0].name;

    // Display the selected file name in the label
    var label = document.querySelector('.custom-file-label');
    label.textContent = fileName;
  });
</script>
</body>
</html>

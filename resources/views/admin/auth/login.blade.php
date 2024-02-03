<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Hacker Login Form</title>
  <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

</head>
<body>
<!-- partial:index.partial.html -->
<section>
    @include('admin.auth.partial_login')

    <div class="signin">
      <div class="content">
        <h2>Sign In</h2>
        <form action="{{ route('admin.loginPost') }}" method="post">
          @csrf
            <div class="form">
                <div class="inputBox">
                    <input type="text" name="email" required>
                    <i>Email</i>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required>
                    <i>Password</i>
                </div>
                <div class="links">
                    <a href="{{ route('password.request') }}">Forgot Password</a>
                </div>
                <div class="inputBox">
                    <button type="submit">Sign In</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </section>
<!-- partial -->
  
</body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{asset('template_dashboard')}}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('template_dashboard')}}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('template_dashboard')}}/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('template_dashboard')}}/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('template_dashboard')}}/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="email" value="{{ old('email') }}" id="email" required autocomplete="email" />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" required autocomplete="current-password"/>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div>
                <button class="btn btn-sm btn-default submit" type="submit">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <a href="/"> <h1><i class="fa fa-pencil"></i> <span> BayarYuk!</span></h1>
                  </a>
                  <p>©2021 All Rights Reserved. Made with <i class="fa fa-heart red"></i> by Millenio</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="POST" action="{{ route('register') }}">
                @csrf
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" id="name" placeholder="Username" name="name" value="{{ old('name') }}" required autocomplete="name" />
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="new-password" id="password" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password Confirmation" name="password_confirmation" required autocomplete="new-password" id="password-confirm" />
                
              </div>
              <div>
                <button class="btn btn-default btn-sm submit" type="submit">Register</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                 <a href="/"> <h1><i class="fa fa-pencil"></i> <span> BayarYuk!</span></h1>
                 </a>
                  <br>
                  <p>©2021 All Rights Reserved. Made with <i class="fa fa-heart red"></i> by Millenio</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

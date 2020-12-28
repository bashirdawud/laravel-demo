<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  
  <link href="{{ asset('assets/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/flag-icons/css/flag-icon.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/ladda/ladda.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="assets/css/sleek.css" />

  

  <!-- FAVICON -->
  <link href="assets/img/favicon.png" rel="shortcut icon" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="{{ asset('assets/plugins/nprogress/nprogress.js') }}"></script>
</head>
<body>


    <div class="container d-flex flex-column justify-content-between vh-100">
        <div class="row justify-content-center mt-5">
          <div class="col-xl-5 col-lg-6 col-md-10">
            <div class="card">
              <div class="card-header bg-primary">
                <div class="app-brand">
                  <a href="#">
                    <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30"
                      height="33" viewBox="0 0 30 33">
                      <g fill="none" fill-rule="evenodd">
                        <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                      </g>
                    </svg>
                    <span class="brand-name">Sign up</span>
                  </a>
                </div>
              </div>
              <div class="card-body p-5">
                <h4 class="text-dark mb-5">Sign up</h4>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                  <div class="row">
                    <div class="form-group col-md-12 mb-4">
                      <input type="text" class="form-control input-lg" name="name" :value="old('name')" aria-describedby="nameHelp" placeholder="Name" required autofocus autocomplete="name">
                    </div>
                    <div class="form-group col-md-12 mb-4">
                      <input type="email" class="form-control input-lg" name="email" :value="old('email')" aria-describedby="emailHelp" placeholder="Email" required>
                    </div>
                    <div class="form-group col-md-12 ">
                      <input type="password" class="form-control input-lg" name="password" placeholder="Password" required autocomplete="new-password">
                    </div>
                    <div class="form-group col-md-12 ">
                      <input type="password" class="form-control input-lg" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                    </div>
                    <div class="col-md-12">
                      <div class="d-inline-block mr-3">
                        <label class="control control-checkbox">
                          <input type="checkbox" />
                          <div class="control-indicator"></div>
                          I Agree the terms and conditions
                        </label>
                  
                      </div>
                      <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Register</button>
                      <p>Already have an account?
                        <a class="text-blue" href="{{ route('login') }}">Sign in</a>
                      </p>
                    </div>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
        <div class="copyright pl-0">
          <p class="text-center">&copy; 2018 Copyright Sleek Dashboard Bootstrap Template by
            <a class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
          </p>
        </div>
      </div>
</body>
</html>

        
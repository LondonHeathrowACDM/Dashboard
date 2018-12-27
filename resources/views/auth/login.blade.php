<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ACDM Login</title>
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon-120x120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">

    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("acdm_assets/css/vendors.css")}}">
    <link rel="stylesheet" type="text/css" href="{{ asset("acdm_assets/vendors/css/forms/icheck/icheck.css")}}">
    <link rel="stylesheet" type="text/css" href="{{ asset("acdm_assets/vendors/css/forms/icheck/custom.css")}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("acdm_assets/css/app.css")}}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("acdm_assets/css/core/menu/menu-types/vertical-overlay-menu.css")}}">
    <link rel="stylesheet" type="text/css" href="{{ asset("acdm_assets/css/core/colors/palette-gradient.css")}}">
    <link rel="stylesheet" type="text/css" href="{{ asset("acdm_assets/css/pages/login-register.css")}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("acdm_assets/css/style.css")}}">
    <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 1-column  bg-cyan bg-lighten-2 menu-expanded blank-page blank-page"
      data-open="click" data-menu="vertical-menu" data-col="1-column">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <div class="p-1">
                                        <img src=" {{asset('img/LHR-ACDM.png')}} " alt="branding logo"  style="width:75%">
                                    </div>
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>Easily Using</span>
                                </h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body pt-0">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                        {!! csrf_field() !!}
                                        <fieldset class="form-group floating-label-form-group">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                <br>
                                                <br>
                                            @endif
                                            <label for="user-name">Your Email</label>
                                            <input type="text" class="form-control" id="user-name" name="email" value="{{ old('email') }}" placeholder="Your Username">
                                        </fieldset>
                                        <fieldset class="form-group{{ $errors->has('password') ? ' has-error' : '' }} floating-label-form-group mb-1">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                <br>
                                            @endif
                                            <label for="user-password">Enter Password</label>
                                            <input type="password" class="form-control" id="user-password" name="password" placeholder="Enter Password">
                                        </fieldset>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-12 text-center text-sm-left">
                                                <fieldset>
                                                    <input type="checkbox" id="remember-me" class="chk-remember" name="remember">
                                                    <label for="remember-me" > Remember Me</label>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="{{ url('/password/reset') }}" class="card-link">Forgot Password?</a></div>
                                        </div>
                                        <button type="submit" class="btn btn-outline-purple btn-block"><i class="ft-unlock"></i> Login</button>
                                    </form>
                                </div>
                                {{--<p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">--}}
                                {{--<span>Got a VATSIM account?</span>--}}
                                {{--</p>--}}
                                {{--<div class="card-body">--}}
                                {{--<a href="{{ url('') }}" class="btn btn-outline-success btn-block"><i class="ft-user"></i> VATSIM SSO</a>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- BEGIN VENDOR JS-->
<script src="{{ asset("acdm_assets/vendors/js/vendors.min.js")}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset("acdm_assets/vendors/js/forms/validation/jqBootstrapValidation.js")}}"
        type="text/javascript"></script>
<script src="{{ asset("acdm_assets/vendors/js/forms/icheck/icheck.min.js")}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{ asset("acdm_assets/js/core/app-menu.js")}}" type="text/javascript"></script>
<script src="{{ asset("acdm_assets/js/core/app.js")}}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset("acdm_assets/js/scripts/forms/form-login-register.js")}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>
</html>

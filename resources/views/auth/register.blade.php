<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMOMEN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/assets/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
            <b>SISTEM MONITORING</b><br>DAN <b>MANAJEMEN</b><br><b>IT INFRASTRUCTURE</b>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register user baru.</p>

        <form method="POST" action="{{ route('register') }}">

            {{ csrf_field() }}

            <!-- name -->
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                <input id="name" type="text" class="form-control" placeholder="Full name" name="name"
                       value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif

                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <!-- email -->
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                <input id="email" type="email" class="form-control" placeholder="Email" name="email"
                       value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <!-- username -->
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} has-feedback">
                <input id="username" type="username" class="form-control" placeholder="Username" name="username"
                       value="{{ old('username') }}" required autofocus>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <!-- role -->
            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }} has-feedback">
               <select class="form-control select2" style="width: 100%;" name="role">
                  @foreach($role as $role)
                       <option value='{{ $role->id }}'>{{ $role->name }}</option>
                  @endforeach
               </select>
            </div>

            <!-- password -->
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                <input id="password" type="password" placeholder="Password" class="form-control" name="password"
                       required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input id="password-confirm" type="password" placeholder="Retype password" class="form-control"
                       name="password_confirmation" required>

                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <!-- <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Saya setuju dengan <a href="#">syarat dan ketentuan.</a>
                        </label>
                    </div> -->
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <!-- <a href="{{ route('login') }}" class="text-center">I already have a membership</a> -->
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/assets/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>

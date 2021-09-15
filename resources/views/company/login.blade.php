<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Company Login</title>
    <link rel="shortcut icon" href="{{ asset('assets/image/logo.png') }}">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('assets/plugins/parsleyjs/parsley.css') }}" rel="stylesheet" type="text/css" /> 
    <style>
        .login-form {
            width: 450px;
            margin: 50px auto;
            font-size: 18px;
        }
        .login-form form {
            margin-bottom: 30px;
            background: #f7f7f7;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 50px;
        }
        .login-form h2 {
            margin: 10px 0 30px;
        }
        .form-control {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn {    
            margin-top: 40px;
            min-height: 38px;
            border-radius: 2px;    
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <form action="{{ route('PostCompanyLogin') }}" method="post" id="login_form">
           {!! csrf_field() !!}
           <h2 class="text-center">Company Login</h2>
           @if(\Session::get('success'))
           <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ \Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif
        {{ \Session::forget('success') }}
        @if(\Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ \Session::get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif       
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required data-parsley-required-message="Please enter email">
            @if ($errors->has('email'))
            <span class="help-block font-red-mint text-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required data-parsley-required-message="Please enter password">
            @if ($errors->has('password'))
            <span class="help-block font-red-mint text-danger">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
        <input type="hidden" name="offset" id="offset" />
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" id="button">Login</button>
        </div>  
    </form>
</div>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script> 
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
<script>
    setTimeout(function() {
    $('.alert').fadeOut('fast');
    }, 2000);
    $(document).ready(function(){
        $('#button').on('click', function(){
            $("#login_form").parsley(); 
        });
    });
</script>
</body>
</html>
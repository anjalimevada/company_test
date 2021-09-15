<!DOCTYPE html>
<html>
<head>
    <title>Company Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, initial-scale=1, minimum-scale=1, maximum-scale=1" ">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('assets/plugins/parsleyjs/parsley.css') }}" rel="stylesheet" type="text/css" /> 
    <style>
    .note
    {
        text-align: center;
        height: 80px;
        background: -webkit-linear-gradient(left, #0072ff, #8811c5);
        color: #fff;
        font-weight: bold;
        line-height: 80px;
        font-size: 20px;
        border-radius:0.5rem;
    }
    .form-content
    {
        padding: 5%;
        border: 1px solid #ced4da;
        margin-bottom: 2%;
        border-radius:0.5rem;
    }
    .form-control{
        border-radius:0.5rem;
    }
    .btnSubmit
    {
        border:none;
        border-radius:0.5rem;
        padding: 1%;
        width: 20%;
        cursor: pointer;
        background: #0062cc;
        color: #fff;
    }
    .container {
        width: 65%;
        margin-top: 30px;
    }

    </style>
</head>
<body>

    <div class="container register-form">
    <form action="{{ route('postCompanyRegister') }}" method="post" class="form" id="register_form">
        {!! csrf_field() !!}
                <div class="note">
                    <p>Register Your Company </p>
                </div>
                @if(\Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ \Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif
                {{ \Session::forget('success') }}
                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Company name *" name="name" value="{{ old('name')}}" required data-parsley-required-message="Please enter your Company name"/>
                                @if ($errors->has('name'))
                                <span class="help-block text-danger">
                                    <p>{{ $errors->first() }}</p>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Company email *" name="email" value="{{ old('email')}}" required data-parsley-required-message="Please enter email"/>
                                @if ($errors->has('email'))
                                <span class="help-block text-danger">
                                    <p>{{ $errors->first('email') }}</p>
                                </span>
                                @endif
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Company mobile number *" minLength="8" name="mobile" value="{{ old('mobile')}}" required data-parsley-type="number" data-parsley-required-message="Please enter number" onkeypress="return isNumber(event)"/>
                                @if ($errors->has('mobile'))
                                <span class="help-block text-danger">
                                    <p>{{ $errors->first('mobile') }}</p>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password *" id="password" name="password" value="" required data-parsley-required-message="Please enter password"/>
                                @if ($errors->has('password'))
                                <span class="help-block text-danger">
                                    <p>{{ $errors->first('password') }}</p>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Re-enter password *" name="password_confirmation" value="" required data-parsley-equalto="#password" data-parsley-required-message="Please enter confirm password"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Company address *" name="address" id="address" required data-parsley-required-message="Please enter address">  </textarea>
                                @if ($errors->has('address'))
                                <span class="help-block text-danger">
                                <p>{{ $errors->first('address') }}</p>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="url" class="form-control" placeholder="Company website *" name="website" id="website" value="{{old('website')}}" required data-parsley-required-message="Please enter area">
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div class="form-group">
                                <input type="file" class="form-control" name="logo" id="logo" value="{{old('logo')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 offset-5">
                        <button type="submit" class="btnSubmit" id="button">Register</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script> 
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC18rh6NG5hCj3yy66q9IRZJeMgXEucwq0&callback=initAutocomplete&libraries=places" async></script>
        <script src="{{ asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
        
        <script>
            $(document).ready(function(){
                $('#button').on('click', function(){
                    $("#register_form").parsley(); 
                });
            });

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }   
     </script>
</body>
</html>
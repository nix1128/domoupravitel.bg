@extends('frontview.layouts.welcome')


@section('welcome')
<!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" href="{{URL::asset('css/registrationForm.css')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-black-50 text-center">Регистрация</div>

                <div class="card-body">

                    <form  method="post" action="/register" name ="name" >
                        @csrf



                        <div class="input-container">
                            <i class="fa fa-user icon"></i>
                            <input class="input-field" type="text" placeholder="First name, Last name" name="first_last_name"
                                   value="{{ old('first_last_name') }}" >

                        </div>
                        <div  style="text-align: center;color: #6f1C00;"> {{$errors -> first('first_last_name')}}</div>



                        <div class="input-container">
                            <i class="fa fa-at icon"></i>
                            <input class="input-field" type="text" placeholder="Username" name="username" value="{{ old('username') }}">
                        </div><div style="text-align: center;color: #6f1C00;"> {{$errors -> first('username')}}</div>


                        <div class="input-container">
                            <i class="fa fa-envelope icon"></i>

                            <input class="input-field" type="text" placeholder="Email" name="email"  value= "{{ old('email') }}">

                        </div>
                        <div  style="text-align: center;color: #6f1C00;"> {{$errors -> first('email')}}</div>


                        <div class="input-container">
                            <i class="fa fa-key icon"></i>
                            <input class="input-field" type="password" placeholder="Password" name="password" >
                        </div>
                        <div  style="text-align: center;color: #6f1C00;"> {{$errors -> first('password')}}</div>


                        <div class="input-container">
                            <i class="fa fa-check-circle icon"></i>
                            <input class="input-field" type="password" placeholder="Repeat password" name="retype_password">
                        </div><div  style="text-align: center;color: #6f1C00;"> {{$errors -> first('retype_password')}}</div>


                        <p style="font-size: 12px; text-align: center;">By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

                        <button type="submit" class="btn" >Register</button>


                    </form>
                </div>
            </div>
        </div>





{{--<form method="post" action="/register" name ="name" style="max-width:500px;margin:auto">--}}

    {{--{{ csrf_field() }}--}}
    {{--<br><br>--}}
    {{--<h2 style ='text-align: center; color: #000000;;'>РЕГИСТРАЦИЯ</h2>--}}

    {{--<div class="input-container">--}}
        {{--<i class="fa fa-user icon"></i>--}}
        {{--<input class="input-field" type="text" placeholder="First name, Last name" name="first_last_name"--}}
        {{--value="{{ old('first_last_name') }}" >--}}

    {{--</div>--}}
    {{--<div  style="text-align: center;color: #6f1C00;"> {{$errors -> first('first_last_name')}}</div>--}}



    {{--<div class="input-container">--}}
        {{--<i class="fa fa-at icon"></i>--}}
        {{--<input class="input-field" type="text" placeholder="Username" name="username" value="{{ old('username') }}">--}}
    {{--</div><div style="text-align: center;color: #6f1C00;"> {{$errors -> first('username')}}</div>--}}


    {{--<div class="input-container">--}}
        {{--<i class="fa fa-envelope icon"></i>--}}

        {{--<input class="input-field" type="text" placeholder="Email" name="email"  value= "{{ old('email') }}">--}}

    {{--</div>--}}
    {{--<div  style="text-align: center;color: #6f1C00;"> {{$errors -> first('email')}}</div>--}}


    {{--<div class="input-container">--}}
        {{--<i class="fa fa-key icon"></i>--}}
        {{--<input class="input-field" type="password" placeholder="Password" name="password" >--}}
    {{--</div>--}}
    {{--<div  style="text-align: center;color: #6f1C00;"> {{$errors -> first('password')}}</div>--}}


    {{--<div class="input-container">--}}
        {{--<i class="fa fa-check-circle icon"></i>--}}
        {{--<input class="input-field" type="password" placeholder="Repeat password" name="retype_password">--}}
    {{--</div><div  style="text-align: center;color: #6f1C00;"> {{$errors -> first('retype_password')}}</div>--}}


    {{--<p style="font-size: 12px; text-align: center;">By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>--}}

    {{--<button type="submit" class="btn" >Register</button>--}}
{{--</form>--}}

</body>
@endsection
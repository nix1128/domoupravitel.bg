@extends('frontview.layouts.welcome')

{{--@if (session('status'))--}}
    {{--<div class="alert alert-success">--}}
    {{--</div>--}}
 {{--@endif--}}


    @section('welcome')

<!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="{{URL::asset('css/registrationForm.css')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Add icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-black-50">Вход</div>

                    <div class="card-body">

                        <form  method="post" action="/login" name ="name">
                            @csrf
                            <h6 class="text-center text-xs text-success" >{{ session('status') }}</h6>

                            <div class="input-container">
                                <i class="fa fa-at icon"></i>
                                <input class="input-field" type="text" placeholder="Псевдоним" name="username" value="{{ old('username') }}">
                            </div>
                            <div  style="text-align: center;color: #6f1C00;"> {{$errors -> first('username')}}</div>

                            <div class="input-container">
                                <i class="fa fa-key icon"></i>
                                <input class="input-field" type="password" placeholder="Парола" name="password"/>

                            </div>
                            <div style="text-align: center;color: #6f1C00;"> {{$errors -> first('password')}}</div>
                            <div style="text-align: center;color: #6f1C00;"> {{$errors->first('')}}</div>
                            <div style="text-align: center;color: #6f1C00;"> {{$errors->first('status')}}</div>

                            <button type="submit" class="btn" >Влез</button>




                            <div>



<hr>
                                <p  style="font-size: 12px; text-align: center;" > <a href="passReset">Забравена Парола</a>



                                </p>

                            </div>




                        </form>



                    </div>
                </div>
            </div>

@endsection

    <!-- Default form login -->

    <!-- Default form login -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

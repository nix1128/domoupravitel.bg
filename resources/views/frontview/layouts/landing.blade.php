<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kvartala</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="{{URL::asset('css/baloon.css')}}">



    <!-- Styles -->
    <style>
        html, body {
            /*background: url("/img/community.jpg");*/
/**/
            no-repeat : center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            background-color: #fff;
            opacity: 21; /* Here is your opacity */

            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }


        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 150px;
            top: 5px;


        }

        .top-left {
            position:absolute;
            left: 150px;
            top: 5px;




        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {

            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            text-align-last: justify;

        }

        .m-b-md {
            margin-bottom: 30px;
        }

        p {
            color: #636b6f;

            font-family: 'Nunito', sans-serif;

            font-size: 23px;
            margin: 0;
        }



    </style>
</head>
<body>

<div class="row">
    <div class = "top-right">
        <img src="http://pluspng.com/img-png/one-balloon-png--510.png" class="ballon-image" id="balloon"/>
    </div>
    {{ csrf_field()}}
    </div>

        <div class="flex-center position-ref full-height">

            <div class="content">

                <div class="links">
                    <a  href="/login">Вход</a>
                    <a href="/register">Регистрация</a>
                    {{--<a href="/">Домопуправител</a>--}}
                    {{--<a href="/">Клюкини</a>--}}
                    {{--<a href="/">В Махалата</a>--}}
                    {{--<a href="/">Общината</a>--}}
                    {{--<a href="/">За Децата</a>--}}
                    {{--<a href="/">За Жената</a>--}}
                    {{--<a href="/">Нещо Друго</a>--}}


                </div>


                <div class="title m-b-md">
                    DOMOUPRAVITEL.BG
                </div>


            </div>

        </div>




</body>
</html>

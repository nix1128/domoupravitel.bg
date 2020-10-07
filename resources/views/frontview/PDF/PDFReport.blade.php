<!DOCTYPE html>
<html>




<head>

    <style>

    .body{
        font-family: "DejaVu Sans", sans-serif;
    }

    .attendance-table table{
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #000;
    }

    .blank-cell{

        min-width: 10px;


    }

    .attendance-cell{

        padding: 5px;


    }

    .attendance-table table th.attendance-cell, .attendance-table table td.attendance-cell {
        border: 1px solid #000;
    }


    </style>


    <title> Hi  {{$name}} </title>
</head>
<body class="body">



<h1>Предложение № {{$post_id}} </h1>

<div class="attendance-table">

    <table class="table-bordered">

        <tr style = "text-align: center">
            <th class="attendance-cell" style = "width: 50px">ID</th>
            <th class="attendance-cell">Име и Фамилия</th>
            <th class="attendance-cell" style="width: 50px">Гласувал</th>
            <th class="attendance-cell"  >Подпис</th>


        </tr>




        @foreach($votes as $user)

            <tr>

                <td class="attendance-cell" style="text-align: center">{{$user->id}}</td>
                <td class="attendance-cell" style="text-align: center">{{ucwords($user->user->first_last_name)}}</td>

                @if($user->liked)
                    <td class="attendance-cell" style = "text-align: center">ЗА</td>
                    @endif

                <td class="attendance-cell " style = "text-align: center">

                    <img src="{{ public_path('/storage/e-signatures/'.$user->docusign) }}" class="pic_preview" width="100px" height="50px">



                </td>

            </tr>


        @endforeach

    </table>

</div>

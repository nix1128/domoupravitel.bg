<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>

    $(document).ready(function() {
        $('#searchButton').prop('disabled', true);

        $('#searchInput').on('input', function() {
            var val = $('#searchInput').filter(function() {
                        return this.value.trim().length !== 0;
                    }).length === 0;

            $('#searchButton').prop('disabled', val);
        });
    });

</script>


<body>



<nav class="navbar navbar-light" style="background-color: #e3f2fd;">

     <div href="profile" class="font-italic" style="background-color: transparent"  >Здравей,@yield('name')</div>



    <form action='{{route('search')}}'  method="POST" role = "search" class="form-inline my-2 my-lg-0">

        @csrf



        <input class="form-control mr-sm-2 form-control" id="searchInput" name="search" type="search" placeholder="Търсене..." aria-label="Search">



        <button class="btn btn-outline-success my-2 my-sm-0" id="searchButton" type="submit" data-toggle="modal" data-target="#search">Тръси</button>

    </form>

</nav>
<div>


{{--<div class=" text-center">--}}
    {{--@if (session()->has('search_message'))--}}
        {{--<div class = "alert-warning" style="font-size:15px"> Няма намерени резултати!</div>--}}
    {{--<strong> {{session()->get('search_message')}}</strong>--}}
    {{--@endif--}}
{{--</div>--}}

    <hr>

<div class = "container"  >

    <div class="alert alert-secondary" role="alert">

        <ul class="nav"  >
            {{ csrf_field()}}

                <li class="nav-item"  >
                    <a class="nav-link active" href="/home" >Дом</a>

                </li>

            <li class="nav-item">
                <a class="nav-link" href="/contacts">Домоуправители</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/posts">Предложения</a>
            </li>
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="/posts">Предложения</a>--}}
            {{--</li>--}}


            <li class="nav-item">
                <a class="nav-link" href="/other">Колонки</a>
            </li>

            <li class="nav-item">
                {{--<a class="nav-link" href="/posts">Коментари</a>--}}
            </li>



            <li class="nav-item" >
                <a class="nav-link" href="/about">За нас</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/profile">Моя профил</a>

            </li>
  <li class="nav-item text-right">
                <a class="nav-link" href="/logout"> Изход</a>

            </li>

            <li>


            </li>
        </ul>

</div>

    @yield('content')


</div>





{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>--}}
</div>
</body>
</html>
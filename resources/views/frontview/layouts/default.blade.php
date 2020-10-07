<!-- Stored in resources/views/layouts/app.blade.php -->


<html>
<head>
    <title>@yield('title')</title>

</head>

<body>



{{-- section css not used yet--}}
@section('css')

    <link rel="stylesheet" href="{{URL::asset('css/mainForm.css')}}"/>

@endsection


</body>
</html>
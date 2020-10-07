@extends('frontview.layouts.userView')
@extends('frontview.layouts.default')


@section('title')
    Home
    @endsection

@section('content')

<div class = "text-center" style="font-size: 25px;">Welcome to Home page</div>




@endsection



@section('name')
    {{ $username }}




{{--{{$user->sex}}--}}
    {{--{{$user->sex}}--}}


    {{--@if($data->sex == 0 )--}}
        {{--<img src="{{asset('storage/avatars/1.jpeg')}} "  class="img-fluid"--}}
             {{--alt="" height="20" width="20" >--}}
    {{--@elseif($data->sex == 1)--}}
        {{--<img src="{{asset('storage/avatars/male.jpeg')}} "  class="img-fluid"--}}
             {{--alt="" height="20" width="20" >--}}
   {{--@else--}}
        {{--<img src="{{asset('storage/'.$profileImage->card->image)}} "  class="img-fluid"--}}
             {{--alt="" height="20" width="20" >--}}
{{--@endif--}}
@endsection


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

@extends('frontview.layouts.userView')
@extends('frontview.layouts.default')






@section('content')

    <h2>За нас</h2>
    @foreach($about as $v)

        <li>{{$v}}</li>



    @endforeach


@endsection


@section('name')
    {{ $username }}
    @if(isset($profileImage->card->image))
        <img src="{{asset('storage/'.$profileImage->card->image)}} "  class="img-fluid border border-warning" alt="" height="20" width="20" >
    @elseif($user->sex == 1)
        <img src="{{asset('storage/avatars/male.jpeg')}} "  class="img-fluid border border-warning"
             alt="" height="20" width="20" >
    @elseif($user->sex == 0)
        <img src="{{asset('storage/avatars/female.jpeg')}} "  class="img-fluid border border-warning"
             alt="" height="20" width="20" >
    @else
    @endif
@endsection









@extends('frontview.layouts.userView')
@extends('frontview.layouts.default')


        <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>


@if (session()->has('search_message'))
    <div class = "alert-warning" style="font-size:15px"> Няма намерени резултати!</div>
    <strong> {{session()->get('search_message')}}</strong>
@endif
@section('content')




    @if($users->count() == 0 && is_null($search))
        <table class="table table-bordered table-striped" >
      <div class = "text-center pm-md-6"><h3>Няма резултати</h3></div>
        </table>


    @else
    <div class="container">



            <table class="table table-bordered table-striped" >
            <thead>
            <tr>
                <th>First Last Name</th>
                {{--<th>Lastname</th>--}}
                <th>Email</th>
            </tr>
            </thead>

            <tbody>
            @foreach($users as $user)
                <tr>
                    <td><a href = "/contacts">{{$user->first_last_name}}</a></td>
                    <td>{{$user->Email}}</td>
                </tr>
            @endforeach
            </tbody>



                @endif


        </table>
    </div>

   <p class = "text-center">
       <a href="javascript:history.back()" class="btn btn-primary">OK,назад</a>
   </p>

@endsection



@section('name')
    {{ $username->username }}
    @if(isset($profileImage->card->image))
        <img src="{{asset('storage/'.$profileImage->card->image)}} "  class="img-fluid border border-warning" alt="" height="20" width="20" >
    @elseif($username->sex == 1)
        <img src="{{asset('storage/avatars/male.jpeg')}} "  class="img-fluid border border-warning"
             alt="" height="20" width="20" >
    @elseif($username->sex == 0)
        <img src="{{asset('storage/avatars/female.jpeg')}} "  class="img-fluid border border-warning"
             alt="" height="20" width="20" >
    @else
    @endif
@endsection





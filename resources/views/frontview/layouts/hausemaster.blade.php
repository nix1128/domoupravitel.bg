@extends('frontview.layouts.userView')
@extends('frontview.layouts.default')


@section('title')
    Contacts
@endsection

@section('content')
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

    <sc

    <form class = "pb2" method="POST" name = 'hausmasters' action='{{url('/contacts')}}'  >

        {{ csrf_field()}}
        <p class = "text-center" style="font-size: 25px;">Страница на Потребителите</p>


    <table class="table table-hover text-center float-center">


            <thead >

            <tr>

                <th scope="col">Снимка</th>

                <th scope="col">U#</th>
                <th scope="col">Име</th>
                <th scope="col">Псевдоним</th>
                <th scope="col">Имейл</th>
                <th scope="col">Телефон</th>
                <th scope="col">Статус</th>
                <th scope="col"></th>



            </tr>
          </thead>

        @foreach($user as $v)

            <tbody >

            <tr >

                <td >


                    @if(isset($v->card->image))
                        <img  src="{{asset('storage/'.$v->card->image)}}" class="img-fluid  shadow  border border-warning"
                              alt="" style = "border-radius: 10% ;height: 60px;width: 60px;">

                    @elseif($v->sex == 0)
                        <img src="{{asset('storage/avatars/female.jpeg')}} "  class="img-fluid shadow border border-warning"
                             alt="" style = "border-radius: 10% ;height: 60px;width: 60px;" >
                    @elseif($v->sex == 1)
                        <img src="{{asset('storage/avatars/male.jpeg')}} "  class="img-fluid shadow border border-warning"
                             alt="" style = "border-radius: 10% ;height: 60px;width: 60px;" >
                    @endif


                <td class = "align-middle">{{$v ->id}}</td>
                <td class = "align-middle">{{$v ->first_last_name}} <br><label class="badge badge-danger align-middle">Кандидат член</label></td>
                <td class = "align-middle">{{$v ->username}}</td>
                <td class = "align-middle"> <a href = "#">{{$v ->Email}} </a></td>
               <td class = "align-middle" >{{$v->phone['phone']}}</td>
                <td class=" align-middle "><span class="badge badge-primary align-center">в чакалнята</span></td>
                <td class = "align-middle" style="width: 20%;">
                    <a href="#" type="button"  data-toggle="modal" data-target="#exampleModal" >
                                            <span class="fa-stack ">
                                                <i class="fa fa-square fa-stack-2x">

                                                </i>
                                                <i class="fa fa-search-plus fa-stack-1x fa-inverse">


                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                        <div class="modal-dialog" role="document">

                                                            <div class="modal-content">

                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>

                                                                </div>
                                                                <div class="modal-body">

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </i>
                                            </span>
                    </a>
                    <a href="#" type="button"  class="table-link">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                    </a>
                    <a href="#" class="table-link">
                                            <span class="fa-stack ">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                            </span>
                    </a>
                </td>




            </tr>

        </tbody>
            @endforeach
        </table>

    </form>
@endsection



@section('name')

    {{ $username }}
    @if(isset($profileImage->card->image) )
        <img src="{{asset('storage/'.$card->card->image)}}" class="img-fluid border border-warning"
             alt="" height="20" width="20">
    @elseif($card->sex == 0)
        <img src="{{asset('storage/avatars/female.jpeg')}} "  class="img-fluid border border-warning"
             alt="" height="20" width="20" >
    @elseif($card->sex == 1)
        <img src="{{asset('storage/avatars/male.jpeg')}} "  class="img-fluid border border-warning"
             alt="" height="20" width="20" >
    @endif

@endsection


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


<head>



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">


</head>

<style>
    .thumbnail:hover {
        text-decoration: underline;


    }



</style>

<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('frontview.layouts.userView')
@extends('frontview.layouts.default')






<link href="{{(asset(('css/misc.css')))}}">

<script src ="{{mix('js/app.js')}}" defer></script>
<link href="{{mix('css/app.css')}}" rel="stylesheet">

@section('title')
    Misc
@endsection




@section('content')


    <div class = "text-center" style="font-size: 25px;">Страница с Предложения</div>

    <p>

    {{--create Post--}}
    <form  method="get" id ="create" action="posts/create">
        @csrf
        <input name="create" type="hidden" value="create"/>
        <button class = "btn btn-outline-success" form = "create" type="submit"><small>Ново предложение</small></button>
    </form>


    <div class="row container">
        <div class="col">


            @if(session()->has('deleted'))
                <div class="alert alert-success" role="alert">
                Изтритхе коментар!
            </div>
             @endif

                @if(session()->has('post_deleted'))
                    <div class="alert alert-success" role="alert">
                        Изтрихте предложение!!
                    </div>
                @endif



            @if(session()->has('added'))
                <div class="alert alert-success" role="alert">
                    Добавихте коментар!!
                </div>
               @endif
            @if(session()->has('wrong_user'))
                <div class="alert alert-danger" role="alert">
                    Не можете да триете чужд коментар
                </div>
                @endif

            @if(session()->has('post_edit_error'))
                <div class="alert alert-danger" role="alert">
                    Това е чужд пост!
                    </div>
                @endif


            @if(session()->has('success'))

                <div class="alert alert-success" role="alert">
                    Създадохте нова тема
                </div>

            @endif

                @if(session()->has('renew'))

                    <div class="alert alert-success" role="alert">
                        Обновихте тема!
                    </div>

                @endif


                <script>

                    $(document).ready(function () {

                        window.setTimeout(function() {
                            $(".alert-alert").fadeTo(1000, 0).slideUp(1000, function(){
                                $(this).remove();
                            });
                        }, 2000);

                    });




                $(document).ready(function () {

                    window.setTimeout(function() {
                        $(".alert-success").fadeTo(1000, 0).slideUp(1000, function(){
                            $(this).remove();
                        });
                    }, 2000);

                });

                $(document).ready(function () {

                    window.setTimeout(function() {
                        $(".alert-warning").fadeTo(1000, 0).slideUp(1000, function(){
                            $(this).remove();
                        });
                    }, 2000);

                });

                $(document).ready(function () {

                    window.setTimeout(function() {
                        $(".alert-danger").fadeTo(1000, 0).slideUp(1000, function(){
                            $(this).remove();
                        });
                    }, 2000);

                });



                $(function () {
                    var div = $('#showOrHideDiv');
                    $('#action').click(function () {
                        div.fadeToggle(800);
                    });
                });





                </script>






            @foreach($posts as $v)
                    @if(is_null($v->title) )
                    <div>No posts yet</div>




                            @else



                        <div class="container ">

                            <label >
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <img src="https://dummyimage.com/20x20/a8a1a8/0f0f12" class="rounded-circle" width="20px">
                                        <span>От</span> <span class="text-info">{{ $v->user->first_last_name }}</span>
                                    </li>
                                    <li class="list-inline-item ">

                                        <i class="fa fa-calendar" style = "color:green" aria-hidden="true"></i> <span> {{ \Carbon\Carbon::parse($v->created_at)->format('d.m.Y T H:i:s')}}</span>
                                        <label style="display: none" >{{ $diffInSec = \Carbon\Carbon::parse(\Carbon\Carbon::now())->diffInSeconds($v->created_for)}} {{$inSec = gmdate('H:i:s', $diffInSec)}}</label>

                                        <i class="fa fa-clock " style = "color:darkred"  aria-hidden="true"></i> <span> {{ \Carbon\Carbon::parse($v->created_for)->format('d.m.Y T H:i:s')}} </span>



                                    </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-comment" aria-hidden="true"></i> <span class="text-info">{{$v->comments->count()}}</span>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i> <span class="text-info">0 Shares</span>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                        <span>Tags:</span>
                                        <span class="badge badge-dark float-bottom">{{$v->subject}}</span>
                                        <span class="badge badge-dark">{{$v->title}}</span>
                                        <span class="badge badge-dark">{{$username}}</span>
                                        <span class="badge badge-dark">css</span>
                                    </li>
                                </ul>
                            </label>
                        </div>




                    <div class=" main-section card  ">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">

                                    <div class="row">

                                        <div class="col-lg-2 col-md-2 col-5">
                                            <div class = "card shadow" >
                                                @if(isset($v->user->card->image))
                                                <img src="{{asset('storage/'.$v->user->card->image)}} "  class="img-fluid  border border-warning" alt="" height="150" width="150" >

                                            @elseif($v->user->sex == 1)
                                                <img src="{{asset('storage/avatars/male.jpeg')}} "  class="img-fluid border  border border-warning"
                                                     alt="" height="150" width="150" >

                                            @elseif($v->user->sex == 0)
                                                <img src="{{asset('storage/avatars/female.jpeg')}} "  class="img-fluid border  border border-warning"
                                                     alt="" height="150" width="150" >

                                            @else

                                            @endif
                                                <div class = "text-center" style="color: grey">
                                                    <small> @include("frontview.styles.rating")</small>

                                                </div>

                                            </div>

                                            <br>


                                                <div class="text-md-center  ">
                                                    @if( $v->user->posts->count() <= 3 )
                                                        <small class = " text-center"> "Новобранец "
                                                        <i class='fas fa-medal ' style='font-size:20px;color:greenyellow'></i>
                                                        </small>


                                                    @elseif($v->user->posts->count() >= 4 && $v->user->comments->count() <= 7 )
                                                        <small class = " text-center"> "Член "
                                                                    <i class='fas fa-medal ' style='font-size:20px;color:greenyellow'></i>
                                                                    <i class='fas fa-medal text-center' style='font-size:25px;color:darkred'></i>
                                                                </small>
                                                                    @elseif($v->user->posts->count() >= 7 && $v->user->comments->count() <= 10 )
                                                                        <small class = " text-center"> "Борец "

                                                                            <i class='fas fa-medal ' style='font-size:20px;color:greenyellow'></i>
                                                                            <i class='fas fa-medal text-center' style='font-size:25px;color:darkred'></i>
                                                                            <i class='fas fa-medal text-center' style='font-size:30px;color:gold'></i>
                                                                    @endif
                                                                    @if($v->user->posts->count() >= 11 && $v->user->comments->count() >= 20 )
                                                                            @else
                                                                            @endif
                                                                </small>
                                                        <br>
                                                        <small class ="font-italic"> Брой коментари: {{$v->user->comments->count()}} </small>
                                                    <br>
                                                    <small class ="font-italic"> Брой предложения: {{$v->user->posts->count()}} </small>

                                                </div>
                                        </div>


                                    {{-- starts of counter logic// accepted and declined proposals--}}
                                        <div class="col-lg-10  col-9 card-body ">


                                            {{--counter--}}
                                            <p class = "float-right">
                                                <label class="invisible"> {{  $diff = Carbon\Carbon::parse(($v->created_at))->diffInDays($v->created_for)}}</label>
                                                    @if( Carbon\Carbon::parse($v->created_for ) >= \Carbon\Carbon::parse(Carbon\Carbon::now())   )

                                                <div class = "float-right"><span>Гласуването изтича след:</span>
                                                    <div class="row justify-content-center border rounded-pill text-danger" >  ({{$diff}}) <span> дни  </span>/  {{$inSec}} </div>

                                                </div>


                                            @else
                                                <div class = "float-right"><span>Край на гласуването</span>
                                                    <div class="row justify-content-center border rounded-pill text-danger"  >

                                                        @if($v->likes_count > $v->dislikes_count  )
                                                            <span> Прието</span>
                                                        @else
                                                            <span>Отхвърлено</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif




                                            {{-- End of counter logic// accepted declined logic--}}



                                            <label>По Тема:  </label>

                                            <span class = "font-italic font-weight-normal ">"{{ $v->subject }}"
                                                <h5 class="text-primary"><label > Заглaвие:</label> {{ $v->title }}</h5>
                                                <p class = "font-italic text-left card-body" >

                                                         <li class="media ">
                                                             <a  class="pull-right">

                                                                 @if(isset($v->body['img']))

                                                                 @endif
                                                             </a>
                                                    </li>



                                                    {!!html_entity_decode($v->body)!!}





                                                    <span class="float-right">  </span>

                                                </p>
                                                </span>
                                           <div class="container">
                                                    @yield('counter')


{{--Start View results accoirdeon with signature--}}


                                                        @if( Carbon\Carbon::parse($v->created_for ) < \Carbon\Carbon::parse(\Carbon\Carbon::now()) )

                                                            <!-- Accordion card -->
                                                            <div class="card border">

                                                                <!-- Card header -->
                                                                <a id="action" href="#"><div class = "text-center p-1 mb-0 " style="background:whitesmoke" > Резултати </div></a>
                                                                <div id="showOrHideDiv" style="display: none;">

                                                                            <label class="row justify-content-center mt-3 mb-3  font-weight-light">
                                                                                <h6 >Брой Гласували: {{$v->votes->count()}}</h6></label>




                                                                            <div class="container col-10 flex ">

                                                                                <table class="table table-bordered col-14 text-center " style= "font-size: small">
                                                                                    <thead >
                                                                                    <tr>
                                                                                        <th scope="row">Предложение # {{$v->id}}</th>
                                                                                        <td colspan="2">Тема " <span> {{$v->subject}}"  </span></td>
                                                                                        <td>
                                                                                            <a class="btn btn-danger btn-sm" href="{{ route('report.export-pdf',['post_id' => $v->id]) }}">.pdf</a> </a>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th  >Име и Фамилия</th>

                                                                                        <th>Гласувал</th>
                                                                                        <th>Подпис</th>

                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>


                                                                                    <tr>
                                                                                        @foreach($v->likes as $for)

                                                                                            <td>{{$for->user->first_last_name}}</td>
                                                                                            <td >@if ($v->likes_count )
                                                                                                    <label class ="p-2 mb-3 p-0 bg-success text-white text-center " style = "border-radius: 25px">ЗА</label>
                                                                                                @endif
                                                                                            </td>
                                                                                            <td>

                                                                                                @if($v->likes_count > $v->dislikes_count )
                                                                                                    @if($for->user_id == $user->id && $for->docusign == null )
                                                                                                        <form  action="{{ route('signature.upload',['post_id'=> $v->id])}}" method="post">
                                                                                                            @csrf
                                                                                                            @include("frontview.signature.signature-pad")
                                                                                                        <br>
                                                                                                    </form>
                                                                                                    @elseif($for->docusign )
                                                                                                        @php $picture = url('storage/e-signatures/'.$for->docusign); @endphp
                                                                                                        <img src="{{ $picture }}" class="pic_preview" width="auto" height="auto">
                                                                                                    @else

                                                                                                        @endif

                                                                                                @else
                                                                                                @endif
                                                                                            </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        @foreach($v->dislikes as $protiv)

                                                                                            <td>{{$protiv->user->first_last_name}}</td>
                                                                                            <td >
                                                                                                @if ($v->dislikes_count )
                                                                                                    <label class = "p-2 mb-3 bg-danger text-white text-center" style = "border-radius: 15px;" >Против</label>
                                                                                                @endif
                                                                                                @endforeach
                                                                                            </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                    @endforeach
                                                                                </table>


                                                                            </div>



                                                                </div>
                                                                </div>


                                                                {{--END View results accoirdeon with signatures--}}


                                                                    </div>


                                                                </div>

                                                                <!-- Card body -->

                                                                <div >
                                             @else

                                                 <hr>

                                            {{-- hands up and down with votes count--}}
                                            <div class="container col-10 flex" >
                                                    <div class="row justify-content-md-center">
                                                        <form method = "POST" action="votes/{{$v->id}}/like" >
                                                            @csrf
                                                            <div class="col col-md-1 ">
                                                                <button type="submit" class="btn btn-outline-success">
                                                                    <i class="fa fa-thumbs-up" aria-hidden="true"></i> <span class="badge badge-light">{{$v->likes_count  }} </span>
                                                            </button>
                                                        </div>
                                                        </form>

                                                        <div class="col col-md-1 align-items-lg-center">
                                                            <form method = "POST" action="votes/{{$v->id}}/dislike" >
                                                                @csrf
                                                                <button  type = "submit" class="btn btn-outline-danger" >
                                                                    <i class="fa fa-thumbs-down" aria-hidden="true"><label > </label></i> <span class="badge badge-light">{{$v->dislikes_count}}</span>
                                                                </button>
                                                            </form>
                                                        </div>

                                                {{-- End hands up and down with votes count--}}



                                                {{-- Button delete shows whenever likes are less than dislikes --}}


                                                @if($v->user_id == $user->id && $v->likes_count < $v->dislikes_count)

                                                    <div class = " container ">
                                                        <div class = "text-right">
                                                         <button class="btn " form = "formUpdate" type="submit" ><small class = "thumbnail" style = "color:grey"> Edit </small></button>
                                                    <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal"><small class = "thumbnail" style = "color:red" >Delete</small></button>
                                                        </div>
                                                    </div>


                                                @endif

                                                    </div>
                                            </div>

                                                    {{-- End Button delete shows whenever likes are less than dislikes --}}


                                        </div>

                                        @endif
                                    </div>



                                    </div>

                                </div>
                            </div>
                        </div>




                            {{--Post update--}}
                            <form  method="GET"  id="formUpdate" action="{{route('post.edit')}}">
                                @csrf
                                <input name="post_id" type="hidden" value="{{ $v->id }}" />

                            </form>

        {{-- MOdal with validation for POST DELETE--}}

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title text-md-center" id="exampleModalLabel">
                            <p class="text-primary text-center " >Изтриване  на предложение № {{$v->id}}</p></h6>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-dark">
                        <p class ="text-danger text-center">  Сигурен ли сте?</p>
                        <br><br>
                        <small>  След изтриване на предложението Ви, ще премахнете  коментарите и гласуванията свързани с него.</small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">НЕ!</button>
                        <button  form = "formDelete" type="submit" class="btn btn-outline-success" >ДА,ще го изтрия!</button>
                        <form  method="GET"  id="formDelete" action="{{route('post.delete')}}">
                            @csrf
                            <input name="post_id" type="hidden" value="{{ $v->id }}" />

                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- End MOdal with validation for POST DELETE--}}

        {{--Pagination--}}

                        <p class="font-weight-light ">
                        <div class="row">
                                <div class="col-5 text-center">
                                    {{$posts->links()}}
                                </div>
                                </div>

        {{--End Pagination--}}


                            {{--Comments--}}

                        {{-- ADD COMMENTS FORM--}}
        <form  action="{{ route('comments.add') }}" method="post">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $v->id }}" />
                            @include('posts.comments')


                            {{--<p class = "text-sm-left font-light"> <textarea class="form-control"  name="comment" placeholder="Коментирай...."></textarea></p>--}}

            <br>
            <button  class = "btn btn-outline-success "type="submit" ><small>Коментирай</small></button>
        </form>






            <hr>

        <p  class = "text-success text-center"> Коментари</p>
                            <div class="row bootstrap snippets  " >
                                <div class="col-md-1 col-md-offset-1 col-md-12">
                                    <div class="comment-wrapper">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">



                            @foreach($v->comments as $comment)
                                                    <ul class="media-list card align-middle">
                                                        <br>
                                                    {{--<small class="font-italic col-2 ">{{$comment->user->username}}</small>--}}
                                                    <li class="media ">
                                                        <a  class="pull-right">
                                                            @if(isset($comment->user->card->image))
                                                                <img src="{{asset('storage/'.$comment->user->card->image)}} "  class="img-fluid shadow border border-warning"
                                                                     style = "border-radius: 60%;height: 60px;width: 60px;">
                                                            @elseif($comment->user->sex == 1)
                                                                <img src="{{asset('storage/avatars/male.jpeg')}} "
                                                                      class="img-fluid shadow border border-warning" style = "border-radius: 60%;height: 60px;width: 60px;" >
                                                            @elseif($comment->user->sex == 0)
                                                                <img src="{{asset('storage/avatars/female.jpeg')}} "
                                                                     class="img-fluid shadow border border-warning" style = "border-radius: 60%;height: 60px;width: 60px;" >
                                                            @else
                                                            @endif
                                                        </a>


                                                        <div class="media-body">
                                                            <br>
                                                            <strong class="text-success ">@ {{$comment->user->first_last_name}}</strong>
                                                            <br>

                                                                <small class="text-muted">На: {{$comment->created_at->isoFormat('D/M/YY HH:mm')}} </small>
                                                                <br>
                                                                <small class="text-muted"> Публикува коментар № {{$comment->id}}</small>

                                                            <p class = "font-italic text-left card-body" >{!!html_entity_decode($comment->content)!!}</p>

                                        <span class="text-muted pull-right p-8">
                                    <label class="container">
                                        <form action="{{route('comments.delete', $comment->id)}}" value ="comment_id" method="post">
                                            @csrf
                                            @if($comment->user_id == $user->id)
                                                <button class=" btn float-right" type="submit" ><small class = "thumbnail"> Delete</small></button>
                                            @endif

                                        </form>
                                    </label>
                                </span>



                                                            <div class="p-3">
                                                                <hr >
                                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tags-fill " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M3 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 7.586 1H3zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                                <path d="M1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                                                            </svg>

                                                            <span >Tags:</span>
                                                  <span class="badge badge-dark float-bottom">{{$v->subject}}</span>

                                                        </div>

                                                            <div >
                                                                {{--<small>  @include("frontview.styles.stars_rating")</small>--}}
                                                                </div>

                                                        </div>
                                                     </li>


                                                    </ul>




                            @endforeach


                                                 </div>

                            {{--end comments add--}}

                                        </div>
                                    </div>
                                </div>
                            </div>


                        @endif
@endforeach

    </div>




@endsection






        @section('name')
            {{ $username }}
            @if(isset($profileImage->card->image))
                <img src="{{asset('storage/'.$profileImage->card->image)}} "  class="img-fluid border border-warning" alt="" height="20" width="20" >
            @elseif($user->sex == 1)
                <img src="{{asset('storage/avatars/male.jpeg')}} "  class="img-fluid border border-warning "
                     alt="" height="20" width="20" >
            @elseif($user->sex == 0)
                <img src="{{asset('storage/avatars/female.jpeg')}} "  class="img-fluid border border-warning  "
                     alt="" height="20" width="20" >

            @else

            @endif
        @endsection



        {{----}}


        <script src='https://kit.fontawesome.com/a076d05399.js'></script>


<script>

    $(document).ready(function(){
        $("img").addClass("img-responsive");
        $("img").css("max-width", "100%");
    });




</script>






        {{--избор качване на файл--}}
{{--<div class="form-group">--}}
    {{--<label for="exampleFormControlFile1">Example file input</label>--}}
    {{--<input type="file" class="form-control-file" id="exampleFormControlFile1">--}}
{{--</div>--}}
        {{--<script src = "http://unpkg.com/turbolinks"></script>--}}
</div>



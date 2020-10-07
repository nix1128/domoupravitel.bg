@extends('frontview.layouts.userView')
@extends('frontview.layouts.default')


@section('content')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <head>


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body>



    </body>

    @if($errors->first('data'))
        <div class="alert alert-danger" role="alert">
         Изберете дата след {{\Carbon\Carbon::parse(\Carbon\Carbon::now())->format('d.m.Y ')}}
        </div>

    @endif



    <script >

        $(document).ready(function () {

            window.setTimeout(function() {
                $(".alert-danger").fadeTo(3000, 0).slideUp(1000, function(){
                    $(this).remove();
                });
            }, 2000);

        });







</script>


<div class="container">

    <div class="row">

        <div class="col-md-12">

            <h3 class = "text-center">Създай нова тема</h3>
            <br>
            <div class = " d-form-inline ">
            <label class="text-primary" >Тема </label> <span class="require"> *</span> <small> (не се позволява дублиране на теми)</small>
            <label  class="text-primary text-right col-md-3">Дата  </label><span class="require">*</span> <small>(от дата на гласуване)</small>
            </div>

                <form action="/posts/store" method="POST">


                <input class="text-primary"  type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-error">



                    @foreach($post as $v=>$c)


                    @endforeach


                    <div class = "  d-lg-inline-flex  justify-content-md-right">


                        <input type="text" class="form-control " style="width: 100%"  name="subject" value="{{old('subject')}} @if(empty($c->subject) ) @else{{$c->subject}} @endif"  />

                        <div class = "container col-lg-1">
                                {{--<input type="date"  name="data">--}}


                                <input  type = "datetime" id="datepicker" width="290" name = "data" data-format="dd-mm-yyyy" value="{{old('data')}} @if(empty($c->data) ) @else{{$c->data}} @endif"/>
                                <script>

                                    $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap4',
                                        minDate:new Date()

                                    });


                                </script>
                            </div>



                </div>
                    @if($errors->first('subject'))
                        <div>Полето е задължително
                            <label class="text-success"><svg class="bi bi-emoji-smile" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path fill-rule="evenodd" d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683z"/>
                                <path d="M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/></label>
                            </svg>
                        </div>


                        @endif

                </div>





                    <label for="title"><label class="text-primary">Заглавие</label> <span class="require">*</span></label>
                    <input type="text" class="form-control" name="title"  value="{{old('title')}} @if(empty($c->title)) @else{{$c->title}} @endif">
                    @if($errors->first('title'))
                        <div>Ами заглавие? <label class="text-warning"><svg class="bi bi-emoji-neutral" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path fill-rule="evenodd" d="M4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
                                    <path d="M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                                </svg></label></div>
                        @endif



                    <label for="description"  class = "text-primary">Описание</label>


                    @include('posts.suggestions')

                    {{--<textarea rows="5" class="form-control "  style="width: 100%" name="body" value = "{{old('body')}}"> @if(empty($c->body)) @else {{$c->body}} @endif</textarea>--}}
                    {{--<form  action="{{ route('post.create') }}" method="post">--}}


                        {{--@include('posts.comments')--}}
                        {{--<p class = "text-sm-left font-light"> <textarea class="form-control"  name="comment" placeholder="Коментирай...."></textarea></p>--}}

                        {{--<br>--}}
                        {{--<button  class = "btn btn-outline-success "type="submit" ><small>Коментирай</small></button>--}}

                    {{--</form>--}}


                    @if($errors->first('body'))
                        <div>Забравихте и описание <label class="text-danger"><svg class="bi bi-emoji-frown" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path fill-rule="evenodd" d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683z"/>
                                    <path d="M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
                                </svg></label>
                            </div>
                    @endif



                    <p><span class="require text-danger">*</span> - задължителни полета</p>


                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">
                        <a> Създай</a></button>
                    <button class="btn btn-default">
                        <a href="{{ route('posts') }}">Назад  </a>
                    </button>

                </div>

            </form>




        </div>

    </div>
</div>




@endsection

@section('name')
    {{ $name }}
    @if(isset($profileImage->card->image))
        <img src="{{asset('storage/'.$profileImage->card->image)}} "  class="img-fluid" alt="" height="20" width="20" >
    @elseif($user->sex == 1)
        <img src="{{asset('storage/avatars/male.jpeg')}} "  class="img-fluid"
             alt="" height="20" width="20" >
    @elseif($user->sex == 0)
        <img src="{{asset('storage/avatars/female.jpeg')}} "  class="img-fluid"
             alt="" height="20" width="20" >

    @else

    @endif
@endsection


<script>


</script>


@extends('frontview.layouts.welcome')


@section('welcome')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center text-dark mb-1">Промяна на парола</div>

                    <div class="card-body ">

                        <form method="post" action="{{ route('resetPassword', $token =  csrf_token() )  }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" size="40" name="email" value="{{ request('email') }}">


                            <div class=" align-content-center  form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class=" col-md-4 control-label">Нова Парола</label>

                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-8 control-label ">Повторете Паролата</label>
                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control " name="password_confirmation" required>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">
                                       Изпрати
                                    </button>



                                    <div>
                                        @if(session('message'))
                                            <div class = " text mt-2 text-xs text-center">{{session('message')}}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
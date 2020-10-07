@extends('frontview.layouts.welcome')


@section('welcome')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-dark mb-1">Забравена Парола</div>

                    <div class="card-body">

                        <form method="post" action="/passReset" name ='email'>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-primary">
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


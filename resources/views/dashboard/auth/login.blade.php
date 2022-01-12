@extends('dashboard.auth.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="auth">
                <div class="login">
                    <div class="auth-container">
                        <div class="auth-wrap">
                            <h2 class="title text-center">{{ __('Laravel E-Commerce ') }}</h2>
                            <span class="form-title text-center">{{ __('Login') }}</span>

                            <form class="auth-form" method="POST" action="{{ dashboard_route('login') }}">
                                @csrf
                                @if(session()->has('status'))
                                    {{session()->get('status')}}
                                @endif
                                <div class="form-group ">
                                    <input class="form-control @error('email') is-invalid @enderror " type="text" name="email"
                                           placeholder="Email or Username" value="{{old('email')}}" autofocus/>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                                    @enderror
                                </div>
                                <div class="form-group @error('password') is-invalid @enderror ">
                                    <input class="form-control " type="password" name="password" placeholder="Password" autocomplete="new-password"/>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                                    @enderror
                                </div>
                                <div class="form-group ">
                                    <button class="btn btn-default form-control login-submit" type="submit">
                                        <i class="fa fa-sign-out-alt  fa-fw "></i>
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </form>
                            <div class="auth-action">
                                @if (Route::has(env('APP_DASHBOARD_ROUTE_NAME').'password.request'))
                                    <a class="" href="{{ dashboard_route('password.request') }}">
                                        {{ __('Forget Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

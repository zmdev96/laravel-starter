

@extends('dashboard.auth.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="auth">
                <div class="login">
                    <div class="auth-container">
                        <div class="auth-wrap">
                            <h2 class="title text-center">{{ __('Laravel E-Commerce ') }}</h2>
                            <span class="form-title text-center">{{ __('Forget Password') }}</span>

                            <form class="auth-form" method="POST" action="{{ dashboard_route('password.email') }}">
                                @csrf
                                @if(session()->has('status'))
                                    <div class="alert alert-success text-center ">{{session()->get('status')}}</div>
                                @endif
                                <div class="form-group ">
                                    <input class="form-control @error('email') is-invalid @enderror " type="email" name="email"
                                           placeholder="E-Mail Address" value="{{old('email')}}" autofocus/>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                                    @enderror
                                </div>

                                <div class="form-group ">
                                    <button class="btn btn-default form-control login-submit" type="submit">
                                        <i class="fa fa-paper-plane  fa-fw "></i>
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


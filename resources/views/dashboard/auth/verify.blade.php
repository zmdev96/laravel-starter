


@extends('dashboard.auth.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="auth">
                <div class="login">
                    <div class="auth-container">
                        <div class="auth-wrap">
                            <div class="card">
                                <div class="card-header">{{ __('Vdfsdfsdfsderify Your Employee Email Address') }}</div>

                                <div class="card-body">
                                    @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            {{ __('A fresh verification link has been sent to your email address.') }}
                                        </div>
                                    @endif

                                    {{ __('Before proceeding, please check your email for a verification link.') }}
                                    {{ __('If you did not receive the email') }},
                                    <form class="d-inline" method="POST" action="{{ dashboard_route('verification.send') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

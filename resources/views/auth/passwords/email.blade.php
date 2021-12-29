@extends('layouts.app')
@section('email_css')
    <style type="text/css">
        .send-mail-btn {
            color: deeppink;
            text-decoration: none;
            background-color: #3e3c3c;
            box-shadow: 0 9px #292525;
            font-weight: 600;
        }

        .send-mail-btn:hover,
        .send-mail-btn:focus {
            color: deeppink;
        }

        .send-mail-btn:active {
            background-color: deeppink;
            color: #292525;
            transform: translateY(4px);
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card half-black">
                    <h2 class="card-header header-text">{{ __('Reset Password') }}</h2>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right text-white">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn send-mail-btn">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

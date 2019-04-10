@extends('layouts.auth_app')

@section('content')
    <div class="row" style="height: 100vh">
        <div class="col-md-8 back-img" style="background-image:url({{ asset('images/family.jpg') }}); background-repeat: no-repeat;background-position-y: center;background-position-x: center;background-size: cover;height: 100%;"></div>
        <div class="col-md-4">
            <div class="pY-100">
                <h3 class="text-center">Reset Password</h3>
                <div class="mgt30">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

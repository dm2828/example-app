@extends('layouts.auth-master')

@section('content')
<div class="container mt-5">
    <form method="post" action="{{ route('register.perform') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        <h1 class="h3 mb-3 fw-normal">Register</h1>

        <div class="form-group form-floating mb-3">
        <label for="floatingEmail">Email address</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
        <label for="floatingName">Username</label>
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
        <label for="floatingPassword">Password</label>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <label for="floatingConfirmPassword">Confirm Password</label>
                <input type="password" class="form-control" name="confim_password" value="{{ old('confim_password') }}" placeholder="Confirm Password" required="required">
                @if ($errors->has('confim_password'))
                    <span class="text-danger text-left">{{ $errors->first('confim_password') }}</span>
                @endif
            </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Role</label>
            <select class="form-control" id="role" name="role" value="{{ old('role') }}">
            <option>Select below type</option>
            <option value="0">Admin</option>
            <option value="1">User</option>
            </select>
            @if ($errors->has('role'))
                <span class="text-danger text-left">{{ $errors->first('role') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        
        @include('auth.partials.copy')
    </form>
</div>
@endsection
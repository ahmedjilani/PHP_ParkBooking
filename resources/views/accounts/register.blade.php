@extends('accounts.layout')
@section('title', 'Register a new account')
@section('content')
<h4 class="mb-2">Adventure starts here 🚀</h4>
<p class="mb-4">Make your booking easy and fun!</p>
<form id="formAuthentication" class="mb-3" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" :value="old('name')" placeholder="Enter your Name"
            autofocus />
        @if($errors->has('name'))
        <span class="error-message">{{$errors->first('name')}}</span>
        @endif
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus />
        @if($errors->has('email'))
        <span class="error-message">{{$errors->first('email')}}</span>
        @endif
    </div>
    <div class="mb-3 form-password-toggle">
        <label class="form-label" for="password">Password</label>
        <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control" name="password" placeholder="Enter password"
                :value="old('password')" aria-describedby="password" />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        </div>
        @if($errors->has('password'))
        <span class="error-message">{{$errors->first('password')}}</span>
        @endif
    </div>
    <div class="mb-3 form-password-toggle">
        <label class="form-label" for="re-password">Re-Password</label>
        <div class="input-group input-group-merge">
            <input type="password" id="re-password" class="form-control" name="password_confirmation"
                placeholder="Confirm password" aria-describedby="re-password" />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>

        </div>
    </div>
    <button class="btn btn-primary d-grid w-100">Sign up</button>
</form>

<p class="text-center">
    <span>Already have an account?</span>
    <a href="{{route('login')}}">
        <span>Sign in instead</span>
    </a>
</p>
@endsection
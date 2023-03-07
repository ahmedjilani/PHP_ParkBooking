@extends('accounts.layout')
@section('title', 'Login')
@section('content')
<h4 class="mb-2">Welcome! 👋</h4>
<p class="mb-4">Please sign-in to your account and start the booking.</p>
<form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
        <label for="username" class="form-label">Email</label>
        <input id="email" class="form-control" type="email" name="email" :value="old('email')" />
        @if($errors->has('email'))
        <span class="error-message">{{$errors->first('email')}}</span>
        @endif
    </div>
    <div class="mb-3 form-password-toggle">
        <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Password</label>
        </div>
        <div class="input-group input-group-merge">
            <input id="password" type="password" name="password" class="form-control" name="password"
                aria-describedby="password" />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        </div>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
    </div>
</form>

<p class="text-center">
    <span>New on our platform?</span>
    <a href="{{route('register')}}">
        <span>Create an account</span>
    </a>
</p>
@endsection
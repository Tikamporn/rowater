@extends('layouts.app')

@section('content')
<div class="w-3container">
    <br><br>
</div>
<div class="w3-row">
    <div class="w3-col s4 w3-center">
    <p></p>
    </div>
    <div class="w3-col s4 w3-white w3-animate-opacity">
    <div action="form.asp" class="w3-card-4">
        <div class="w3-container w3-teal">
            <h2>Register</h2>
        </div>
        <form class="w3-container" role="form" method="POST" action="{{ url('/register') }}">
            {!! csrf_field() !!}
            <p>
            <label class="w3-label w3-text-teal"><b>Name</b></label>
            <input type="text" class="w3-input w3-border w3-white" name="name" value="{{ old('name') }}">
            @if ($errors->has('name'))
                <span class="w3-text-blue">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            <p>
            <label class="w3-label w3-text-teal"><b>E-mail</b></label>
            <input type="email" class="w3-input w3-border w3-white" name="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="w3-text-blue">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <p>
            <label class="w3-label w3-text-teal"><b>Password</b></label>
            <input type="password" class="w3-input w3-border w3-white" name="password">
            @if ($errors->has('password'))
                <span class="w3-text-blue">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <p>
            <label class="w3-label w3-text-teal"><b>Confirm Password</b></label>
            <input type="password" class="w3-input w3-border w3-white" name="password_confirmation">
            @if ($errors->has('password_confirmation'))
                <span class="w3-blue">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
            <p>
            <button class="w3-btn w3-teal">Register</button></p>
        </form>
    </div>
    </div>
    <div class="w3-col s4 w3-center">
    <p></p>
    </div>
</div>
@endsection

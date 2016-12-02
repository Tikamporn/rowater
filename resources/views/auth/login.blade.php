@extends('layouts.app')

@section('content')
<div class="w-3container">
    <br><br>
</div>
<div class="w3-row">
    <div class="w3-col m4"><p></p></div>
    <div class="w3-col m4" >
        <div class="w3-border w3-border-brown w3-round-xlarge">
            <h1 align="center">RO Water</h1>
            <form class="w3-container" role="form" method="POST" action="{{ url('/login') }}">
                <table class="w3-table w3-centered">
                    <tr>
                        <td style="text-align:right;">username :</td>
                        <td style="text-align:left;">
                            <input type="email" class="w3-input w3-border w3-white" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="w3-text-blue">
                                <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </td>       
                    </tr>
                    <tr>
                        <td style="text-align:right;">password :</td>
                        <td style="text-align:left;">
                            <input type="password" class="w3-input w3-border w3-white" name="password">
                            @if ($errors->has('password'))
                                <span class="w3-text-blue">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align:left;">
                            <input type="checkbox" name="remember"> Remember Me</p>
                            <!-- <button class="w3-btn w3-round w3-blue" name="register" >register</button> -->
                            <button class="w3-btn w3-round  w3-green" name="login">log in</button>
                        </td>   
                    </tr>
                </table>
            </form>
            <br>
        </div>
    </div>  
    <div class="w3-col m4"><p></p></div>        

</div>
@endsection

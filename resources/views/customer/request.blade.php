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
            <form class="w3-container" role="form" method="POST" action="{{ url('/customer/requestAction') }}" onsubmit="return confirm('Do you really want to submit the form?');">
                <table class="w3-table w3-centered">
                    <tr>
                        <td style="text-align:right;">PIN :</td>
                        <td style="text-align:left;">
                            <input type="number" class="w3-input w3-border w3-white" name="pin" value="{{ old('pin') }}">
                            @if($data)
                                <span class="w3-text-blue">
                                <strong>{{ $data }}</strong>
                                </span>
                            @endif
                        </td>       
                    </tr>
                    <tr>
                        <td style="text-align:right;">Product :</td>
                        <td style="text-align:left;">
                            <select class="w3-select w3-border" id="product_id" name="product_id" required>
                                @foreach ($product as $s)
                                <option value="{{$s->id}}">{{$s->name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:right;">Amount :</td>
                        <td style="text-align:left;">
                            <input type="number" class="w3-input w3-border w3-white" id="amount" name="amount" placeholder="100,200,300" required>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align:left;">
                            <button class="w3-btn w3-round  w3-blue" name="login">Request</button>
                        </td>   
                    </tr>
                </table>
            </form>
            <br>
        </div>
        @if($result)
        <div class="w3-panel w3-green w3-round">
            <span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
            <h3>Success!</h3>
            <p>ทำการร้องขอสำเร็จ</p>
        </div>
        @endif
    </div>  
    <div class="w3-col m4"><p></p>
    </div>        

</div>
@endsection

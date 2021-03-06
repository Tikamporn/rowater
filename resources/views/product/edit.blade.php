@extends('layouts.app')
@section('content')
<div class="w3-row">
    <div class="w3-col m4 s4"><p></p></div>
    <div class="w3-col m4 s4 w3-round-xlarge">
        <br><br>
        <h3 class="w3-text-blue">แก้ไขรายการสินค้า</h3>
        <br>
        <form class="w3-container" role="form" method="POST" action="{{ url('/product/storeAction') }}" accept-charset="utf-8" onsubmit="return confirm('Do you really want to submit the form?');">
            <table class="w3-table">
                <tr>
                      <td class="w3-right">ชื่อ :</td>
                      <input type="hidden" name="id" value="{{$product->id}}">
                      <td><input class="w3-border w3-round w3-input w3-left" name="name" type="text" value="{{$product->name}}"></td>
                </tr>
                <tr>
                      <td class="w3-right">ปริมาณ :</td>
                      <td><input class="w3-border w3-round w3-input w3-left" name="amount" type="number" value="{{$product->amount}}"></td>
                </tr>
                <tr>
                      <td class="w3-right">ปริมาณสูงสุด :</td>
                      <td><input class="w3-border w3-round w3-input w3-left" name="amount_max" type="number" value="{{$product->amount_max}}"></td>
                </tr>
                <tr>
                      <td class="w3-right">ขั้นต่ำที่แจ้งเตือน :</td>
                      <td><input class="w3-border w3-round w3-input w3-left" name="amount_alert" type="number" value="{{$product->amount_alert}}"></td>
                </tr>
            </table>    
            <br>
            <button class="w3-btn w3-round w3-green w3-large w3-padding-large w3-left" name="submit">บันทึก</button>
            <a href="{{ URL::previous() }}" class="w3-btn w3-round w3-red w3-large w3-padding-large w3-right" role="button">ย้อนกลับ</a>
        </form>   
    </div>
    <div class="w3-col m4 s4"><p></p></div>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="w-3container">
    <br><br>
</div>
<div class="w3-row">
    <div class="w3-col" style="width:20%"><p></p></div>
    <div class="w3-col" style="width:60%">
        <div class="w3-container">
            <h3 class="w3-center">WELCOME TO RO :: WATER MANAGEMENT</h3>
        </div>
        <div class="w3-content w3-section" style="max-width:60%">
            <img class="mySlides" src="{{url('img/img4.jpg')}}" style="width:100%">
            <img class="mySlides" src="{{url('img/img5.jpg')}}" style="width:100%">
        </div>
    </div>
    <div class="w3-col" style="width:20%"><p></p></div>
</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 5000); // Change image every 2 seconds
}
</script>
@endsection

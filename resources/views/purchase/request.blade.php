@extends('layouts.app')
@section('content')
<div class="w3-container">
	<br><br>
	<div class="w3-row">
	    <div class="w3-col" style="width:20%"><p></p></div>
	    <div class="w3-col" style="width:60%">
	    	@if($error)
	        <div class="w3-panel w3-blue w3-round">
	            <span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
	            <h3>Warning!</h3>
	            <p>ไม่สามารถทำรายการได้ เนื่องจากปริมาณถังน้ำไม่เพียงพอ</p>
	        </div>
	        @endif
	    	<label class="w3-label w3-text-teal">Search:</label>
	    	<input class="w3-input w3-border w3-padding" type="text" placeholder="Search by name" id="myInput" onkeyup="myFunction()"><br>
	    	<table class="w3-table w3-striped w3-bordered w3-card-4 w3-animate-opacity" id="myTable">
	    		<thead>
	    			<tr class="w3-teal">
	    				<th>ID</th>
						<th>Name</th>
						<th>Product</th>
						<th>Amount</th>
						<th>Date</th>
						@if(!Auth::guest())
							<th></th>
						@endif
	    			</tr>
	    		</thead>
	    		<tbody>
	    			<?php $count=1; ?>
	    			@if($request)
						@foreach($request as $index => $d)
							<tr>
								<td>{{$count}}</td>
								<td>{{$d->Customer->name}}</td>
								<td>{{$d->Product->name}}</td>
								<td>{{$d->amount}}</td>
								<td>{{$d->created_at}}</td>
								@if(!Auth::guest())
									<td>
										<a href="{{url('purchase/requestAction')}}/{{$d->id}}" onclick="return confirm('Do you really want to submit the form?');">
											<img src="{{url('/menu/car.png')}}" class="w3-round-small" alt="Norway" style="width:20px">
										</a>
									</td>
								@endif
							</tr>
							<?php $count++; ?>
						@endforeach
					@endif
	    		</tbody>
	    	</table>
	    </div>
	    <div class="w3-col" style="width:20%"><p></p></div>
	</div>
</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
@endsection
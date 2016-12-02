@extends('layouts.app')
@section('content')
<div class="w3-container">
	<br><br>
	<div class="w3-row">
	    <div class="w3-col" style="width:20%"><p></p></div>
	    <div class="w3-col" style="width:60%">
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
	    			</tr>
	    		</thead>
	    		<tbody>
	    			<?php $count=1; ?>
						@foreach($customer as $index => $customers)
							@foreach($customers->Product as $index_2 => $products)
								<tr>
									<td>{{$products->pivot->id}}</td>
									<td>{{$customers->name}}</td>
									<td>{{$products->name}}</td>
									<td>{{$products->pivot->amount}}</td>
									<td>{{$products->pivot->created_at}}</td>
								</tr>
								<?php $count++; ?>
						@endforeach
					@endforeach
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
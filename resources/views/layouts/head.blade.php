	<meta charset="utf-8">
	<title>RO WATER</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{URL::asset('/css/w3.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<script src="{{URL::asset('/js/jquery.js')}}"></script>
	<script src="{{URL::asset('/js/bootstrap.js')}}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDO25vTngmJLfE2Fhv2GjBAfsXihCneBME"></script>

	<!-- <div class=""> -->
<!-- 	<ul class="w3-navbar w3-teal">
	    <li><a href="{{url('/')}}" class="w3-padding-16"><i class="fa fa-home"></i> Home</a></li>
	    @if (!Auth::guest())
	    <li class="w3-dropdown-hover">
	    	<a href="#" class="w3-padding-16"><i class="fa fa-list"></i> Master <i class="fa fa-caret-down"></i></a>
		    <div class="w3-dropdown-content w3-white w3-card-4">
		    	<a href="{{url('customer')}}"><i class="fa fa-user"></i> Customer</a>
		    	<a href="{{url('product')}}"><i class="fa fa-tint"></i> Product</a>
		    	<a href="{{url('team')}}"><i class="fa fa-wrench"></i> Team</a>
		    </div>
	    </li>
	    <li><a href="{{url('#')}}" class="w3-padding-16">Transaction</a></li>
	    <li class="w3-dropdown-hover">
	    	<a href="#" class="w3-padding-16"><i class="fa fa-list-alt"></i> Report <i class="fa fa-caret-down"></i></a>
		    <div class="w3-dropdown-content w3-white w3-card-4">
		    	<a href="{{url('sales')}}"><i class="fa fa-usd"></i> Sales</a>
		    	<a href="{{url('purchase')}}"><i class="fa fa-usd"></i> Purchase</a>
		    	<a href="{{url('delivery')}}"><i class="fa fa-exchange"></i> Delivery</a>
		    </div>
	    </li>
	    @endif
	    @if (Auth::guest())
	    	<li class="w3-right"><a href="{{url('register')}}" class="w3-padding-16"><i class="fa fa-pencil-square-o"></i> Register</a></li>
	    	<li class="w3-right"><a href="{{url('login')}}" class="w3-padding-16"><i class="fa fa-sign-in"></i> Login</a></li>
	    @else
	    	<li class="w3-right w3-dropdown-hover">
	    		<a href="#" class="w3-padding-16"><i class="fa fa-user"></i> {{Auth::user()->name}} <i class="fa fa-caret-down"></i></a>
			    <div class="w3-dropdown-content w3-white w3-card-4">
			    	<a href="{{url('logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
			    </div>
	    	</li>
	    @endif
	</ul> -->
	<!-- </div> -->

	<ul class="w3-navbar w3-light-grey">
	    <li>
	      	<a href="{{url('/')}}"><img src="{{url('/menu/home.png')}}" class="w3-round-small" alt="Norway" style="width:20px"> Home</a>
	    </li>
	    @if(Auth::guest())
	    <li>
	      	<a href="{{url('/customer/request')}}"><img src="{{url('/menu/return.png')}}" class="w3-round-small" alt="Norway" style="width:20px"> Request</a>
	    </li>
	    @endif
	    @if(!Auth::guest())
	    <li class="w3-dropdown-hover">
	    	<a href="#"><img src="{{url('/menu/setting.png')}}" class="w3-round-small" alt="Norway" style="width:20px"> ตั้งค่า <i class="fa fa-caret-down"></i></a>
	    	<div class="w3-dropdown-content w3-white w3-card-4">
	    		<!--  -->
	    	</div>
	    </li>

	    <li  class="w3-dropdown-hover">
	    	<a href="#"><img src="{{url('/menu/list.png')}}" class="w3-round-small" alt="Norway" style="width:20px"> บริหารจัดการ <i class="fa fa-caret-down"></i></a>
	    	<div class="w3-dropdown-content w3-white w3-card-4">
	      		<a href="{{url('customer')}}">บริหารจัดการลูกค้า</a>
	      		<a href="{{url('product')}}">บริหารจัดการถังน้ำ</a>
	      		<a href="{{url('team')}}">บริหารจัดการทีม</a>
	      		<a href="{{url('sales')}}">เพิ่มการซื้อ-ขาย</a>
	    	</div>
	    </li>

	    <li  class="w3-dropdown-hover">
	    	<a><img src="{{url('/menu/book.png')}}" class="w3-round-small" alt="Norway" style="width:20px"> รายงาน <i class="fa fa-caret-down"></i></a>
	    	<div class="w3-dropdown-content w3-white w3-card-4">
	      		<a href="{{url('purchase')}}">รายงานการขาย</a>
	    	</div>
	    </li>
	    
	    <li>
	    	<a href="#"><img src="{{url('/menu/user.png')}}" class="w3-round-small" alt="Norway" style="width:20px"> จัดการผู้ใช้งาน</a>
	    </li>
	    
	    <li>
	    	<a href="#"><img src="{{url('/menu/key.png')}}" class="w3-round-small" alt="Norway" style="width:23px"> เปลี่ยนรหัสผ่าน</a>
	    </li>
	    
	    <li>
	    	<a href="{{url('purchase/request')}}"><img src="{{url('/menu/calendar.png')}}" class="w3-round-small" alt="Norway" style="width:20px"> Task</a>
	    </li>
	    
	    <li>
	    	<a href="{{url('delivery')}}"><img src="{{url('/menu/car.png')}}" class="w3-round-small" alt="Norway" style="width:20px"> Delivery</a>
	    </li>
	    
	    <li>
	    	<a href="#"><img src="{{url('/menu/return.png')}}" class="w3-round-small" alt="Norway" style="width:20px"> รายการขอคืนน้ำ</a>
	    </li>
	    
	    <li class="w3-right">
	    	<a href="{{url('logout')}}"><img src="{{url('/menu/out.png')}}" class="w3-round-small" alt="Norway" style="width:20px"> ออกจากระบบ</a>
	    </li>
	    @else
	    <li class="w3-right">
	    	<a href="{{url('login')}}"><img src="{{url('/menu/out.png')}}" class="w3-round-small" alt="Norway" style="width:20px"> เข้าสู่ระบบ</a>
	    </li>
	    @endif
	</ul>
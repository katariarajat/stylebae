
<header>

 <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Top Navigation Menu -->
<div class="topnav">
  <a href="#" class="active">StyleBae</a>
  <!-- Navigation links (hidden by default) -->
  <div id="myLinks">
    <a href="{{ url('/')}}">Home</a>
	@if(!Auth::user())
    <a href="{{ route('login')}}">Login</a>
	<a href="{{ route('register')}}">Register</a>
	@else
	<a href="{{ route('user.profile')}}">Profile</a>
    <a href="{{ route('user.logout')}}">Logout</a>
	@endif
	<a href="{{ route('salon.registration')}}">Register Salon</a>
    <a href="{{ route('salon.brand')}}">Register Brand</a>
	
	<a href="{{route('contact')}}">Contact</a>
  </div>
  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div> 

<!--///////////////////// Mobile Css//////// -->
<style>
	 /* Style the navigation menu */
.topnav {
  overflow: hidden;
  background-color: #333;
  position: relative;
  display: none;
 
}
@media screen and (max-width: 600px) {
  
  .topnav{
	  display: block;
  }
  .navbar{
	  display: none;
  }
 
}

/* Hide the links inside the navigation menu (except for logo/home) */
.topnav #myLinks {
  display: none;
  z-index: 100;
}

/* Style navigation menu links */
.topnav a {
  color: white;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 16px;
  display: block;

}

/* Style the hamburger menu */
.topnav a.icon {
  background: black;
  display: block;
  position: absolute;
  right: 0;
  top: 0;
}

/* Add a grey background color on mouse-over */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the active link (or home/logo) */
.active {
  background-color: #04AA6D;
  color: white;
} 
</style>
<!--///////////////////// End Mobile Css//////// -->

<!--///////////////////// Mobile Javascript//////// -->
<script>
	/* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
} 
</script>
<!--///////////////////// end Mobile Javascript//////// -->

<!-- ////////////////////////// End mobile NavBar ////////////// -->


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
 	 <a class="navbar-brand" href="{{ url('/')}}"> <img src="{{asset('frontend/img/logosb.png')}}" alt="" height="50" width="50">
	 	 @if(session()->get('language') == 'hindi')
		  शैली बीएई
		 @else
			styleBae
		@endif
	 </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		<li class="nav-item">
			<a href="{{ url('/')}}" class=" nav-link">
				@if(session()->get('language') == 'hindi')
					घर
				@else
					Home
				@endif
			</a>
		</li>
		<li class="nav-item">
			<a href="{{route('contact')}}" class=" nav-link">
				@if(session()->get('language') == 'hindi')
				संपर्क करें
				@else
					Contact
				@endif
			</a>
		</li>
		<!-- @php
				$salon_type = DB::table('sub_categories')->get();
			@endphp

			@foreach($salon_type as $type)
			<li class="btn-group nav-item d-none d-xl-inline-block">
				<a href="#" class=" nav-link">
					@if(session()->get('language') == 'hindi')
						{{$type->subcategory_name_hin}}
					@else
						{{$type->subcategory_name_en}}
					@endif	
			 	 </a>
			</li>
			@endforeach			 -->
     
			<li class=" nav-item ">
				<a href="calendar.html" class=" nav-link ">
					@if(session()->get('language') == 'hindi')
						के बारे में
					@else
						About
					@endif
			    </a>
			</li>
     
      <!-- <li class="nav-item" id="card">
                    <a class="nav-link" href="{{route('mycart')}}">
                    <i class="fa fa-cart-plus fa-2x" aria-hidden="true"></i>
                      <span class="badge badge-light" style="display: inline-block;" id="cartQty"></span>
                    </a>
      </li> -->
    @if(!Auth::user())
      <li class="nav-item" style="position: relative; left: 150px;" >
                    <a class="nav-link" href="{{route('login')}}">
					@if(session()->get('language') == 'hindi')
						लॉग इन करें
					@else
						Login
					@endif
                    </a>
      </li>
      <li class="nav-item" style="position: relative; left: 200px;" >
                    <a class="nav-link" href="{{route('register')}}">
					@if(session()->get('language') == 'hindi')
						रजिस्टर करें
					@else
						Register
					@endif
                    </a>
      </li>
    @endif
      </ul>
	  <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
		<li class="nav-item " id="salon_register" style="margin-right: 5px; background-color: transparent !important;" >
                    <a class="nav-link" href="{{route('salon.brand')}}" style="color: black !important;">
					@if(session()->get('language') == 'hindi')
					ब्रांड
					@else
					Brand
					@endif
                    </a>
      </li>
		<li class="nav-item " id="salon_register" style="background-color: transparent !important;" >
                    <a class="nav-link" href="{{route('salon.registration')}}" style="color: black !important;">
					@if(session()->get('language') == 'hindi')
					सैलून पंजीकरण
					@else
					Salon Registration
					@endif
                    </a>
      </li>
		  @php
				$user = DB::table('users')->get();
		  @endphp
		  @if(Auth::user())
	      <!-- User Account-->
     <li class="dropdown user user-menu" style="padding-right: 2rem;">	
			<a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown" title="User">
				<img src="{{ (!empty(Auth::user()->profile_photo_path))?url('upload/user-images/'.Auth::user()->profile_photo_path):url('upload/no_image.jpg') }}"
				style="border-radius: 50%; width:50px; height:50px;" alt="">
				
			</a>
			<ul class="dropdown-menu animated flipInX">
			  <li class="user-body">
				 <a class="dropdown-item" href="{{ route('user.profile')}}"><i class="ti-user text-muted mr-2"></i> Profile</a>
				 <!-- <a class="dropdown-item" href="{{ route('admin.change.password')}}"><i class="ti-wallet text-muted mr-2"></i> Change Password</a> -->
				 <!-- <a class="dropdown-item" href="#"><i class="ti-settings text-muted mr-2"></i> Settings</a> -->
				 <div class="dropdown-divider"></div>
				 <a class="dropdown-item" href="{{route('user.logout')}}"><i class="ti-lock text-muted mr-2"></i> Logout</a>
			  </li>
			</ul>
      </li>
	  @endif
	  <li class="dropdown user user-menu">	
			<a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown" title="Languages">
				<i class="fas fa-globe fa-2x"></i>
				@if(session()->get('language') == 'hindi')
					भाषा: हिन्दी
				@else		
					Languages
				@endif	
			</a>
			<ul class="dropdown-menu animated flipInX">
			  <li class="user-body">
				  @if(session()->get('language') == 'hindi')
				 <a class="dropdown-item" href="{{ route('english.language')}}"> English</a>
				 @else
				 <a class="dropdown-item" href="{{ route('hindi.language')}}"> हिंदी</a>
				 @endif
			  </li>
			</ul>
      </li>	
	 <!-- <li>
              <a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect waves-light">
			  	<i class="fas fa-globe"></i>
			  </a>
       </li> -->
			
        </ul>
      </div>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>
</header>
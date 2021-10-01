<!-- Active menu -->
@php
	$prefix = Request::route()->getPrefix();
	$route = Route::current()->getName();
  
 
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{ asset('upload/styleBaelogo.jpg')}}" alt="" style="width:50px; height:50px">
						  <h3><b>StyleBae</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{ ($route == 'dashboard')? 'active':'' }}"> 
          <a href="{{ url('admin/dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
        @php
          $brand = (auth()->guard('admin')->user()->brand==1);
          $category = (auth()->guard('admin')->user()->category==1);
          $salon = (auth()->guard('admin')->user()->salon==1);
          $service = (auth()->guard('admin')->user()->service==1);
          $staff = (auth()->guard('admin')->user()->staff==1);
          $appointment = (auth()->guard('admin')->user()->appointment==1);
          $user = (auth()->guard('admin')->user()->user==1);
          $adminrole = (auth()->guard('admin')->user()->adminrole==1);
          $review = (auth()->guard('admin')->user()->review==1);
          $transaction = (auth()->guard('admin')->user()->transaction==1);
          
         
        @endphp

        @if($brand == true)
        <li class="treeview ">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ route('all.brands') }}"><i class="ti-more"></i>All Brands</a></li>
            
          </ul>
        </li> 
       @else
       @endif

       @if($category == true)
        <li class="treeview ">
          <a href="#">
            <i data-feather="mail"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ route('all.category')}}"><i class="ti-more"></i>All Categories</a></li>
            <li class=""><a href="{{ route('all.subcategory')}}"><i class="ti-more"></i>All Sub Categories</a></li>
            
            
          </ul>
        </li>
        @else
       @endif

       @if($salon == true)
        <li class="treeview ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Salons</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="{{ route('add.product')}}"><i class="ti-more"></i>Add Salon</a></li>
            
            <li class=""><a href="{{route('product.view')}}"><i class="ti-more"></i>Manage Salon</a></li>
            
          </ul>
        </li> 
        @else
       @endif
       
       @if($service == true)
        <li class="treeview ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class=""><a href="{{ route('all.service')}}"><i class="ti-more"></i>All services</a></li>  
          </ul>
        </li>
        @else
       @endif

       @if($staff == true)
          <li class="treeview ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Staff</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class=""><a href="{{ route('all.staff')}}"><i class="ti-more"></i>All Staff</a></li>  
          </ul>
        </li> 
        @else
       @endif
       
       @if($review == true)
        <li class="treeview ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Reviews</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class=""><a href="{{ route('pending.review')}}"><i class="ti-more"></i>Pending Review</a></li>  
          <li class=""><a href="{{ route('published.review')}}"><i class="ti-more"></i>published review</a></li> 
          </ul>
        </li>
        @else
       @endif
       
       @if($appointment == true)
        <li class="treeview ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Appointments</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class=""><a href="{{ route('appointment.view')}}"><i class="ti-more"></i>All Appointment</a></li>  
           
          <li class=""><a href="{{ route('appointment.delete')}}"><i class="ti-more"></i>Appointment Deleted</a></li> 
          <li class=""><a href="{{ route('appointment_cancel')}}"><i class="ti-more"></i>Appointment Canceled</a></li>
          </ul>
        </li> 
        @else
       @endif
       
       @if($user == true)
        <li class="treeview ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class=""><a href="{{ route('user.view')}}"><i class="ti-more"></i>All Users</a></li>  
           
         
          </ul>
        </li> 	
        @else
       @endif

       @if($adminrole == true)
        <li class="treeview ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Admin User Role</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class=""><a href="{{ route('all.admin')}}"><i class="ti-more"></i>All Users</a></li>  
           
         
          </ul>
        </li> 	
        @else
       @endif
       @if($transaction == true)
        <li class="treeview ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Transaction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class=""><a href="{{ route('all.transaction')}}"><i class="ti-more"></i>All Transaction</a></li>  
           
         
          </ul>
        </li> 	
        @else
       @endif
      </ul>
    </section>
	
  </aside>
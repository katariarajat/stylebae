@extends('backend.admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title"> Edit Admin User </h4>
			 
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{ route('admin.user.update')}}" enctype="multipart/form-data">
						@csrf
                        <input type="hidden" name="id" id="" value="{{$myadmin->id}}">
                        <input type="hidden" name="old_img" id="" value="{{$myadmin->profile_photo_path}}">
					  <div class="row">
							<div class="col-6">						
								<div class="form-group">
									<h5> Name <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="name" class="form-control" value="{{$myadmin->name}}"   >
										 
									</div>
								
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<h5>Email  <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="email" name="email" class="form-control" value="{{$myadmin->email}}" >
										
									</div>
								</div>
							</div>							
					  </div>
                      <div class="row">
							<div class="col-6">						
								<div class="form-group">
									<h5> phone <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="phone" class="form-control" value="{{$myadmin->phone}}"   >
										 
									</div>
								
								</div>
							</div>
							<!-- <div class="col-6">
								<div class="form-group">
									<h5>password  <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="password" name="password" class="form-control" >
										
									</div>
								</div>
							</div>							 -->
					  </div>
					  <div class="row">
					  		<div class="col-6">
							  <div class="form-group">
									<h5>Profile image <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="file" id="image" name="profile_photo_path" class="form-control"  > </div>
								</div>
							</div>
							<div class="col-6">
								<img src="{{ asset($myadmin->profile_photo_path) }}" 
								 style="width: 100px; height: 100px; border-radius: 50%;"  id="showImage" alt="">
							</div>
					  </div>
					  <div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info" value="Update Admin">
					  </div>
                      <hr>	
                      <h3>Privileges</h3>
                      <div class="row">
					  
                          <div class="col-md-4">
								<div class="form-group">
									
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_2" value="1" name="brand" {{$myadmin->brand==1?'checked':''}} >
											<label for="checkbox_2">Brand</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_3" value="1" name="category" {{$myadmin->category==1?'checked':''}}>
											<label for="checkbox_3">Category</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_4" value="1" name="salon" {{$myadmin->salon==1?'checked':''}}>
											<label for="checkbox_4">Salon</label>
										</fieldset>
									</div>
								</div>
									
							</div>
							<div class="col-md-4">
								<div class="form-group">
									
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_5" value="1" name="service" {{$myadmin->service==1?'checked':''}} >
											<label for="checkbox_5">Service</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_6" value="1" name="staff" {{$myadmin->staff==1?'checked':''}}>
											<label for="checkbox_6">Staff</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_7" value="1" name="review" {{$myadmin->review==1?'checked':''}}>
											<label for="checkbox_7">Review</label>
										</fieldset>
									</div>
								</div>
									
							</div>
                            <div class="col-md-4">
								<div class="form-group">
									
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_8" value="1" name="appointment" {{$myadmin->appointment==1?'checked':''}} >
											<label for="checkbox_8">Appointment</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_9" value="1" name="user" {{$myadmin->user==1?'checked':''}}>
											<label for="checkbox_9">User</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_10" value="10" name="adminrole" {{$myadmin->adminrole==1?'checked':''}}>
											<label for="checkbox_10">Admin Role</label>
										</fieldset>
									</div>
								</div>
									
							</div>
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
        <!-- /.content -->
</div>

<script>
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

@endsection


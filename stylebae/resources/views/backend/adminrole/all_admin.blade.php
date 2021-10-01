@extends('backend.admin.admin_master')
@section('admin')



<div class="container-full">

	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title"> Admin Users List</h3>

                        <a href="{{route('add.admin')}}" class="btn btn-danger" style="float: right;">Add Admin User</a>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Image</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
                                        <th>Access</th>
										<th>Action</th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($users as $user)
									<tr>
										<td>
											<img src="{{asset( $user->profile_photo_path) }}"  alt="" style="width:70px; height:70px">
										</td>
										<td>{{$user->name}}</td>
										<td>{{$user->email}}</td>
										
										<td>{{$user->phone}}</td>
										<td>
                                        @if($user->brand==1)
                                         <span class="badge btn-primary">Brand</span>
										@else
										@endif
										@if($user->category==1)
                                         <span class="badge btn-secondary">Category</span>
										@else
										@endif
										@if($user->salon==1)
                                         <span class="badge btn-success">Salon</span>
										@else
										@endif
										@if($user->service==1)
                                         <span class="badge btn-danger">Service</span>
										@else
										@endif
										@if($user->staff==1)
                                         <span class="badge btn-warning">Staff</span>
										@else
										@endif
										@if($user->review==1)
                                         <span class="badge btn-info">Review</span>
										@else
										@endif
										@if($user->appointment==1)
                                         <span class="badge btn-light">Appointment</span>
										@else
										@endif
										@if($user->user==1)
                                         <span class="badge btn-dark">User</span>
										@else
										@endif
										@if($user->adminrole==1)
                                         <span class="badge btn-primary">Admin Role</span>
										@else
										@endif
										</td>
										
										<td>
                                            <a href="{{ route('admin.role.edit',$user->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
											<a href="{{ route('admin.role.delete',$user->id)}}" class="btn btn-danger" title="Delete" id="delete"><i class="fa fa-trash"></i></a>
                                        </td>
									</tr>
									@endforeach
								</tbody>
							
						</table>
						</div>

					</div>
				</div>
			</div> 
			


			
			
			

		</div>
		
	</section>
			
</div>



@endsection
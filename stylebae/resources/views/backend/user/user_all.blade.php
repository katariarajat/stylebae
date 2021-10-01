@extends('backend.admin.admin_master')
@section('admin')



<div class="container-full">

	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Users List</h3>
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
                                        <th>Status</th>
										<th>Action</th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($users as $user)
									<tr>
										<td>
											<img src="{{ (!empty($user->profile_photo_path))?url('upload/user-images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}"  alt="" style="width:70px; height:70px">
										</td>
										<td>{{$user->name}}</td>
										<td>{{$user->email}}</td>
										
										<td>{{$user->phone}}</td>
                                        @if($user->OnlineUser())
                                        <td><span class="badge badge-pill badge-success">active Now</span></td>
                                        @else
                                        <td><span class="badge badge-pill badge-danger">
                                            {{Carbon\Carbon::parse($user->last_seen)->diffForHumans()}}
                                        </span></td>
                                        @endif
										
										<td>
                                            <a href="{{ route('user.edit',$user->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
											<a href="{{ route('user.delete',$user->id)}}" class="btn btn-danger" title="Delete" id="delete"><i class="fa fa-trash"></i></a>
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
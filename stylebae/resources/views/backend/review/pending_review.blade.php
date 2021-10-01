@extends('backend.admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">

	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Pending Review</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Summary</th>
										<th>Comment</th>
										<th>User</th>
										<th>Salon</th>
										<th>Service</th>
                                        <th>Status</th>
										<th>Rating</th>
										<th>Action</th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($review as $item)
									<tr>
										<td>{{$item->summary}}</td>
                                        <td>{{$item->comment}}</td>
                                        <td>{{$item->user->name}}</td>
										<td>{{$item->salon->product_name_en}}</td>
                                        <td>{{$item->service->service_name_en}}</td>
										<td>
											@if($item->status == 0)
											 <span class="badge badge-pull badge-danger"> Pending</span>
											@elseif($item->status == 1)
												
												<span class="badge badge-pull badge-success"> Published</span>
											@endif
											
										</td>
										<td>{{$item->rating}}</td>
										
										<td style="width:20%;">
											<a href="{{ route('review.approve',$item->id)}}" class="btn btn-info" title="Edit">Approve</a>
											
										</td>
										
									</tr>
									@endforeach
								</tbody>
							
						</table>
						</div>

					</div>
				</div>
			</div> 
			
		
	</section>
			
</div>

 
@endsection
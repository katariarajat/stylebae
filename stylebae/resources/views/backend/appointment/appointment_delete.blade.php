@extends('backend.admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">

	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title"> Appointments Deleted</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										
										<th>User</th>
										<th>Salon</th>
										<th>Service</th>
                                        <th>price</th>
										<th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($appointment as $item)
									<tr>
										<td>{{$item->user->name}}</td>
                                        <td>{{$item->salon->product_name_en}}</td>
                                        <td>{{$item->service->service_name_en}}</td>
										<td>{{$item->price}} Rs</td>
                                        <td>{{$item->date_app}}</td>
										<td>{{$item->time_app}}</td>
										
										<td>
											<span class="badge badge-danger">Deleted</span>
											
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
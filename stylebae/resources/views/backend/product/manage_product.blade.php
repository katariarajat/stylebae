@extends('backend.admin.admin_master')
@section('admin')



<div class="container-full">

	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Product List</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Image</th>
										<th>Salon En</th>
										<th>Address</th>
                                        <th>Phone</th>
										<th>Status</th>
                                        <th>Action</th>

										
									</tr>
								</thead>
								<tbody>
									@foreach($product as $item)
									<tr>
                                        <td>
											<img src="{{asset($item->product_mainImg)}}" alt="" style="width:50px; height:50px">
										</td>
										<td>{{$item->product_name_en}}</td>
										
                                        <td>{{$item->product_address}}</td>
										<td>{{$item->phone}}</td>
										<td>
											@if($item->status == 0)
												<span class="badge badge-pill badge-danger">Inactive</span>
											@else
											<span class="badge badge-pill badge-success">Active</span>
											@endif
										</td>
										
										<td>
											<a href="{{route('salon.detail',$item->id)}}" class="btn btn-info" title="Detail"><i class="fa fa-eye"></i></a>
											<a href="{{route('product.edit',$item->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
											<a href="{{route('salon.delete',$item->id)}} " class="btn btn-danger" title="Delete" id="delete"><i class="fa fa-trash"></i></a>
											@if($item->status == 0)
											<a href="{{route('salon.active',$item->id)}} " class="btn btn-success" title="Active" ><i class="fa fa-arrow-up"></i></a>
											@else
											<a href="{{route('salon.inactive',$item->id)}} " class="btn btn-danger" title="Inactive" ><i class="fa fa-arrow-down"></i></a>
											@endif
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
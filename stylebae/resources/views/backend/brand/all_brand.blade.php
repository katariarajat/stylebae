@extends('backend.admin.admin_master')
@section('admin')



<div class="container-full">

	<section class="content">
		<div class="row">
			<div class="col-8">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Brands List</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Image</th>
										<th>Brand Name</th>
										<th>Salon</th>
										
										<th>Action</th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($brand as $item)
									<tr>
										<td>
											<img src="{{ asset($item->brand_image) }}" alt="" style="width:70px; height:70px">
										</td>
										<td>{{$item->brand_name_en}}</td>
										<td>{{$item->Salons->product_name_en}}</td>
										
										<td>
											<a href="{{ route('brand.edit',$item->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
											<a href="{{ route('brand.delete',$item->id)}}" class="btn btn-danger" title="Delete" id="delete"><i class="fa fa-trash"></i></a>
										</td>
										
									</tr>
									@endforeach
								</tbody>
							
						</table>
						</div>

					</div>
				</div>
			</div> 
			


			
			<div class="col-4">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title"> Add Brands </h3>
					</div>
					<div class="box-body">
						<form action="{{ route('brand.store')}}" method="post" enctype="multipart/form-data">
							
							@csrf
							<div class="form-group">
									<h5>Brand Name <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="brand_name_en" class="form-control"  >
										 @error('brand_name_en')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror
									</div>
							</div>
							<div class="form-group">
									<h5> Salon <span class="text-danger">*</span></h5>
									<div class="controls">
										
										<select name="salon" id="" class="form-control">
											<option value="" selected disabled> Select Salon</option>
										@foreach($salon as $sal)
											<option value="{{$sal->id}}">{{$sal->product_name_en}}</option>
											@endforeach	
										</select>
										
										 @error('salon')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror
									</div>
							</div>		
							<!-- <div class="form-group">
									<h5>Brand Name Hindi <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="brand_name_hin" class="form-control"  >
										@error('brand_name_hin')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror
									</div>
							</div>	 -->
							<div class="form-group">
									<h5>Brand Image <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="file" name="brand_image" class="form-control"  >
										@error('brand_image')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror	 
									</div>
							</div>
							
							<input type="submit" class="btn btn-rounded btn-info" value="Add Brand">
						</form>
					</div>
				</div>
			

		</div>
		
	</section>
			
</div>



@endsection
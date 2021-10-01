@extends('backend.admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">

	<section class="content">
		<div class="row">
			<div class="col-9">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Service List</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Service Name</th>
										<th>Sub Category</th>
										<th>Salon Name</th>
										<th> Price</th>
										<th>Discount</th>
										<th>Action</th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($service as $item)
									<tr>
										<td>{{$item->service_name_en}}</td>
                                        <td>{{$item->subcategory->subcategory_name_en}}</td>
										<td>{{$item->salon->product_name_en}}</td>
                                        <td>{{$item->price}} Rs</td>
										<td>
											@if($item->discount == NULL)
											 <span class="badge badge-pull badge-danger"> No Discount</span>
											@else
												@php
													$amount = (int) $item->price - (int)$item->discount;
													$discount = ($amount/$item->price) * 100;
												@endphp
												<span class="badge badge-pull badge-danger"> {{round($discount)}} %</span>
											@endif
											
										</td>
										
										<td style="width:20%;">
											<a href="{{ route('service.edit',$item->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
											<a href="{{ route('service.delete',$item->id)}}" class="btn btn-danger" title="Delete" id="delete"><i class="fa fa-trash"></i></a>
										</td>
										
									</tr>
									@endforeach
								</tbody>
							
						</table>
						</div>

					</div>
				</div>
			</div> 
			


			<!-- Add service -->
			<div class="col-3">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title"> Add Service </h3>
					</div>
					<div class="box-body">
						<form action="{{ route('service.store')}}" method="post" >
							
							@csrf
							<div class="form-group">
									<h5> Category Name <span class="text-danger">*</span></h5>
									<div class="controls">
										
										<select name="scategory_id" id="" class="form-control">
											<option value="" selected disabled> Select Category</option>
										@foreach($category as $cat)
											<option value="{{$cat->id}}">{{$cat->category_name_en}}</option>
											@endforeach	
										</select>
										
										 @error('scategory_id')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror
									</div>
							</div>	
                            <div class="form-group">
									<h5> Sub Category Name <span class="text-danger">*</span></h5>
									<div class="controls">
										
										<select name="ssubcategory_id" id="" class="form-control">
											<option value="" selected disabled> Select Sub Category</option>

										</select>
										
										 @error('ssubcategory_id')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror
									</div>
							</div>	
							<div class="form-group">
									<h5> Salon Name <span class="text-danger">*</span></h5>
									<div class="controls">
										
										<select name="sproduct_id" id="" class="form-control">
											<option value="" selected disabled> Select Salon Name</option>
										@foreach($product as $prod)
											<option value="{{$prod->id}}">{{$prod->product_name_en}}</option>
											@endforeach	
										</select>
										
										 @error('sproduct_id')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror
									</div>
							</div>	
							<div class="form-group">
									<h5> Service Name  <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="service_name_en" class="form-control"  >
										@error('service_name_en')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror
									</div>
							</div>	
							<!-- <div class="form-group">
									<h5>Service Name  Hindi <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="service_name_hin" class="form-control"  >
										@error('service_name_hin')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror	 
									</div>
							</div> -->
                            <div class="form-group">
									<h5>Service Price <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="service_price" class="form-control"  >
										@error('service_price')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror	 
									</div>
							</div>
							<div class="form-group">
									<h5>Service Discount </h5>
									<div class="controls">
										<input type="text" name="discount" class="form-control"  >
										@error('discount')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror	 
									</div>
							</div>
							
							<input type="submit" class="btn btn-rounded btn-info" value="Add Service">
						</form>
					</div>
				</div>
			

		</div>
		
	</section>
			
</div>

 <script>
	 $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/product/service/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        // var d =$('select[name="subsubcategory_id"]').html(' ');
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });


        
    });
</script>


@endsection
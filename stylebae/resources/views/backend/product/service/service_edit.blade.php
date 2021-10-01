@extends('backend.admin.admin_master')
@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">
            <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Update Service </h3>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('service.update',$service->id)}}" method="post" >

                                @csrf

                                
                                <div class="form-group">
									<h5> Category Name <span class="text-danger">*</span></h5>
									<div class="controls">
										
										<select name="category_id" id="" class="form-control">
											<option value="" selected disabled> Select Category</option>
										@foreach($category as $cat)
											<option value="{{$cat->id}}" {{ $cat->id == $service->category_id
                                                ? 'selected': '' }} > {{$cat->category_name_en}} </option>
											@endforeach	
										</select>
										
										 @error('category_id')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror
									</div>
							    </div>	
                                <div class="form-group">
									<h5>Sub Category Name <span class="text-danger">*</span></h5>
									<div class="controls">
										
										<select name="subcategory_id" id="" class="form-control">
											<option value="" selected disabled> Select Category</option>
										@foreach($subcategory as $subcat)
											<option value="{{$subcat->id}}" {{ $subcat->id == $service->subcategory_id
                                                ? 'selected': '' }} > {{$subcat->subcategory_name_en}} </option>
											@endforeach	
										</select>
										
										 @error('subcategory_id')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror
									</div>
							    </div>	
                                <div class="form-group">
                                        <h5>Service Name English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="service_name_en" class="form-control" value="{{$service->service_name_en}}"  >
                                            @error('service_name_en')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                </div>	
                                <div class="form-group">
                                        <h5>Service Name Hindi <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="service_name_hin" class="form-control" value="{{$service->service_name_hin}}" >
                                            @error('service_name_hin')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                </div>	
                                <div class="form-group">
                                        <h5>Service price <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="price" class="form-control" value="{{$service->price}}"  >
                                            @error('service_price')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror	 
                                        </div>
                                </div>
                                <div class="form-group">
                                        <h5>Discount <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="discount" class="form-control" value="{{$service->discount}}"  >
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
        </div>

    </div>

</div>

		
@endsection
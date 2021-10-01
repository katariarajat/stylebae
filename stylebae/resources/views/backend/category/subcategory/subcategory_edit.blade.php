@extends('backend.admin.admin_master')
@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">
            <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Update Sub Categories </h3>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('subcategory.update',$subcategory->id)}}" method="post" enctype="multipart/form-data" >

                                @csrf

                                
                                <div class="form-group">
									<h5> Category Name <span class="text-danger">*</span></h5>
									<div class="controls">
										
										<select name="category_id" id="" class="form-control">
											<option value="" selected disabled> Select Category</option>
										@foreach($category as $cat)
											<option value="{{$cat->id}}" {{ $cat->id == $subcategory->category_id
                                                ? 'selected': '' }} > {{$cat->category_name_en}} </option>
											@endforeach	
										</select>
										
										 @error('category_id')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror
									</div>
							    </div>	
                                <div class="form-group">
                                        <h5>Sub category Name English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_en" class="form-control" value="{{$subcategory->subcategory_name_en}}"  >
                                            @error('subcategory_name_en')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                </div>	
                                <div class="form-group">
                                        <h5>Sub Category Name Hindi <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_hin" class="form-control" value="{{$subcategory->subcategory_name_hin}}" >
                                            @error('subcategory_name_hin')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                </div>	
                                <div class="form-group">
                                        <h5>Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="image" class="form-control"  >
                                            @error('image')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror	 
                                        </div>
                                </div>
                                
                                <input type="submit" class="btn btn-rounded btn-info" value="Update Sub category">
                            </form>
                        </div>
                    </div>
                
        </div>

    </div>

</div>

		
@endsection
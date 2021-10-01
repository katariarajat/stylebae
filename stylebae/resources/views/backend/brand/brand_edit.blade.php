@extends('backend.admin.admin_master')
@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">
            <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Update Brands </h3>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('brand.update',$brand->id)}}" method="post" enctype="multipart/form-data">

                                @csrf

                                <input type="hidden" name="oldImage" value="{{$brand->brand_image}}" >

                                <div class="form-group">
                                        <h5>Brand Name English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_en" class="form-control" value="{{$brand->brand_name_en}}"  >
                                            @error('brand_name_en')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                </div>	
                                <div class="form-group">
                                        <h5>Brand Name Hindi <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_hin" class="form-control" value="{{$brand->brand_name_hin}}" >
                                            @error('brand_name_hin')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                </div>	
                                <div class="form-group">
                                        <h5>Brand Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="brand_image" class="form-control"  >
                                            @error('brand_image')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror	 
                                        </div>
                                </div>
                                
                                <input type="submit" class="btn btn-rounded btn-info" value="Update Brand">
                            </form>
                        </div>
                    </div>
                
        </div>

    </div>

</div>

		
@endsection
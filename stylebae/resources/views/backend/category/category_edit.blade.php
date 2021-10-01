@extends('backend.admin.admin_master')
@section('admin')

<div class="container-full">
    <div class="content">
        <div class="row">
            <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Update Categories </h3>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('category.update',$category->id)}}" method="post" >

                                @csrf

                                

                                <div class="form-group">
                                        <h5>category Name English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_en" class="form-control" value="{{$category->category_name_en}}"  >
                                            @error('category_name_en')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                </div>	
                                <div class="form-group">
                                        <h5>Category Name Hindi <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_hin" class="form-control" value="{{$category->category_name_hin}}" >
                                            @error('category_name_hin')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                </div>	
                                <!-- <div class="form-group">
                                        <h5>category Icon <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_icon" class="form-control" value="{{$category->category_icon}}"  >
                                            @error('category_icon')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror	 
                                        </div>
                                </div> -->
                                
                                <input type="submit" class="btn btn-rounded btn-info" value="Update category">
                            </form>
                        </div>
                    </div>
                
        </div>

    </div>

</div>

		
@endsection
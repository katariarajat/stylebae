@extends('backend.admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
    <div class="content">
        <div class="row">
            <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Update Staff </h3>
                        </div>
                        <div class="box-body">
                            <form action=" {{ route('staff.update')}} " method="post" enctype="multipart/form-data" >

                                @csrf

                                <input type="hidden" name="id" value="{{$staff->id}}">
                                
                                <div class="form-group">
									<h5> Salon Name <span class="text-danger">*</span></h5>
									<div class="controls">
										
										<select name="product_id" id="" class="form-control">
											<option value="" selected disabled> Select Category</option>
										@foreach($salon as $sal)
											<option value="{{$sal->id}}" {{ $sal->id == $staff->product_id
                                                ? 'selected': '' }} > {{$sal->product_name_en}} </option>
											@endforeach	
										</select>
										
										 @error('product_id')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror
									</div>
							    </div>	
                                <div class="form-group">

									
                                    <h5> Staff Name English <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="staff_member_name_en" class="form-control" value="{{$staff->staff_member_name_en}}"  >
										@error('staff_member_name_en')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror
									</div>
							    </div>	
                                <div class="form-group">
                                        <h5> Staff Name Hindi <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="staff_member_name_hin" class="form-control" value="{{$staff->staff_member_name_hin}}">
                                            @error('staff_member_name_hin')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                </div>	
                                <div class="form-group">
									<h5>Title <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="title" class="form-control" value="{{$staff->title}}"  >
										@error('title')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror	 
									</div>
							    </div>
                                <div class="form-group">
                                    <h5>Photo<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="photo" class="form-control" value="{{$staff->photo}}"  onchange="mainImgUrl(this)"> 
                                        @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror

                          
                                    </div>
							    </div>
                                
                                <input type="submit" class="btn btn-rounded btn-info" value="Add Service">
                            </form>
                        </div>
                    </div>
            </div>
            <div class="col-4">
                <div class="box">
                <div class="box-header with-border">
                            <h3 class="box-title"> View Photo </h3>
                        </div>
                    <div class="box-body">
                     <img src="{{asset($staff->photo)}}" alt="" id="mainImg" >
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

<script>
    function mainImgUrl(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainImg').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
		
@endsection
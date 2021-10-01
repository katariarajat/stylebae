@extends('frontend.master')
@section('main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.3.6/bootstrap-tagsinput.min.js"></script>
<link rel="stylesheet" href="{{asset('frontend/css/salon_reg.css')}}">

<main id="main">
    <div class="row" id="main_row">
       <h2> Salon Registration</h2>
       <form method="post" action=" {{ route('product.store')}} " enctype="multipart/form-data">
             @csrf
                <input type="hidden" name="user_name" id="" value="{{Auth::user()->name}}">
                <div class="row">
                    <div class="col-12">
                        <div class="card" style="width: 100%;">
                            <div class="card-header">
                                Add Salon
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="col-4">
                                          <div class="form-group">
                                            <h5> Brand  </h5>
                                            <div class="controls">
                                                
                                            <select name="brand_id" id="" class="form-control">
                                                    <option value="" selected disabled> Select Brand</option>
                                                @foreach($brand as $brand)
                                                    <option value="{{$brand->id}}"  > {{$brand->brand_name_en}} </option>
                                                    @endforeach	
                                                </select>
                                                
                                                @error('brand_id')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                         </div>
                                       </div>

                                        <div class="col-4">
                                          <div class="form-group">
                                            <h5> Category  <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                
                                            <select name="category_id" id="" class="form-control">
                                                    <option value="" selected disabled> Select Category</option>
                                                @foreach($category as $cat)
                                                    <option value="{{$cat->id}}"  > {{$cat->category_name_en}} </option>
                                                    @endforeach	
                                                </select>
                                                
                                                @error('category_id')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                         </div> 
                                        </div>

                                        <div class="col-4">
                                          <div class="form-group">
                                                    <h5> SubCategory  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        
                                                        <select name="subcategory_id" id="" class="form-control">
                                                            <option value="" selected disabled> Select SubCategory</option>
                                                    
                                                        </select>
                                                        
                                                        @error('subcategory_id')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>	
                                         </div>
                                    </div>
                                </div> <!--///////// End 1st Row /////// -->

                                <div class="row"> <!--///////// 2nd Row /////// -->
                                    <div class="col-12">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>Salon Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_name_en" class="form-control" > 
                                                    @error('product_name_en')
                                                            <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>      
                                        </div>

                                        <div class="col-4">
                                           <div class="form-group">
                                                <h5>City<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="city" class="form-control" > 
                                                    @error('city')
                                                            <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                          <div class="form-group">
                                                <h5>Salon Main Image<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="product_mainImg" class="form-control" onchange="mainImgUrl(this)" > 
                                                    @error('product_mainImg')
                                                            <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                    <img src="" alt="" id="mainImg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!--///////// End 2nd Row /////// -->

                                <div class="row"> <!--///////// 3rd Row /////// -->
                                    <div class="col-12">
                                        <div class="col-4">
                                            <div class="form-group">
                                                    <h5>Multi Image<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="multi_image[]" id="multiImg" class="form-control" multiple > 
                                                        @error('multi_image')
                                                                <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <div class="row" id="preview_img"></div>
                                                    </div>
                                            </div>     
                                        </div>

                                        <div class="col-4">
                                           <div class="form-group">
                                                <h5>Address<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="product_address" id="textarea" class="form-control" ></textarea>
                                                    @error('product_address')
                                                            <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                           <div class="form-group">
                                                <h5> Description<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <textarea name="long_desc_en" id="textarea" class="form-control" ></textarea>
                                                @error('long_desc_en')
                                                            <span class="text-danger">{{$message}}</span>
                                                    @enderror  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!--///////// End 3rd Row /////// -->

                                <div class="row"> <!--///////// 4th Row /////// -->
                                    <div class="col-12">
                                        <div class="col-4">
                                            <div class="form-group">
                                                    <h5>Phone Number<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="phone" class="form-control" > 
                                                        @error('phone')
                                                                <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>   
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <h5>Opening Time<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="time" name="opening_time" class="form-control" id="timepicker" > 
                                                    @error('opening_time')
                                                            <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                    <h5>Closing Time<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="time" name="closing_time" class="form-control" placeholder="7:00PM" > 
                                                        @error('closing_time')
                                                                <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!--///////// End 4th Row /////// -->

                                <div class="row">
                                <input type="submit" class="btn btn-rounded btn-info" value="Add Salon"/>
                                </div>
                            </div> <!--///////// End card body /////// -->
                        </div> <!--///////// End Card/////// -->
                        
                    </div> <!--///////// End Col-12 /////// -->
                   
                </div> <!--///////// End Row /////// -->  
        </form>   
        <!-- ////////////////////////// Service Section and Staff ////////////////////////////////////////// -->
        <div class="row">
            <div class="col-12">

          
                 <!-- ////////////////// Service Section and Staff ///////////////////////////// -->
                 <div class="col-6" id="service">
                        <div class="card">
                                <div class="card-header">
                                Add Services
                                </div>
                            <div class="card-body">
                                    <form action="{{ route('service.store')}}" method="post" >
                                        
                                        @csrf

                                        <div class="form-group">
                                            <h5> Category  <span class="text-danger">*</span></h5>
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
                                            <h5> Sub Category  <span class="text-danger">*</span></h5>
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
                                    
                                    <input type="submit" class="btn btn-rounded btn-info" value="Add Service" id="bnt_serv">	
                                    </form>    
                                
                            </div>

                        </div>
                    </div>    
                <!-- //////// End Service Section /////////////// -->

                <div class="col-6" id="staff">
                        <div class="card">
                                <div class="card-header">
                                Add Staff
                                </div>
                            <div class="card-body">
                                    <form action="{{ route('staff.store')}}" method="post" enctype="multipart/form-data">
                                        
                                        @csrf

                                        <div class="form-group">
									<h5> Salon Name <span class="text-danger">*</span></h5>
									<div class="controls">
										
										<select name="product_id" id="" class="form-control">
											<option value="" selected disabled> Select Salon</option>
                                            @foreach($product as $prod)
											<option value="{{$prod->id}}">{{$prod->product_name_en}}</option>
											@endforeach	
										</select>
										
										 @error('product_id')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror
									</div>
							</div>	
                            <div class="form-group">
																		
                                    <h5> Member Name  <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="staff_member_name_en" class="form-control"  >
										@error('staff_member_name_en')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror
									</div>
										
										
							</div>	
							
							
                            <div class="form-group">
									<h5>Title <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="title" class="form-control"  >
										@error('title')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror	 
									</div>
							</div>
                            <div class="form-group">
                                    <h5>Photo<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="photo" class="form-control"> 
                                        @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror

                                        
                                    </div>
							    </div>
                                    
                                    <input type="submit" class="btn btn-rounded btn-info" value="Add Staff" id="bnt_serv">	
                                    </form>    
                                
                            </div>

                        </div>
                    </div>    
                <!-- //////// End staff Section /////////////// -->
            
            </div>
        </div>        
       
    </div>   
</main>
   
      <script>
	 $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/product/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        
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

<script>
	 $(document).ready(function() {
        $('select[name="scategory_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/product/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        
                       var d =$('select[name="ssubcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="ssubcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });


       
    });
</script>

<!-- display image selected in javscript -->

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

<!-- Multi Image display -->

<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>


 
@endsection
@extends('backend.admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.3.6/bootstrap-tagsinput.min.js"></script>

  
<div class="container-full">
		<!-- Content Header (Page header) -->
			  

		<!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Add Product</h4>
                
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action=" {{ route('product.store')}} " enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-12">
                                        <div class="row">  <!--start 1st row-->

                                            <div class="col-md-4"> <!--start 1st md-4-->

                                            <div class="form-group">
                                                <h5> Brand Name <span class="text-danger">*</span></h5>
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

                                        </div>  <!--end md-4-->
                                        <div class="col-md-4"> <!--start 2nd md-4-->

                                            <div class="form-group">
                                                <h5> Category Name <span class="text-danger">*</span></h5>
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

                                        </div>  <!--end md-4-->
                                        <div class="col-md-4"> <!--start 3rd md-4-->

                                            <div class="form-group">
                                                <h5> SubCategory Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    
                                                    <select name="subcategory_id" id="" class="form-control">
                                                        <option value="" selected disabled> Select SubCategory</option>
                                                
                                                    </select>
                                                    
                                                    @error('subcategory_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>	

                                        </div>  <!--end md-4-->

                                        </div> <!--end 1st row-->

                                        <div class="row">  <!--start 2nd row-->

                                        <div class="col-md-4"> <!--start 1st md-4-->

                                        <div class="form-group">
                                            <h5>Product Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_name_en" class="form-control" > 
                                                @error('product_name_en')
                                                        <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        </div>  <!--end md-4-->
                                        
                                        <div class="col-md-4"> <!--start 2nd md-4-->

                                        <div class="form-group">
                                            <h5>City<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="city" class="form-control" > 
                                                @error('city')
                                                        <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        </div>  <!--end md-4-->
                                        <div class="col-md-4"> <!--start 3rd md-4-->

                                        <div class="form-group">
                                            <h5>Product Main Image<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="product_mainImg" class="form-control" onchange="mainImgUrl(this)" > 
                                                @error('product_thambnail')
                                                        <span class="text-danger">{{$message}}</span>
                                                @enderror

                                                <img src="" alt="" id="mainImg">
                                            </div>
                                        </div>

                                        </div>  <!--end md-4-->

                                    </div> <!--end 2nd row-->


                                    <div class="row">  <!--start 3th row-->

                                        <div class="col-md-4"> <!--start 1st md-4-->

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

                                        </div>  <!--end md-4-->
                                        <div class="col-md-4"> <!--start 3rd md-8-->

                                        <div class="form-group">
                                            <h5>Address<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="product_address" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                                
                                            </div>
                                        </div>

                                        </div>  <!--end md-8-->
                                        <div class="col-md-4"> <!--start 2nd md-4-->

                                    
                                            <div class="form-group">
                                            <h5> Description <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                            <textarea name="long_desc_en" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                                
                                            </div>
                                        </div>
                                        </div>

                                        </div>  <!--end md-4-->

                                    </div> <!--end 3th row-->

                                </div><!-- End Row-->

                                <div class="row">
                                    <div class="col-md-4"> <!--start 1st md-4-->

                                        <div class="form-group">
                                        <h5>Phone Number<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="phone" class="form-control" > 
                                                @error('phone')
                                                        <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>  <!--end md-4-->

                                    <div class="col-md-4"> <!--start 3rd md-4-->

                                <div class="form-group">
                                            <h5>Opening Time<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="time" name="opening_time" class="form-control"placeholder="10:00PM" > 
                                                @error('opening_time')
                                                        <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                 </div>

                                </div>  <!--end md-4-->

                                <div class="col-md-4"> <!--start 3rd md-4-->

                                <div class="form-group">
                                            <h5>Closing Time<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="time" name="closing_time" class="form-control" placeholder="7:00PM" > 
                                                @error('closing_time')
                                                        <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                </div>

                                </div>  <!--end md-4-->

                                </div>

                                <div class="text-xs-right">
							        <input type="submit" class="btn btn-rounded btn-info" value="Add Product"/>
						        </div>
                             </div> <!--end col-12-->

                        
                         </div> <!-- End Row -->
                            
                        </form>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>

   
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


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
                <h4 class="box-title">Edit Salon</h4>
                
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action=" {{ route('product.update')}} ">
                            @csrf
                                    <input type="hidden" name="id" value="{{$salon->id}}">

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
                                                <option value="{{$brand->id}}" {{$brand->id == $salon->brand_id ? 'selected':''}} > {{$brand->brand_name_en}} </option>
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
                                                <option value="{{$cat->id}}" {{$cat->id == $salon->category_id ? 'selected':''}}  > {{$cat->category_name_en}} </option>
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
                                                @foreach($subcategory as $sub)
                                                <option value="{{$sub->id}}" {{$sub->id == $salon->subcategory_id ? 'selected':''}}  > {{$sub->subcategory_name_en}} </option>
                                                @endforeach
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
                                    <h5>Product Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_en" class="form-control" value="{{$salon->product_name_en}}" > 
                                        @error('product_name_en')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
							    </div>

                                </div>  <!--end md-4-->
                                
                                <div class="col-md-4"> <!--start 2nd md-4-->

                                <div class="form-group">
                                    <h5>Product Name Hindi<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_hin" class="form-control" value="{{$salon->product_name_hin}}" > 
                                        @error('product_name_hin')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
							    </div>

                                </div>  <!--end md-4-->
                                <div class="col-md-4"> <!--start 3rd md-4-->

                                <div class="form-group">
                                <h5>Address<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="product_address" id="textarea" class="form-control" required>
                                        {{$salon->product_address}}
                                        </textarea>
                                        
                                    </div>
							    </div>

                                </div>  <!--end md-4-->

                            </div> <!--end 2nd row-->

                            

                           


                            <div class="row">  <!--start 6th row-->

                                <div class="col-md-4"> <!--start 1st md-4-->

                                <div class="form-group">
                                     <h5>Phone Number<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="phone" class="form-control" value="{{$salon->phone}}"> 
                                        @error('phone')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
							    </div>

                                </div>  <!--end md-4-->
                                <div class="col-md-4"> <!--start 3rd md-8-->

                                <div class="form-group">
                                    <h5>Opening Time<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="time" name="opening_time" class="form-control" value="{{$salon->opening_time}}" > 
                                        @error('opening_time')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                </div>  <!--end md-8-->
                                <div class="col-md-4"> <!--start 2nd md-4-->

                                <div class="form-group">
                                    <h5>Closing Time<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="time" name="closing_time" class="form-control" value="{{$salon->closing_time}}" > 
                                        @error('closing_time')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                </div>  <!--end md-4-->

                            </div> <!--end 6th row-->

                            <div class="row">  <!--start 7th row-->

                                <div class="col-md-6"> <!--start 1st md-4-->

                                <div class="form-group">
                                    <h5>Short Description English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_desc_en" id="textarea" class="form-control" required >
                                        {{$salon->short_desc_en}}
                                        </textarea>
                                        
                                    </div>
							    </div>

                                </div>  <!--end md-4-->
                                <div class="col-md-6"> <!--start 3rd md-4-->

                                <div class="form-group">
                                    <h5>Short Description Hindi<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <textarea name="short_desc_hin" id="textarea" class="form-control" required  >
                                    {{$salon->short_desc_hin}}
                                    </textarea>
                                        
                                    </div>
							    </div>

                                </div>  <!--end md-4-->
                                
                            </div> <!--end 7th row-->

                            <div class="row">  <!--start 8th row-->

                                <div class="col-md-6"> <!--start 1st md-4-->

                                <div class="form-group">
                                    <h5>Long Description English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <textarea name="long_desc_en" id="textarea" class="form-control" required >
                                    {{$salon->long_desc_en}}
                                    </textarea>
                                        
                                    </div>
							    </div>

                                </div>  <!--end md-4-->
                                <div class="col-md-6"> <!--start 3rd md-4-->

                                <div class="form-group">
                                    <h5>Long Description Hindi<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <textarea name="long_desc_hin" id="textarea" class="form-control" required >
                                    {{$salon->long_desc_hin}}
                                    </textarea>
                                        
                                    </div>
							    </div>

                                </div>  <!--end md-4-->
                                
                            </div> <!--end 7th row-->
                            

                                </div><!-- End Row-->

                                </div> <!--end col-12-->

                                <hr>

                                <div class="row">

                                   

                                <div class="text-xs-right">
							        <input type="submit" class="btn btn-rounded btn-info" value="Update Salon"/>
						        </div>
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

    <!-- Multiple images update part -->

    <section class="content">

    <!-- Main Image update -->
        <div class="row">
                <div class="col-md-8">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Update <strong>Main Images</strong></h4>
                        </div>

                        <form action="{{ route('update.salon.main.img')}}" method="post" enctype="multipart/form-data">
                            @csrf
                                <input type="hidden" name="id" value="{{$salon->id}}">
                                <input type="hidden" name="old_img" value="{{$salon->product_mainImg}}">
                            <div class="row row-sm">
                                
                                <div class="col-md-3">

                                    <div class="card" style="width: 250px;">
                                        <img class="card-img-top" src="{{asset($salon->product_mainImg)}}" id="mainImg"  style="width: 250px; height:250px;">
                                        <div class="card-body" >
                                            <p class="card-text">
                                                <div class="form-group">
                                                    <label for="" class="form-control-label">Change Image <span class="text-danger">*</span></label>
                                                </div>
                                                <input type="file" name="product_mainImg" class="form-control" onchange="mainImgUrl(this)">
                                            </p>
                                            
                                        </div>
                                    </div>

                                </div>
                                

                            
                            </div>
                            <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Update Image"/>
                            </div> <br><br>
                        </form>
                    </div>
                </div>
            </div>

        <!-- Multiple Images update part -->
        <div class="row">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Update <strong>Multi Images</strong></h4>
                    </div>

                    <form action="{{ route('update.salon.multi.img')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            @foreach($multiImg as $img)
                            <div class="col-md-3">

                                <div class="card" style="width: 230px;">
                                    <img class="card-img-top" src="{{asset($img->photo_name)}}" id="multiImg" style="width: 230px; height:230px;" >
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{route('salon.multi.img.delete',$img->id)}}" class="btn btn-sm btn-danger" id="delete" title="Delete Image">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </h5>
                                        <p class="card-text">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Change Image <span class="text-danger">*</span></label>
                                            </div>
                                            <input type="file" name="multi_img[ {{$img->id}} ]" class="form-control" onchange="multiImgUrl(this)">
                                        </p>
                                        
                                    </div>
                                </div>

                            </div>
                            @endforeach

                           
                        </div>
                        <div class="text-xs-right">
							        <input type="submit" class="btn btn-rounded btn-info" value="Update Image"/>
						</div> <br><br>
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
                $('#mainImg').attr('src',e.target.result).width(230).height(230);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<!-- <script>
    function multiImgUrl(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#multiImg').attr('src',e.target.result).width(230).height(230);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script> -->

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


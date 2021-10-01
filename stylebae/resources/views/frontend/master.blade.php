<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="jquery.datetimepicker.css"/>
    
    <!-- Vendors Style-->
  	<!-- <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}"> -->
	  
    <!-- Style-->  
    <!-- <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">-->
    <link rel="stylesheet" href="{{asset('frontend/css/welcome.css')}}">  

    <!-- stripe payment  -->
    <script src="https://js.stripe.com/v3/"></script>
    
    <title>@yield('title')</title>
</head>
<body>
   



      <!-- Start header -->
    @include('frontend.header')
    <!-- End header -->

    <!-- Start main part -->
      @yield('main') 
    <!-- End main part -->

   

     
  
       <script src="{{asset('frontend/js/welcome.js')}}"></script>
       <script src="{{asset('frontend/js/user_profil.js')}}"></script>
       <script src="{{asset('frontend/js/book.js')}}"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/f0587fae17.js" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Vendor JS -->
      <script src=" {{ asset('backend/js/vendors.min.js') }}"></script>
        <script src=" {{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>	
      <script src=" {{ asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
      <script src=" {{ asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
      <script src=" {{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
      <script src="{{asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
      <script src="{{asset('backend/js/pages/data-table.js')}}"></script>
      <!-- Tags input scripts -->
      <script src="{{asset(' ../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js ')}}"></script>
      <!-- CKeditor-->
      <script src="{{asset('../assets/vendor_components/ckeditor/ckeditor.js')}}"></script>
      <script src="{{asset('../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>
      <script src="{{asset('backend/js/pages/editor.js')}}"></script>
      <!-- Sunny Admin App -->
      <script src=" {{ asset('backend/js/template.js') }}"></script>
      <script src=" {{ asset('backend/js/pages/dashboard.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="jquery.datetimepicker.js"></script>
      

<!-- ///////// Toastr messages //////// -->
      <script>
   
      @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"

        switch(type){
          case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
          case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
          case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
          case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;	
            
        }
      @endif	
  	</script>

    <!-- ///////////////// Modal design ///////////////// -->
        

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><span id="pname"></span></h5>
        <input type="button" class="close" data-dismiss="modal" id="closeModal" aria-label="Close" value="&times;">
          
      </input>
      </div>
      <div class="modal-body">
        <!-- Start Row  -->
        <div class="row"> 
          <!-- Start Image section -->
          <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="" alt="Card image cap" id="pimage" style="width: 200px; height: 200px;">
               
            </div>
          </div>
          <!--  End Image section -->
          <!-- Start Image section -->
          <div class="col-md-4">
            <div class="form-group">
            <h4 class="modal-title" id="exampleModalLabel" >Service Name: <strong><span id="serv_name"></span></strong> </h4>
             
            </div>
            <div class="form-group">
              
            <h4 class="modal-title" id="exampleModalLabel" >Service Price:
               <strong class="text-danger"> 
                 <span id="serv_price" ></span> Rs
              </strong>
              <del id="old_price" ></del> 
            </h4>
            
          
             
            </div>
           <input type="hidden" id="service_id">
            <input type="submit" class="btn btn-primary" onclick="addToCart()" value="Add To Cart">
          <!--  End Image section -->

           <!-- Start Image section -->
           <div class="col-md-4">
             
           </div>
          <!--  End Image section -->

        </div>
        <!-- End Row -->
       </div> 
       <!-- // End Model Body /// -->
      
    </div>
  </div>
</div>
    <!-- ///////////////// End Modal design ///////////////// -->


    <!-- //////// product modal display with ajax //////// -->
    <script>
      // setting CSRF token in head section //
      $.ajaxSetup({
        headers:({
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        })
      })

      //// function to get product and Service data ////
      function salonView(id){
          // alert(id)
          $.ajax({
            type: 'GET',
            url: '/product/view/modal/'+id,
            dataType: 'json',
            success: function(data){
              // console.log(data);
              $('#pname').text(data.salon.product_name_en);
              $('#pimage').attr('src','/'+data.salon.product_mainImg);
              $('#serv_name').text(data.service.service_name_en);
              $('#service_id').val(id);

              // if(data.discount == 'No Discount'){
              //   $('#show_discount').hide();
              // }
              // else{
              //   $('#show_discount').show();
              //   $('#discount').text(data.discount);
              // }

              if(data.discount == 'No Discount'){
                $('#old_price').text('');
                $('#serv_price').text(data.service_price);
              }
              else{
                $('#serv_price').text(data.discount);
                $('#old_price').text(data.service_price, "Rs");

              }
            }
          })
      }
      ///// End  function to get product and Service data ////

      /////// Start add to cart function //////
       function addToCart(){
         var salon_name = $('#pname').text();
         var service_name = $('#serv_name').text();
         var service_id = $('#service_id').val();

         var service_price = $('#serv_price').val();
         var salon_img = $('#pimage').attr('src');
         $.ajax({
              type:  "POST",
              datatype: 'json',
              data:{
                salon_name:salon_name,
                service_name:service_name,
                service_price:service_price,
                salon_img:salon_img
              },
              url: "/cart/data/store"+service_id,
              success:function(data){
                $('#closeModal').click();
                //  console.log(data);

                /// start sweet alert function ///
                const Toast =  Swal.mixin({
                  toast : true,
                  position: 'top-end',
                  
                  showConfirmButton: false,
                  timer: 3000
                })

                if($.isEmptyObject(data.error)){
                  Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success
                  })
                }
                else{
                  Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error
                  })
                }
                /// end sweet alert function //
              }   //// end success function   
          })
       }
      ////// end add to cart function ////////
    </script>
    <!-- //////// End product modal display with ajax //////// -->

<!-- //////// Cart Content read with ajax //////// -->
    <script>
      function readCart(){
        $.ajax({
          type: 'GET',
          url: '/read/service/cart',
          dataType: 'json',
          success:function(response){
            console.log(response)
          }
        })
      }
    </script>
    <!-- //////// End Cart Content read with ajax //////// -->

    <!-- //////// Add To WishList function with ajax /////// -->
    <script>
       function addWishList(id){
         $.ajax({
           type: 'POST',
           url: '/add/wish/list/'+id,
           success:function(response){
             console.log(response)
              /// start sweet alert function ///
              const Toast =  Swal.mixin({
                  toast : true,
                  position: 'top-end',
                  
                  showConfirmButton: false,
                  timer: 3000
                })

                if($.isEmptyObject(data.error)){
                  Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success
                  })
                }
                else{
                  Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error
                  })
                }
                /// end sweet alert function //
           }
         })
       }
    </script>
      <!-- //////// End Add To WishList function with ajax /////// -->

        <!-- ////////Load My cart function with ajax /////// -->
        <script>
          function Cart(){
            $.ajax({
              type: 'GET',
              url: 'user/mycart/get/ajax',
              dataType: 'json',
              success:function(response){

                $('span[id="cartQty"]').text(response.cartQty);
                $('span[id="subtotal"]').text(response.cartTotal);
                $('span[id="grandtotal"]').text(response.cartTotal);
                 var rows = ""
                 $.each(response.carts, function(key,value){

                  rows += ` <div class="body-content outer-top-xs">
                        <div class="container">
                          <div class="row ">
                            <div class="shopping-cart">
                              <div class="shopping-cart-table ">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th class="cart-romove item">Remove</th>
                                <th class="cart-description item">Image</th>
                                <th class="cart-product-name item">Salon Name</th>
                                <th class="cart-qty item">Service</th>
                                <th class="cart-qty item">price</th>
                                <th class="cart-sub-total item">Subtotal</th>
                                <th class="cart-total last-item"> </th>
                              </tr>
                            </thead><!-- /thead -->
                            <tbody>
                              <tr>
                                <td class="romove-item"><a href="#" title="cancel" id="${value.rowId}" onclick="cartRemove(this.id)"  class="icon"><i class="fa fa-trash-o"></i></a></td>
                                <td class="cart-image">
                                  <a class="entry-thumbnail" href="detail.html">
                                      <img src="${value.options.image}" alt="" style="width: 100px; height:100px;">
                                  </a>
                                </td>
                                <td class="cart-product-name-info">
                                  <h4 class='cart-product-description'><a href="detail.html">${value.name}</a></h4>
                                  <!--<div class="row">
                                    <div class="col-sm-4">
                                      <div class="rating rateit-small"></div>
                                    </div>
                                    <div class="col-sm-8">
                                      <div class="reviews">
                                        (06 Reviews)
                                      </div>
                                    </div>
                                  </div> /.row 
                                  <div class="cart-product-info">
                                      <span class="product-color">COLOR:<span>Blue</span></span>
                                  </div>-->
                                </td>
                                 <td class="cart-product-edit"><a href="#" class="product-edit">${value.options.service}</a></td>
                                 <td class="cart-product-edit"><a href="#" class="product-edit">${value.price}</a></td>
                                <!--<td class="cart-product-quantity">
                                  <div class="quant-input">
                                              
                                              <input type="number" value="1">
                                          </div>
                                      </td>-->
                                <td class="cart-product-sub-total"><span class="cart-sub-total-price">${value.subtotal}</span></td>
                                <td class="cart-product-grand-total">
                                <input type="button" name="" id="" class="btn btn-primary" value="Appointmnet" onclick="appointmentView()">
                                </td>
                              </tr>
                              
                            </tbody><!-- /tbody -->
                          </table><!-- /table -->
                        </div>
                      </div><!-- /.shopping-cart-table -->				

                     
                      </div><!-- /.shopping-cart -->
                      </div> <!-- /.row -->
                      </div><!-- /.container -->
                      </div><!-- /.body-content -->
                  
                      `
                 }); /// End $.each function /////
                 $('#mycart').html(rows);
              } /// end success function ///
            }) // End $.ajax ////
          }   // End Function cart() ///
          
          Cart();


          ///// Cart remove function //////
          function cartRemove(rowId){
            $.ajax({
              type: 'GET',
              url: 'user/cart/remove/'+rowId,
              dataType: 'json',
              success:function(data){
                Cart();
                 /// start sweet alert function ///
                 const Toast =  Swal.mixin({
                  toast : true,
                  position: 'top-end',
                  
                  showConfirmButton: false,
                  timer: 3000
                })

                if($.isEmptyObject(data.error)){
                  Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success
                  })
                }
                else{
                  Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error
                  })
                }
                /// end sweet alert function //
              }
            })
          } ///// end Cart remove function //////
        </script>
         <!-- //////// End Load My cart function with ajax /////// -->

         <!-- //////// Add Review with Ajax /////// -->

      <script>
         function addReview(){
         var product_id = $('#product_id').val();
         var summary = $('#summary').val();
         var comment = $('#comment').val();
         var service_id = $('#service_id').val();
         var rating = $('.quality:checked').val();
         
         $.ajax({
              type:  "POST",
              datatype: 'json',
              data:{
                product_id:product_id,
                summary:summary,
                comment:comment,
                service_id:service_id,
                rating:rating
              },
              url: "/review/add",
              success:function(data){
              
                /// start sweet alert function ///
                const Toast =  Swal.mixin({
                  toast : true,
                  position: 'top-end',
                  
                  showConfirmButton: false,
                  timer: 3000
                })

                if($.isEmptyObject(data.error)){
                  Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success
                  })
                }
                else{
                  Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error
                  })
                }
                /// end sweet alert function //
              }   //// end success function   
          })
       }
      ////// end   Add Review with Ajax /////// --> ////////
    </script>
<!-- ///////// Add Appointment ///////// -->
<script>
         function existappointment(){
         var product_id = $('#product_id').val();
         var date_app = $('#dateinp').val();
         var time_app = $('#timeinp').val();
         var service_id = $('#service_id').val();
         var price = $('#priceinp').val();
         
        
         $.ajax({
              type:  "POST",
              datatype: 'json',
              // data:{
              //   product_id:product_id,
              //   date_app:date_app,
              //   time_app:time_app,
              //   service_id:service_id,
              //   price:price,
              // },
              url: "/appointment/store",
              success:function(data){
                $('#error_msg').text(data.error_mgs);
                /// start sweet alert function ///
                const Toast =  Swal.mixin({
                  toast : true,
                  position: 'top-end',
                  
                  showConfirmButton: false,
                  timer: 4000
                })

                if($.isEmptyObject(data.error)){
                  Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success
                  })
                }
                else{
                  Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error
                  })
                }
                /// end sweet alert function //
              }   //// end success function   
          })
       }
      ////// end   Add Review with Ajax /////// --> ////////
    </script>
     <!-- ////////// ADVance Search Script /////////////// -->
     <script>
      const site_url = "http://127.0.0.1:8000/";
            $("body").on("keyup","#search", function(){
              
                let text = $("#search").val();
                  console.log(text);
                if (text.length>0) {
                    $.ajax({
                    data:{search:text},
                    url: site_url+ "advance-search",
                    method: "POST",
                    beforSend: function(request){
                      return request.setRequestHeader('X-CSRF-Token',("meta[name='csrf-token']"))
                    },
                    success:function(result){
                      $("#searchView").html(result);
                    }
                  });
                }

                if (text.length<1) {
                  $("#searchView").html("");
                }
                
            });
   </script>
   <script>
     function search_result_show(){
      $("#searchView").slideDown(); 
     }
     function search_result_hide(){
      $("#searchView").slideUp(); 
     }
   </script>        
   

</body>
</html>
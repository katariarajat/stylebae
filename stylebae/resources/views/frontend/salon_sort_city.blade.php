@extends('frontend.master')
 <!-- Start footer part -->
@section('title')
  {{$city}}-Salons
@endsection
<link rel="stylesheet" href="{{asset('frontend/css/all_male_salon.css')}}"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<style>
  .checked {
  color: orange;
}
.page{
  position: relative;
  left: -200px;
}
.col-4{
  position: relative;
  left: 100px;
  float: right;
}
.mob_view{
  display: none;
}
@media screen and (max-width: 480px) {
 
 #desktop_view{
     display: none !important;
 }
 .mob_view{
     display: block;
     max-width: 90%;
     margin: auto;
     margin-top: -30px;
 }
 #rating{
   margin-top: .5rem;
 }
 #rating .rev_count{
   font-size: .8rem !important;
   position: relative;
   left: 8rem;
   top: -1rem;
 }
 
 .box-title{
   font-size: 1rem !important;
 }
 #img_container img{
   max-height: 50% !important;
   margin-left: 1rem;
 }
 #rating .fa-star{
   max-width: .2rem !important;
 }
 #serv_continer{
   border: none !important;
 }
 .box-body{
   padding: .5rem;
 }
 
}

</style>
@section('main')
<main>

<!-- ////////// Mobile View /////////////  -->
<div class="mob_view">
  
@foreach($salons as $salon)
 @if($salon->status == 1)
 
<div class="box">  <!-- ///////// Start Box /////// -->
 
  <form action="{{ route('detail.salon')}}" method="post">
     @csrf
      <input type="hidden" name="id" id="" value="{{$salon->id}}">
      <div class="box-header with-border"> <!-- ///////// Start Box header /////// -->
          <h4 class="box-title" style="float:left; padding:5px;">
            <strong>
            @if(session()->get('language') == 'hindi')
            {{$salon->product_name_hin}}
                @else
                {{$salon->product_name_en}}
                @endif
              

            </strong>
          </h4>
          
         <!-- <p class="right"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$salon->product_address}} </p> -->
    </div> <!-- ///////// End Box header /////// -->
   <!-- ///////// Start Box body /////// -->
   <div class="box-body">
        <!-- Start Row -->
        @php
            $reviewCount = App\Models\Review::where('product_id',$salon->id)->where('status',1)->latest()->get();

            $averagerating = App\Models\Review::where('product_id',$salon->id)->where('status',1)->avg('rating');
       @endphp
       <div class="row" id="rating">
       @if($averagerating == 0 )
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span> 
                            @elseif($averagerating == 1 || $averagerating < 2 )
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span> 

                            @elseif($averagerating == 2 || $averagerating < 3 )
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star  checked"></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span> 

                            @elseif($averagerating == 3 || $averagerating < 4 )
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span> 

                            @elseif($averagerating == 4 || $averagerating < 5 )
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span> 

                            @elseif($averagerating == 5 || $averagerating < 5 )
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked "></span>
                            <span class="fa fa-star checked"></span> 
                        @endif


                    <span style="float:right" class="rev_count"> ({{count($reviewCount)}})Review</span>
       </div>
       <div class="row" id="img_container">
       <img src="{{asset($salon->product_mainImg)}}" alt="" style="padding-left: 5px;">
       </div>
       <div class="row" style="margin-top: .5rem;">
          <h4 style="font-size: 1rem;">City: {{$salon->city}}</h4>
       </div>
      
       

          <div class="box-footer text-right">
    @if(session()->get('language') == 'hindi')
    <input type="submit" class="btn btn-rounded btn-primary" value="और जानकारी">
    @else
    <input type="submit" class="btn btn-rounded btn-primary" value="More Info">
   @endif
    </div>

       </div>
   </div> 
  </form>        
</div>        
@endif
@endforeach
<div class="page" style="position: relative; left: 50px; width: 300px">
  <ul>
    {{$salons->links('vendor.pagination.bootstrap-4')}}
  </ul>
</div>
</div>

<!-- ////////// End Mobile View /////////////  -->
  
<div class="row" style="display: flex;" id="desktop_view">
  <div class="col-12">
 
  
 <div class="col-8">
  
@foreach($salons as $salon)
 @if($salon->status == 1)
 
<div class="box">  <!-- ///////// Start Box /////// -->
 
  <form action="{{ route('detail.salon')}}" method="post">
     @csrf
      <input type="hidden" name="id" id="" value="{{$salon->id}}">
      <div class="box-header with-border"> <!-- ///////// Start Box header /////// -->
          <h4 class="box-title" style="float:left; padding:5px;">
            <strong>
            @if(session()->get('language') == 'hindi')
            {{$salon->product_name_hin}}
                @else
                {{$salon->product_name_en}}
                @endif
              

            </strong>
          </h4>
          
         <!-- <p class="right"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$salon->product_address}} </p> -->
    </div> <!-- ///////// End Box header /////// -->
   <!-- ///////// Start Box body /////// -->
   <div class="box-body">
        <!-- Start Row -->
        
          <div class="row"> 
              <div class="col-6" > <!-- Start first col-->
                 <img src="{{asset($salon->product_mainImg)}}" alt="" style="padding-left: 5px;">
              </div> <!-- end first col-->
              @php
            $reviewCount = App\Models\Review::where('product_id',$salon->id)->where('status',1)->latest()->get();

            $averagerating = App\Models\Review::where('product_id',$salon->id)->where('status',1)->avg('rating');
             @endphp
                
              <div class="col-6"> <!-- Start 2nd col-->
              <div> <!-- Rating section-->
                    
                    
              @if($averagerating == 0 )
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span> 
                            @elseif($averagerating == 1 || $averagerating < 2 )
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span> 

                            @elseif($averagerating == 2 || $averagerating < 3 )
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star  checked"></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span> 

                            @elseif($averagerating == 3 || $averagerating < 4 )
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span> 

                            @elseif($averagerating == 4 || $averagerating < 5 )
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span> 

                            @elseif($averagerating == 5 || $averagerating < 5 )
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked "></span>
                            <span class="fa fa-star checked"></span> 
                        @endif


                    <span style="float:right"> ({{count($reviewCount)}})Review</span>
                </div> <!-- End Rating Section-->
                  
                 
                      <div class="">
                          <h4>City: {{$salon->city}}</h4>
                      </div>
                  

                  

              </div> <!-- end 2nd col-->

          </div> <!-- end row -->
      
    </div>
    <div class="box-footer text-right">
    @if(session()->get('language') == 'hindi')
    <input type="submit" class="btn btn-rounded btn-primary" value="और जानकारी">
    @else
    <input type="submit" class="btn btn-rounded btn-primary" value="More Info">
   @endif
    </div> <!-- ///////// End Box body /////// -->
   
  </form> <!-- ///////// End Form /////// -->
  
</div> <!-- ///////// End  Box /////// -->
@endif
@endforeach

</div><!-- End col-8 -->

<div class="page" style="float: right; width: 300px">
  <ul>
    {{$salons->links('vendor.pagination.bootstrap-4')}}
  </ul>
</div>
  </div> <!-- End col-12 -->
</div>
<!-- End row -->

    
  
</main>
@endsection


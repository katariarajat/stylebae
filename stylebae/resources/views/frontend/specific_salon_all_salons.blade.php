
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
                  

                  <div class="box"> <!-- Start 2nd box-->
                    <div class="box-header with-border">
                      <h4 class="box-title">
                      @if(session()->get('language') == 'hindi')
                          सेवाएं
                      @else
                            Services
                      @endif
                      
                      </h4>
                    </div>
                    <!-- /.box-header -->
                   
              <div class="box-body p-0">
                <div class="table-responsive">
                  <table class="table table-dark mb-0">
                    
                    <tbody>
                      
                 
                @foreach($services as $service) 
                    <tr>    
                      <td>
                      @if(session()->get('language') == 'hindi')
                      {{$salon->service_name_hin}}
                      @else
                      {{$service->service_name_en}}
                      @endif
                        
                      </td>
                    </tr>
                    @endforeach
                  
                    </tbody>
                  </table>
                </div>
               
            </div>
           
            <!-- /.box-body -->
          </div> <!-- end 2nd box-->

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

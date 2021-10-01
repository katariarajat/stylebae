@extends('frontend.master')
 <!-- Start footer part -->
 
@section('title')
  {{$detail->product_name_en}} Details
@endsection

    <link rel="stylesheet" href="{{asset('frontend/css/detail.css')}}">
    <style>
        .checked {
            color: orange;
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

        }
    </style>
@section('main')

<main>

   <!-- //////// Start Mobile View ///////// -->
   <div class="mob_view">
        @php
        $getmystaff = DB::table('staff')->where('product_id',$detail->id)->get();
        $countmystaff = count($getmystaff);

        $myreviews = DB::table('reviews')->where('product_id',$detail->id)
                
                ->latest()->limit(3)->get();
        @endphp 
        <h5>
        @if(session()->get('language') == 'hindi')
                         {{$detail->product_name_hin}}
                         @else
                         {{$detail->product_name_en}}
                               
        @endif
        </h5>
        {{$detail->product_name_hin}}
        <div class="row">

        
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" >
                        @php $i = 1; @endphp
                    @foreach($images as $img)
                            <div class="carousel-item {{$i== '1' ? 'active': ''}}" >
                                @php $i++ @endphp
                                <img src="{{asset($img->photo_name)}}" class="d-block w-100" alt="..." >
                            </div>
                            @endforeach        
                    </div>

                    <a class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </a>
            </div>
        </div>
       
        <div class="row" >
        <p >
        <i class="fa fa-map-marker" style="margin-right: 5px;"></i>  {{$detail->product_address}}
        </p>
        </div>
        <div class="row">
            <h5>Description</h5>
            <p style="max-width: 350px; display:block">
           
            <span style="max-width: 350px; display:block"> {{$detail->long_desc_en}}</span>
            </p>
        </div>
       

        <!-- Staff Section -->
           
           
        <div class="box">
            @if($countmystaff == 0)
                
             @else
                <div class="box-header">
                @if(session()->get('language') == 'hindi')
                <h6 style="float: left; margin-left:40px">स्टाफ के सदस्यों को</h6>
                         @else
                         <h6 style="float: left; margin-left:40px">Staff Members</h6>
                               
                        @endif
                   
                </div>
               @endif 
                <div class="box-body">
                    @foreach($staff as $mystaff)
                        
                  <div class="staff_img">
                        <img class="" src="{{asset($mystaff->photo)}}" alt="Card image cap">
                        
                        <h6 class="staff_name">
                        @if(session()->get('language') == 'hindi')
                        {{$mystaff->staff_member_name_hin}}
                         @else
                         {{$mystaff->staff_member_name_en}}
                               
                        @endif
                           
                        </h6>
                        <h6 class="staff_title">{{$mystaff->title}}</h6>
                       
                  </div>
                  @endforeach
            </div>
           
             <!--End Staff Section -->
       
    </div>

    <!-- Service Section -->
    <div class="row" id="service">
                
                <div class=box>
                    <div class="box-header">
                    @if(session()->get('language') == 'hindi')
                    <h4>सेवाएं</h4>          
					@else
                    <h4>Services</h4>
					@endif
                        
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-light mb-0">
                            
                                <tbody>
                                @foreach($service as $serv) 
                                <tr>    
                                <td colspan="2">
                                @if(session()->get('language') == 'hindi')
                                {{$serv->service_name_hin}}
                                @else
                                {{$serv->service_name_en}}
                               
                                @endif
                                    
                                </td>
                                <td></td>
                                <td></td>
                                <form action=" {{route('schedule.appointment')}} " method="post">
                                     @csrf
                                <td>
                                
                                @if(session()->get('language') == 'hindi')
                                <input type="submit" class="btn btn-primary" title="Appointment" value="नियुक्ति">
                                @else
                                <input type="submit" class="btn btn-primary" title="Appointment" value="Appointment">
                               
                                @endif
                                
                                   
                                    <input type="hidden" name="service_id" value="{{$serv->id}}">
                                    <input type="hidden" name="product_id" value="{{$serv->product_id}}">
     
                                </td>
                                </form>
                                </tr>
                                @endforeach
                               
                               
                            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>    
            <!-- End Service Section -->

            <!-- ///////// Review Part ////////// -->
            @if(session()->get('language') == 'hindi')
            <h5 style="margin-top: .7rem;">ग्राहक समीक्षा</h5>
                    @else
                    <h5 style="margin-top: .7rem;">Customer Review</h5>
                        
            @endif


           

                        @foreach($myreviews as $rev)
                        
                        @if($rev->status == 0)

                        @else
                        <div class="box" id="rev_rat">
        
                            <div class="box-header">
                                <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ (!empty($rev->user->profile_photo_path))?
                                        url('upload/user-images/'.$rev->user->profile_photo_path):url('upload/no_image.jpg') }}"
                                        style="width: 40px; height: 40px;" alt=""> <b></b>

                                        @if($rev->rating== 0)
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span> 
                                        @elseif($rev->rating== 1 )
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span> 

                                        @elseif($rev->rating== 2 )
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star  checked"></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span> 

                                        @elseif($rev->rating== 3 )
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span> 

                                        @elseif($rev->rating== 4 )
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span> 

                                        @elseif($rev->rating== 5 )
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked "></span>
                                        <span class="fa fa-star checked"></span> 
                                        @endif
                                </div>
                                </div>
                                <span class="summary">{{$rev->summary}}</span>
                                <span> <i class="fa fa-calendar"></i></span> {{Carbon\Carbon::parse($rev->created_at)->diffForHumans()}}
                            </div> <br>
                            <div class="box-body">
                               {{$rev->comment}}
                            </div>
                          
                        </div>
                        @endif
                        @endforeach
            <!-- /////////// End review Part /////// -->
    
    </div>
    <!-- //////// End Mobile View ///////// -->

   

    <!-- //// Main Row Start /////// -->
   <div class="row" id="desktop_view">
         <!--/////////// Images Part ///////////// -->
         <div class="col-5">
             <!--//////// Start main Image/////// -->
            <div class="main_img" style="position: relative;"> 
               <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" >
                        @php $i = 1; @endphp
                    @foreach($images as $img)
                            <div class="carousel-item {{$i== '1' ? 'active': ''}}" >
                                @php $i++ @endphp
                                <img src="{{asset($img->photo_name)}}" class="d-block w-100" alt="..." >
                            </div>
                            @endforeach        
                    </div>

                    <a class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div> 
             <!--////////  End main Image/////// -->
           

            <!-- Service Section -->
            <div class="row" id="service">
                
                <div class=box>
                    <div class="box-header">
                    @if(session()->get('language') == 'hindi')
                    <h4>सेवाएं</h4>          
					@else
                    <h4>Services</h4>
					@endif
                        
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-light mb-0">
                            
                                <tbody>
                                @foreach($service as $service) 
                                <tr>    
                                <td colspan="2">
                                @if(session()->get('language') == 'hindi')
                                {{$service->service_name_hin}}
                                @else
                                {{$service->service_name_en}}
                               
                                @endif
                                    
                                </td>
                                <td></td>
                                <td></td>
                                <form action=" {{route('schedule.appointment')}} " method="post">
                                     @csrf
                                <td>
                                
                                @if(session()->get('language') == 'hindi')
                                <input type="submit" class="btn btn-primary" title="Appointment" value="नियुक्ति">
                                @else
                                <input type="submit" class="btn btn-primary" title="Appointment" value="Appointment">
                               
                                @endif
                                
                                   
                                    <input type="hidden" name="service_id" value="{{$service->id}}">
                                    <input type="hidden" name="product_id" value="{{$service->product_id}}">
     
                                </td>
                                </form>
                                </tr>
                                @endforeach
                               
                               
                            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>    
            <!-- End Service Section -->
                
        </div>
         <!-- //////// End  Images Part /////////// -->

         <!-- /////// Details Part //////////-->
     <div class="col-7">
            
            <div class="box">
                <div class="box-header">
                     @php
                        $reviewCount = App\Models\Review::where('product_id',$detail->id)
                        ->where('service_id',$service->id)
                        ->where('status',1)
                        ->latest()->get();

                        $averagerating = App\Models\Review::where('product_id',$detail->id)
                        ->where('service_id',$service->id)->where('status',1)->avg('rating');
                    @endphp
                    <h4>
                         @if(session()->get('language') == 'hindi')
                         {{$detail->product_name_hin}}
                         @else
                         {{$detail->product_name_en}}
                               
                        @endif
                        
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
                        <span style="float: right; font-size:large;">( {{ count($reviewCount)}} )Reviews</span>
                    </h4>
                   
                   
                </div>
            </div>

            <!-- Staff Section -->
            @php
                $getstaff = DB::table('staff')->where('product_id',$detail->id)->get();
                $countstaff = count($getstaff);
            @endphp 
           
            <div class="box">
            @if($countstaff == 0)
                
             @else
                <div class="box-header">
                @if(session()->get('language') == 'hindi')
                <h6 style="float: left; margin-left:40px">स्टाफ के सदस्यों को</h6>
                         @else
                         <h6 style="float: left; margin-left:40px">Staff Members</h6>
                               
                        @endif
                   
                </div>
               @endif 
                <div class="box-body">
                    @foreach($staff as $staff)
                        
                  <div class="staff_img">
                        <img class="" src="{{asset($staff->photo)}}" alt="Card image cap">
                        
                        <h6 class="staff_name">
                        @if(session()->get('language') == 'hindi')
                        {{$staff->staff_member_name_hin}}
                         @else
                         {{$staff->staff_member_name_en}}
                               
                        @endif
                           
                        </h6>
                        <h6 class="staff_title">{{$staff->title}}</h6>
                       
                  </div>
                  @endforeach
            </div>
           
             <!--End Staff Section -->

              <!-- Address Section -->
            <div class="box">
                     <div class="box-header">
                        <h6 style="float: left; margin-left:40px">Address</h6>
                     </div>
                     <div class="box-body">
                    
                        <p style="max-width: 350px; text-align:justify">
                        <i class="fa fa-map-marker" style="margin-right: 5px;"></i>  {{$detail->product_address}}
                        </p>
                     </div>

                 </div>
            </div>
            
             <!-- End Address Section -->

             <!-- Review and Description Section -->
     
            <div class="row" id="desc_rev_row">
                <div class="col-4">
                     @if(session()->get('language') == 'hindi')
                     <input type="button" class="btn btn-outline btn-dark" id="btn_desc" value="विवरण"> 
                     @else
                     <input type="button" class="btn btn-outline btn-dark" id="btn_desc" value="Description"> 
                               
                        @endif

                        @if(session()->get('language') == 'hindi')
                        <input type="button" class="btn btn-outline btn-dark" id="btn_rev" value="समीक्षा"> 
                     @else
                     <input type="button" class="btn btn-outline btn-dark" id="btn_rev" value="Review">
                               
                        @endif
                   
                      
                </div>
                <div class="col-8">
                     <!-- ///////////// Description Part /////////////// -->
                    <div class="rev_desc" id="desc">
                        <p style="max-width: 350px; text-align:justify"> 
                        @if(session()->get('language') == 'hindi')
                        {{$detail->long_desc_hin}}
                         @else
                         {{$detail->long_desc_en}}
                               
                        @endif
                        
                        </p>
                    </div>
                     <!-- ///////////// End Description Part /////////////// -->

                   <!-- ///////////// review Part /////////////// -->
                    <div class="rev_desc" id="rev">
                    @if(session()->get('language') == 'hindi')
                    <h5>ग्राहक समीक्षा</h5>
                         @else
                         <h5>Customer Review</h5>
                               
                        @endif
                       
                        @guest
                            <p> 
                            @if(session()->get('language') == 'hindi')
                            <b> समीक्षा जोड़ने के लिए आपको पहले लॉगिन करना होगा  </b>
                                <a href="{{route('login')}}"> यहां लॉगिन करें </a>
                              @else
                              <b> For adding review You have to login First   </b>
                                <a href="{{route('login')}}"> Login Here </a>
                               
                             @endif                                
                            </p>
                        @else
                       
                        @php
                            $reviews = App\Models\Review::where('product_id',$detail->id)
                            ->where('service_id',$service->id)
                            ->latest()->limit(3)->get();
                        @endphp

                        @foreach($reviews as $review)
                        
                        @if($review->status == 0)

                        @else
                        <div class="box" id="rev_rat">
        
                            <div class="box-header">
                                <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ (!empty($review->user->profile_photo_path))?
                                        url('upload/user-images/'.$review->user->profile_photo_path):url('upload/no_image.jpg') }}"
                                        style="width: 40px; height: 40px;" alt=""> <b>{{$review->user->name}}</b>

                                        @if($review->rating== 0)
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span> 
                                        @elseif($review->rating== 1 )
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span> 

                                        @elseif($review->rating== 2 )
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star  checked"></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span> 

                                        @elseif($review->rating== 3 )
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span> 

                                        @elseif($review->rating== 4 )
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span> 

                                        @elseif($review->rating== 5 )
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked "></span>
                                        <span class="fa fa-star checked"></span> 
                                        @endif
                                </div>
                                </div>
                                <span class="summary">{{$review->summary}}</span>
                                <span> <i class="fa fa-calendar"></i></span> {{Carbon\Carbon::parse($review->created_at)->diffForHumans()}}
                            </div> <br>
                            <div class="box-body">
                               {{$review->comment}}
                            </div>
                          
                        </div>
                        @endif
                        @endforeach
                        <!-- /////   Rating and Review //////// -->
                        <h6 style="margin-top: 10px;">Write your Own Review.</h6>
                        <!-- <form action=" {{route('add.review')}} " method="POST" > -->
                            @csrf
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cell-label">&nbsp</th>
                                            <th>1 Star</th>
                                            <th>2 Stars</th>
                                            <th>3 Stars</th>
                                            <th>4 Stars</th>
                                            <th>5 Stars</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="cell-label">Quality</td>
                                            <td><input type="radio" class="quality" name="quality"  value="1"></td>
                                            <td><input type="radio" class="quality" name="quality" value="2"></td>
                                            <td><input type="radio" class="quality" name="quality" value="3"></td>
                                            <td><input type="radio" class="quality" name="quality" value="4"></td>
                                            <td><input type="radio" class="quality" name="quality" value="5"></td>
                                        </tr>
                                    </tbody>

                                </table>
                               
                                    
                           
                            <div class="form-group">
                            <h6> Select Service Taken <span class="text-danger">*</span></h6>
                            <div class="controls">
                            @php
                             $getservices = DB::table('services')->where('product_id',$detail->id)
                                            ->where('subcategory_id',$service->subcategory_id)->latest()->get();
                             @endphp  
                            <select name="service_id" id="service_id" class="form-control">
                                    <option value="" selected disabled> Select service Taken</option>
                                @foreach($getservices as $service)
                                    <option value="{{$service->id}}"  > {{$service->service_name_en}} </option>
                                    @endforeach	
                                </select>
                                
                                @error('service_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                         </div>	
                            <input type="hidden"  name="product_id" value="{{$detail->id}}" id="product_id">
                            <!-- <input type="hidden" name="service_id" value="{{$service->id}}"> -->
                                <div class="mb-3">
                                    <label for="summary" class="form-label">Summary<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="summary" name="summary" >
                                    @error('summary')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                    </div>
                                    <div class="mb-3">
                                    <label for="review" class="form-label">Review<span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                    @error('comment')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                                <input type="submit" class="btn btn-primary" value="Submit Review" style="margin-bottom:15px;" onclick="addReview()">
                            <!-- </form> -->
                        @endguest
                            
                       
                    </div>
                     <!-- ///////////// End review Part /////////////// -->
                </div>
            </div>
            <!-- End Review and Description Section -->

        </div> 
         <!-- /////// End Details Part //////////-->  
   

 </div>  <!-- ////// End  Main Row ////////  -->


 


    
</main>
  <script src="{{asset('frontend/js/detail.js')}}"></script>
  <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61091b1baa4f826b"></script>

@endsection

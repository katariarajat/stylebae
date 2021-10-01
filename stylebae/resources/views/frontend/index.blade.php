@extends('frontend.master')
@section('title')
  Home
@endsection
@section('main')
<style>
  #searchView{
    position: absolute;
    background-color: #ffffff;
    top: 155px;
    width: 350px;
    z-index: 999;
  }
  #searchView ul{
    padding-left: 0 !important;
  }
  #searchView li{
    list-style: none;
    margin-bottom: 10px;
  }
 .mob_view{
   display: none;
 }
 
  @media screen and (max-width: 480px) {
  
  #carouselExampleCaptions,#rev_header,.salon_type,.review_container,.page{
      display: none !important;
  }
  .mob_view{
      display: block;
      max-width: 400px;
      margin: auto;
      margin-top: -30px;
  }
  .mob_view #mypage{
    display: block !important;
  }
  .mob_view .row #carouselExampleCaptions{
    max-width: 400px;
    margin: auto;
    display: block !important;
  }
  .mob_view .review_container{
    max-width: 400px;
    margin: auto;
    display: block !important;
  }
  .mob_view .review_container .card{
    max-width: 80% !important;
    margin: auto !important;
  }
  .row{
    margin-bottom: 30px;
  }
  .row h3{
    font-size: .9rem;
    margin-left: .5rem;
  }
 .row .img_container{
   margin-left: .5rem;
   width: 90%;
   margin: auto;
  }
 .row .img_container a{
    display: inline-block;
    max-width: 30% ;
    margin-right: .5rem;
  }
  .brand_img{
    max-width: 100px;
    display: inline-block !important;
    /* background-color: grey; */
    /* margin-right: .5rem; */
  }
}
#carouselExampleCaptions{
  max-width: 90%;
  margin: auto;
}
#carouselExampleCaptions img{
max-height: 500px;
}
.salon_type img{
 max-width: 200px;
}
.salon_type{
  display: flex;
max-width: 80%;
margin: auto;
margin-top: 2rem;
margin-bottom: .5rem;
position: relative;
left: 100px;
}
.salon_type a{
  margin-right: 8rem;
}
.review_container{
  display: flex;
max-width: 50%;
margin: auto;
/* border: 1px solid; */
}
.review_header{
  text-align: center;
margin-top: 5rem;
margin-bottom: 1.6rem;
}
.review{
  max-width: 200px;
text-align: justify;
margin-right: .7rem;
padding: .5rem;
border: 1px solid;
border-radius: 6px;
box-shadow: 1px 1px 3px coral;
background-color: papayawhip;
}
</style>

<main>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
   
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('frontend/img/hair3.jpg')}}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Females Hair Styling</h5>
        <p>Confort Safety And hygiens are our priority.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('frontend/img/spa2.jpg')}}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Body Massage</h5>
        <p>No Risk in our Spa Your privacy is respected.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('frontend/img/hair2.jpg')}}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Hair cutting</h5>
        <p>Dont worry our salons have the best male hair styling members.</p>
      </div>
    </div>
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="salon_type">
@foreach($salon_type as $type)
                   
  <a href="{{url('user/salon/'.$type->id.'/'.$type->subcategory_slug_en)}}"><div class="box-img"><img src="{{asset($type->image)}}" alt=""></div></a> <hr>
@endforeach        
</div>

@php
    $review = App\Models\Review::where('status',1)->paginate(2);

   
@endphp


<h3 class="review_header" id="rev_header">Customer Reviews</h3>

<div class="review_container">

@foreach($review as $rev)
  <div class="card mb-3" style="max-width: 540px; margin-right: .7rem !important;">
  
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{asset($rev->salon->product_mainImg)}}" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{$rev->salon->product_name_en}}</h5>
          <p class="card-text">{{$rev->comment}} </p>
          <p class="card-text"><small class="text-muted">{{$rev->user->name}}</small></p>
        </div>
      </div>
    </div>
    
  </div>
  @endforeach
</div>
<div class="page" style="position: relative; left: 300px; width: 300px">
  <ul>
    {{$review->links('vendor.pagination.bootstrap-4')}}
  </ul>
</div>
   
  <!-- /////////////// Mobile view /////////// -->
    <div class="mob_view">
      <div class="row">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
   
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('frontend/img/hair3.jpg')}}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Females Hair Styling</h5>
        <p>Confort Safety And hygiens are our priority.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('frontend/img/spa2.jpg')}}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Body Massage</h5>
        <p>No Risk in our Spa Your privacy is respected.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('frontend/img/hair2.jpg')}}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Hair cutting</h5>
        <p>Dont worry our salons have the best male hair styling members.</p>
      </div>
    </div>
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
      </div>


      <div class="row">
      <h3> Select Salon</h3>
        <div class="img_container">
          @foreach($salon_type as $type)
            <a href="{{url('user/salon/'.$type->id.'/'.$type->subcategory_slug_en)}}">
              <img src="{{asset($type->image)}}" style="max-width: 70px; border-radius:50%" alt="" >
            </a>
            @endforeach  
          </div>
      </div>
    
      <div class="review_container">
        <h3 class="review_header">Customer Reviews</h3>
        @foreach($review as $rev)
          <div class="card mb-3" style="margin-bottom: .5rem !important;" >
          
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{asset($rev->salon->product_mainImg)}}" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{$rev->salon->product_name_en}}</h5>
                  <p class="card-text">{{$rev->comment}} </p>
                  <p class="card-text"><small class="text-muted">{{$rev->user->name}}</small></p>
                </div>
              </div>
            </div>
            
          </div>
          @endforeach
      </div>
      <div class="page" id="mypage" style="position: relative;  width: 300px">
        <ul>
          {{$review->links('vendor.pagination.bootstrap-4')}}
        </ul>
      </div>

      <div class="row">
      <h3 style="position: relative; top:20px">Popular Brands</h3>
          <div class="img_container">
            <img src="{{asset('frontend/img/lakme2.png')}}" alt="" class="brand_img">
            <img src="{{asset('frontend/img/loreal4.png')}}" alt=""class="brand_img">
            <img src="{{asset('frontend/img/matrix3.png')}}" alt=""class="brand_img">
          </div>
      </div>
    </div>
    

  


      <!-- <div class="row">
      <h3>Services</h3>
        <div class="img_container">
          
            <a href="">
            <img src="{{asset('frontend/img/facial.png')}}" style="max-width: 70px; border-radius:50%" alt="">
            </a>
            <a href="">
        
            <img src="{{asset('frontend/img/nails.jpg')}}" style="max-width: 70px; border-radius:50%" alt="">
            </a>
            <a href="">
            <img src="{{asset('frontend/img/hairstyling.png')}}" style="max-width: 70px; border-radius:50%" alt="">
            </a>
            <a href="">
            <img src="{{asset('frontend/img/makeup.png')}}" style="max-width: 70px; border-radius:50%" alt="">
            </a>
            
          </div>
      </div> -->
    <!-- /////////////// End  Mobile view /////////// -->
    
   
</main>
@endsection

       
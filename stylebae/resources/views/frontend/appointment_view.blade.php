@extends('frontend.master')


@section('title')
 Schedule
@endsection
<link rel="stylesheet" href="{{asset('frontend/css/schedule.css')}}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
@section('main')
 
<main >

<h3> Appointment Schedule</h3>
        <div class="cal" >
        <h4 style="float: right;">{{$get_products->product_name_en}}</h4>
        
            <div class="controls">
                <input type="date" name="date_app" class="cal_input" > 
               
            </div>
         
        </div>
        <div class="time">
          <div class="morning">
            <h5>Morning</h5>
            <div class="hour" id="hour1">10:00 am</div>
            <div class="hour" id="hour2">10:30 am</div>
            <div class="hour" id="hour3">11:00 am</div>
            <div class="hour" id="hour4">11:30 am</div>
            
          </div>
          <div class="after_noon">
            <h5>After Noon</h5>
            <div class="hour" id="hour5">12:00 pm</div>
            <div class="hour" id="hour6">12:30 pm</div>
            <div class="hour" id="hour7">1:00 pm</div>
            <div class="hour" id="hour8">1:30 pm</div>
            <div class="hour" id="hour9">2:00 pm</div>
            <div class="hour" id="hour10">2:30 pm</div>
            <div class="hour" id="hour11">3:00 pm</div>
            <div class="hour" id="hour12">3:30 pm</div>
            <div class="hour" id="hour13">4:00 pm</div>
            <div class="hour" id="hour14">4:30 pm</div>
            
          </div>
          <div class="evening">
            <h5>Evening</h5>
            <div class="hour" id="hour15">5:00 pm</div>
            <div class="hour" id="hour16">5:30 pm</div>
            <div class="hour" id="hour17">6:00 pm</div>
            <div class="hour" id="hour18">6:30 pm</div>
            <div class="hour" id="hour19">7:00 pm</div>
          </div>
          <div class="choose">
            <form   action="{{route('appointment.store')}}"  method="POST" >
              @csrf
              <input type="hidden" name="product_id" value="{{$get_products->id}}">
              <div class="form-group">
                <label for=""></label>
                <input type="hidden" name="service_id" value="{{$get_services->id}}">
                <input type="text" class="form-control"   id="servinp" aria-describedby="emailHelp"  value="{{$get_services->service_name_en}}" readonly>
               
              </div>
              <div class="form-group">
                
                <input type="text" class="form-control" name="service_price" id="priceinp" value="{{$get_services->price}}" readonly>
              </div>
              <div class="form-group">
                <label for="date"> Date</label>
                <input type="text" class="form-control" name="date_app" id="dateinp" aria-describedby="emailHelp"readonly>
                <label for="date"> Time</label>
                <input type="text" class="form-control" name="time_app" id="timeinp" aria-describedby="emailHelp"readonly>
               
              </div>
              
               <input type="submit" value="Book Now" class="btn btn-primary">
            </form>

          </div>
        </div>

</main>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/f0587fae17.js" crossorigin="anonymous"></script>
        <script src="js/book.js"></script>
@endsection
@include('frontend.footer')
   
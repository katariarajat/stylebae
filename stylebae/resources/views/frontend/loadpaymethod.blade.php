@extends('frontend.master')


@section('title')
Payment Method
@endsection

@section('main')

<main>
<div class="pay_method">
<div class="row">
        <h3 style="text-align: center;">Hello, {{Auth::user()->name}} </h3>
        <h5 style="text-align: center;"> Thanks for your appointment confirmation</h5>
    </div>
            <h5 style="text-align: center;">Payment Method</h5>
             <form action="{{route('loadpayment')}}" method="post">
              @csrf
              <input type="hidden" name="product_id" id="product_id" value="{{$get_products->id}}">
              <input type="hidden" name="service_id" id="service_id" value="{{$get_services->id}}">
              <input type="hidden" name="appointment_id" id="appointment_id" value="{{$appointment_id}}">
              <input type="hidden" name="date_app" id="date" value="{{$date}}">
              <input type="hidden" name="time_app" id="time" value="{{$time}}">
              <input type="hidden" name="service_price" id="service_id" value="{{$get_services->price}}">
            <table class="table" style="width: 400px; margin:auto; margin-top:10px;">
              <thead>
                <tr>
                  
                  <th scope="col">Card <input type="radio" name="payment" id="" value="card"></th>
                  <th scope="col">After Service <input type="radio" name="payment" id="" value="cash"></th>
                </tr>
              </thead>
              <tbody>
                
                <tr>
                
                  
                  <td> <img src="{{asset('frontend/img/card.png')}}"></td>
                  <td><img src="{{asset('frontend/img/cash.png')}}"></td>
                </tr>
                <tr>
                  
                  <td colspan="2"><input type="submit" value="Continue" class="btn btn-primary" style="width: 150px; margin-left: 100px;"></td>
                  
                </tr>
                
              </tbody>
            </table>
            </form>
            

          </div>
</main>
@endsection
@extends('frontend.master')


@section('title')
 Confirm
@endsection
<style>
 

#card_pay{
  position: relative;
    top: -282px;
    left: 600;
}
#car1{
  position: relative;
  left: 15px;
}
</style>
@section('main')
<main>
   
    <div class="row">
        <div class="col-12">
            <div class="col-4">
                <div class="card" id="car1">
                    <div class="card-header">
                        Appointment Details
                    </div>
                    <div class="card-body">
                    <table class="table">
                        
                        <tbody>
                            <tr>
                            <th scope="row">Salon :</th>
                            <td>{{$get_products->product_name_en}}</td>
                           
                            </tr>
                            <tr>
                            <th scope="row">Service :</th>
                            <td>{{$get_services->service_name_en}}</td>
                            
                            </tr>
                            <tr>
                            <th scope="row">price :</th>
                            
                            <td>{{$price}}</td>
                            </tr>
                            <tr>
                            <th scope="row">Date :</th>
                            
                            <td>{{$date}}r</td>
                            </tr>
                            <tr>
                            <th scope="row">Time :</th>
                            
                            <td>{{$time}}</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>

                </div>
            </div> <!-- End 1st col-6 -->

            <div class="col-6">
                <div class="card" id="card_pay">
                    <div class="card-header">
                       Payment process
                    </div>
                    <div class="card-body">
                        <form action="{{route('cash_payment')}}" method="post" id="payment-form">

                            @csrf
                            <input type="hidden" name="appointment_id" value="{{$appointment_id}}" id="">
                            <input type="hidden" name="service_id" value="{{$get_services->id}}" id="">
                            <input type="hidden" name="product_id" value="{{$get_products->id}}" id="">
                            <input type="hidden" name="service_name" value="{{$get_services->service_name_en}}" id="">
                            <input type="hidden" name="product_name" value="{{$get_products->product_name_en}}" id="">
                            <input type="hidden" name="price" value="{{$price}}" id="">
                            <div class="form-group">
                
                              <input type="text" class="form-control" name="name" placeholder="Name" style="margin-bottom: 15px;">
                          </div>
                          <div class="form-group">
                
                              <input type="email" class="form-control" name="email" placeholder="Email"style="margin-bottom: 15px;">
                          </div>
                          <div class="form-group">
                
                              <input type="text" class="form-control" name="phone" placeholder="Phone"style="margin-bottom: 15px;">
                          </div>
                        
                        <br>
                        <button class="btn btn-primary">Submit Payment</button>
                        </form>
                    </div>

                </div>
            </div> <!-- End 1st col-6 -->

            

        </div>
        
    </div>
</main>

@endsection
@extends('frontend.master')


@section('title')
 Confirm
@endsection
<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;
  height: 40px;
  padding: 10px 12px;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}
.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
  border-color: #fa755a;
}
.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;}
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
                        <form action="{{route('stripe_payment')}}" method="post" id="payment-form">

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
                        <div class="form-row">
                            <label for="card-element">
                            Credit or debit card
                            </label>

                            <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
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

<script type="text/javascript">
    // Create a Stripe client.
var stripe = Stripe('pk_test_51JQwLJSIIXq0xXvQWyP2dpe69XMHB459caCljXI1iKlOZuGrJ3jWEjknipgh4XxpdeUwppJMtOWF02xMhE4REjOd00fu2oSsgd');
// Create an instance of Elements.
var elements = stripe.elements();
// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};
// Create an instance of the card Element.
var card = elements.create('card', {style: style});
// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});
// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});
// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);
  // Submit the form
  form.submit();
}
</script>
@endsection
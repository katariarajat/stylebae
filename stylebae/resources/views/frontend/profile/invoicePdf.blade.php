<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Invoice</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: green;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: green;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
</style>

</head>
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <h2 style="color: green; font-size: 26px;"><strong>StyleBae</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
               StyleBae Head Office
               Email:support@stylebae.com <br>
               Mob: 1245454545 <br>
               Dhaka 1207,Dhanmondi:#4 <br>
              
            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;""></table>

  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
           <strong>Name:</strong>{{$transaction->name}} <br>
           <strong>Email:</strong> {{$transaction->email}} <br>
           <strong>Phone:</strong> {{$transaction->phone}} <br>
            
           <!-- <strong>Address:</strong> Address <br>
           <strong>Post Code:</strong> Post Code -->
         </p>
        </td>
        <td>
          <p class="font">
            <h3><span style="color: green;">Invoice:</span> {{$transaction->invoice_number}}</h3>
            Payment Date: {{$transaction->payment_date}} <br>
             <!-- Delivery Date: Delivery Date <br> -->
            Payment Type : {{$transaction->payment_type}} </span>
         </p>
        </td>
    </tr>
  </table>
  <br/>
<h3>Transaction Details</h3>


  <table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">
        <!-- <th>Image</th> -->
        <th>Salon Name</th>
        <th>Service</th>
        <th>Amount</th>
        <th>Transaction id</th>
        <!-- <th>Quantity</th>
        <th>Unit Price </th> -->
        <th>Total </th>
      </tr>
    </thead>
    <tbody>

     
      <tr class="font">
        <td align="center">
        {{$transaction->salon}}
        </td>
        <td align="center">{{$transaction->service}}</td>
        <td align="center">
        INR {{$transaction->amount}}
        </td>
        <td align="center">
            @if($transaction->transaction_id =="")
                CASH
            @else    
                {{$transaction->transaction_id}}
            @endif    
        </td>
        <td align="center">INR {{$transaction->amount}}</td>
        <!-- <td align="center">qty</td> -->
        <!-- <td align="center">price Tk</td>
        <td align="center">price Tk</td> -->
      </tr>
      
    </tbody>
  </table>
  <br>
  <table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
            <h2><span style="color: green;">Subtotal:</span> INR {{$transaction->amount}}</h2>
            <h2><span style="color: green;">Total:</span> INR {{$transaction->amount}}</h2>
            {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
        </td>
    </tr>
  </table>
  <div class="thanks mt-3">
    <p>Thanks For Using Our Services..!!</p>
  </div>
  <div class="authority float-right mt-5">
      <p>-----------------------------------</p>
      <h5>Authority Signature:</h5>
    </div>
</body>
</html>
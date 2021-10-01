@extends('frontend.master')
@extends('frontend.profile.profile_master')
@section('user_main')

<div class="row">
<div class="col-6">
<div class="card">
    <div class="card-header">
        <h5>transaction Details</h5>
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <th>Transaction_id </th>
                <td>{{$transaction->transaction_id}}</td>
            </tr>
            <tr>
                <th>payment_type </th>
                <td>{{$transaction->payment_type}}</td>
            </tr>
            <tr>
                <th>payment_number </th>
                <td>{{$transaction->payment_number}}</td>
            </tr>
            <tr>
                <th>invoice_number </th>
                <td>{{$transaction->invoice_number}}</td>
            </tr>
            <tr>
                <th>amount  </th>
                <td>₹{{$transaction->amount}}</td>
            </tr>
            <tr>
                <th>payment_date  </th>
                <td>{{$transaction->payment_date}}</td>
            </tr>
            <tr>
                <th>salon  </th>
                <td>{{$transaction->salon}}</td>
            </tr>
            <tr>
                <th>service </th>
                <td>{{$transaction->service}}</td>
            </tr>

        </table>
    </div>
</div>
</div>
<div class="col-6">
    <div class="card">
        <div class="card-header">
            <h5>Customer details</h5>
        </div>
        <div class="card-body">
        <table class="table">
            <tr>
                <th>Name </th>
                <td>{{$transaction->name}}</td>
            </tr>
            <tr>
                <th>Email </th>
                <td>{{$transaction->email}}</td>
            </tr>
            <tr>
                <th>Phone Number </th>
                <td>{{$transaction->phone}}</td>
            </tr>
            
        </table> 
        </div>
    </div>

</div>
</div>



@endsection
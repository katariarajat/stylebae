@extends('frontend.master')


@section('title')
 Success transaction
@endsection

<style>
        .succ_head{
            width: 500px;
            margin: auto;
            margin-top: 60px;
           
        }
        .succ_head h3{
            text-align: center;
        }
        .succ_head img{
            margin-left: 200px;
        }
        .row .card{
            width: 500px;
            margin: auto;
            margin-top: 10px;  
        }
    </style>
@section('main')

<main>
        <div class="succ_head">
            <img src="{{asset('upload/success.png')}}" alt="" width="100px" height="100px">

            <h3>Your transaction has been successfully completed</h3>
        </div>

        <div class="row">
            <div class="card">
                <div class="card-header">Transaction details</div>
                <div class="card-body">
                    <table class="table">
                        
                        <tbody>
                            <tr>
                            <th scope="row">Transaction ID : {{$get_payment->transaction_id}}</th>
                            <td></td>
                           
                            </tr>
                            <tr>
                            <th scope="row">Customer Name : {{$get_payment->name}}</th>
                            <td></td>
                           
                            </tr>
                            <tr>
                            <th scope="row">Phone Number : {{$get_payment->phone}}</th>
                            <td></td>
                            
                            </tr>
                            <tr>
                            <th scope="row">Amount Paid : ₹{{$get_payment->amount}}</th>
                            
                            <td></td>
                            </tr>
                            <tr>
                            <th scope="row">Transaction Date : {{$get_payment->payment_date}}</th>
                            
                            <td></td>
                            </tr>
                            <tr>
                            <th scope="row">Transaction Time : {{$get_payment->created_at}}</th>
                            
                            <td></td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </main>
@endsection
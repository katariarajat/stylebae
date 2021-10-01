@extends('frontend.master')
@extends('frontend.profile.profile_master')
@section('user_main')

<div class="table-responsive">
    <table class="table">
        <tbody>
            <tr style="background-color: gray;">
                <td class="col-md-2">
                    <label for="">Date</label>
                </td>
                <td class="col-md-1">
                    <label for="">Total Amount</label>
                </td>
                <td class="col-md-2">
                    <label for="">Invoice</label>
                </td>
                <td class="col-md-2">
                    <label for="">Payment</label>
                </td>
                <td class="col-md-3">
                    <label for="">Salon</label>
                </td>
                <td class="col-md-3">
                    <label for="">Service</label>
                </td>
                <td class="col-md-3">
                    <label for="">Action</label>
                </td>
            </tr>
            @foreach($trans as $item)
            <tr>
                <td class="col-md-2">
                    <label for="">{{$item->payment_date}}</label>
                </td>
                <td class="col-md-1">
                    <label for="">₹{{$item->amount}}</label>
                </td>
                <td class="col-md-2">
                    <label for="">{{$item->invoice_number}}</label>
                </td>
                <td class="col-md-2">
                    <label for="">{{$item->payment_type}}</label>
                </td>
                <td class="col-md-3">
                    <label for="">{{$item->salon}}</label>
                </td>
                <td class="col-md-3">
                    <label for="">{{$item->service}}</label>
                </td>
                <td class="col-md-3">
                    <a href="{{url('user/payment/details/'.$item->id)}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-eye"></i> View
                    </a>
                    <a target="_blank" href="{{url('user/invoice/download/'.$item->id)}}" class="btn btn-sm btn-danger" style="margin-top: 5px;">
                        <i class="fa fa-download"></i>Invoice
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    
</div>

@endsection
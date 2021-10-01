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
                    <label for="">Time</label>
                </td>
               
                <td class="col-md-3">
               
                    <label for="">Salon/Customer</label>
                    
                </td>
                <td class="col-md-3">
                    <label for="">Service</label>
                </td>
                <td class="col-md-3">
                    <label for="">Action</label>
                </td>
            </tr>
            @foreach($appointment as $item)
            <tr>
                <td class="col-md-2">
                    <label for="">{{$item->date_app}}</label>
                </td>
                <td class="col-md-1">
                    <label for="">₹{{$item->price}}</label>
                </td>
                <td class="col-md-2">
                    <label for="">{{$item->time_app}}</label>
                </td>
               
                <td class="col-md-3">
                    @if($item->salon->user==Auth::user()->name)
                    <label for="">{{$item->user->name}}</label>
                    @else
                   
                    <label for="">{{$item->salon->product_name_en}}</label>
                    @endif
                    
                </td>
                <td class="col-md-3">
                    <label for="">{{$item->service->service_name_en}}</label>
                </td>
                <td class="col-md-3">
                @if($item->date_app < Carbon\Carbon::now()->format('d-m-Y'))
                <a  href="{{url('user/app/delete/'.$item->id)}}" id="delete" class="btn btn-sm btn-danger" style="margin-top: 5px;">
                        Delete
                    </a>
                    @else
                   
                    <a href="{{url('user/app/cancel/'.$item->id)}}" id="cancel" class="btn btn-sm btn-primary">
                         Cancel
                    </a>
                    @endif
                   
                    
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    
</div>

@endsection
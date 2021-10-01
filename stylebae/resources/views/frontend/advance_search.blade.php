<style>
    button{
        background-color: white !important;
        width: 350px;
        text-align: left;
        border-style: none !important;
    }
</style>

@if($salons->isEmpty())
    <h4 class="text-center text-danger">Salon Not Found</h4>
@else
<ul>
    
    @foreach($salons as $item)
    <!-- <a href="{{url('search/'.$item->id)}}"> -->
    <form action="{{route('single-search')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="salon_id" value="{{$item->id}}" id="">
    <button type="submit">
    <li> 
        <img src="{{asset($item->product_mainImg)}}" alt="" style="width: 30px; height: 30px;"> 
        {{$item->product_name_en}} <i class="fas fa-map-marker" class="margin-left:15px"></i> {{$item->city}} 
    </li>
</button>
    </form>
    <!-- </a> -->
    @endforeach
   
</ul>
@endif


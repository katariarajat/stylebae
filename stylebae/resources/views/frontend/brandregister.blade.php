@extends('frontend.master')
@section('title')
brand Registration
@endsection
@section('main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
    .form-group{
        margin-bottom: 20px;
    }
    input[type="submit"]{
        width: 50%;
        margin-top: 15px;
        margin: auto;
    }
</style>

<main id="main">
    <div class="row">
        <div class="col-12">
            <div class="col-6" style="margin: auto;">
                <div class="card">
                    <div class="card-header">
                        Add Brand
                    </div>
                    <div class="card-body">
                        <form action="{{ route('brand.store')}}" method="post" enctype="multipart/form-data">
                                
                                @csrf
                            <input type="hidden" name="user" id="" value="{{Auth::user()->name}}">
                                <div class="form-group">
                            <h5> Salon  <span class="text-danger">*</span></h5>
                            <div class="controls">
                                
                                <select name="salon" id="" class="form-control">
                                    <option value="" selected disabled> Select Brand</option>
                                @foreach($salon as $brand)
                                    <option value="{{$brand->id}}"  > {{$brand->product_name_en}} </option>
                                    @endforeach	
                                </select>
                                
                                @error('salon')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Brand Name  <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="brand_name_en" class="form-control"  >
                                    @error('brand_name_en')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Brand Image <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="brand_image" class="form-control"  >
                                @error('brand_image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror	 
                            </div>
						</div>
                        <div class="row">
                                <input type="submit" class="btn btn-rounded btn-info" value="Add Brand"/>
                                </div>
                        </form>
                    </div>   

                </div>

            </div>

        </div>

    </div>
</main>
   
    
 
@endsection
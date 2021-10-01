
@extends('frontend.profile.profile_master')
@section('user_main')


    <div class="box" id="element-1">
        <div class="box-header with-border">
        <h4>Welcome to StyleBae <b> {{ Auth::user()->name}}</b> </h4>
        </div>
        <div class="box-body">
            <div class="logo">
                <img src="{{asset('frontend/img/logosb.png')}}" alt="" srcset="" style="border-radius:50%" >
            </div>
        
        </div>
    </div>
           
           



<script>
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>
@endsection

@extends('frontend.master')
@section('main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('frontend/css/user_profile.css')}}">
<!-- <script src="{{asset('frontend/js/user_profile.js')}}"></script> -->
<main>


        <div class="row">
       
            <div class="col-12">
                <div class="col-3">
                <div class="img_cont" style="width: 150px; height:150px; position:relative; left:35px" >
<img src="{{ (!empty($user->profile_photo_path))?url('upload/user-images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" 
                    style="border-radius:50%; width: 100%; height:100%" id="showImage" alt=""> 
</div>
                    <ul class="list-group list-group-flush"><br>
                        @php
                            $appoint = DB::table('appointments')->where('user_id',Auth::user()->id)->get();
                        @endphp
                            <a href="{{route('user_profile.edit')}}" class="btn" id="profile_update"> Profile Update</a>
                            <a href="{{route('user.passowrd.change')}}" class="btn" id="Password">Change Password</a>
                            <a href="{{route('user.appointment')}}" class="btn" id="appointment"> Appointment  </a>
                            <a href="{{route('user.transaction')}}" class="btn" id="Password">Transactions</a>
                    </ul>    
                </div>

                <div class="col-8">
               
            
                  @yield('user_main')

            
               
                 </div>
            </div>            

        </div>

    
</main>


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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script>

		$(function(){
			$(document).on('click','#cancel', function(e){
				e.preventDefault();
				var link= $(this).attr("href");

				Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, cancel it!'
				}).then((result) => {
				if (result.isConfirmed) {

					window.location.href = link
					Swal.fire(
					'Canceled!',
					'Your Appointment has been Canceled.',
					'success'
					)
				}
				})



			})
		});
	</script>
	<script>

$(function(){
	$(document).on('click','#delete', function(e){
		e.preventDefault();
		var link= $(this).attr("href");

		Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		if (result.isConfirmed) {

			window.location.href = link
			Swal.fire(
			'Deleted!',
			'Your Appointment has been Deleted.',
			'success'
			)
		}
		})



	})
});
</script>

	
@endsection

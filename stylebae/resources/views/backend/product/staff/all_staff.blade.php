@extends('backend.admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">

	<section class="content">
		<div class="row">
			<div class="col-9">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Staff List</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Salon Name</th>
										<th>Staff_name_en</th>
										<th>Staff_name_hin</th>
                                        <th>Title</th>
										<th>Photo</th>
										<th>Action</th>
										
									</tr>
								</thead>
								<tbody>
									@foreach($staff as $sta)
									<tr>
                                        <td>{{$sta->salon->product_name_en}}</td>
										<td>{{$sta->staff_member_name_en}}</td>
										<td>{{$sta->staff_member_name_hin}}</td>
                                        <td>{{$sta->title}}</td>
                                        <td><img src="{{asset($sta->photo)}}" alt=""></td>
										
										<td style="width:20%;">
											<a href="{{ route('staff.edit',$sta->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
											<a href="{{ route('staff.delete',$sta->id)}}" class="btn btn-danger" title="Delete" id="delete"><i class="fa fa-trash"></i></a>
										</td>
										
									</tr>
									@endforeach
								</tbody>
							
						</table>
						</div>

					</div>
				</div>
			</div> 
			


			<!-- Add service -->
			<div class="col-3">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title"> Add Staff </h3>
					</div>
					<div class="box-body">
						<form action="{{ route('staff.store')}}" method="post" enctype="multipart/form-data">
							
							@csrf
							<div class="form-group">
									<h5> Salon Name <span class="text-danger">*</span></h5>
									<div class="controls">
										
										<select name="product_id" id="" class="form-control">
											<option value="" selected disabled> Select Salon</option>
										@foreach($salon as $sal)
											<option value="{{$sal->id}}">{{$sal->product_name_en}}</option>
											@endforeach	
										</select>
										
										 @error('product_id')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror
									</div>
							</div>	
                            <div class="form-group">
																		
                                    <h5> Staff Name English <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="staff_member_name_en" class="form-control"  >
										@error('staff_member_name_en')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror
									</div>
										
										
							</div>	
							<div class="form-group">
                            <h5> Staff Name Hindi <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="staff_member_name_hin" class="form-control"  >
										@error('staff_member_name_hin')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror
									</div>
							</div>	
							
                            <div class="form-group">
									<h5>Title <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="title" class="form-control"  >
										@error('title')
										 	<span class="text-danger">{{$message}}</span>
										 @enderror	 
									</div>
							</div>
                            <div class="form-group">
                                    <h5>Photo<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="photo" class="form-control"> 
                                        @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror

                                        
                                    </div>
							    </div>
							
							<input type="submit" class="btn btn-rounded btn-info" value="Add Staff">
						</form>
					</div>
				</div>
			

		</div>
		
	</section>
			
</div>

 <script>
	 $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/product/service/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        // var d =$('select[name="subsubcategory_id"]').html(' ');
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });


        
    });
</script>


@endsection
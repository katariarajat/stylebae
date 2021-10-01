@extends('backend.admin.admin_master')
@section('admin')



<div class="container-full">

	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Transactions List</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Amount</th>
                                        <th>Salon</th>
										<th>Service</th>
										<th>Date Payment</th>
                                        <th>Payment Method</th>
										<th>Payment Id</th>
                                        <th>Transaction Id</th>
                                        
										
									</tr>
								</thead>
								<tbody>
									@foreach($trans as $item)
									<tr>
										<td>
											{{$item->name}}
										</td>
										<td>{{$item->email}}</td>
										<td>{{$item->phone}}</td>
                                        <td>{{$item->amount}}</td>
										<td>{{$item->salon}}</td>
                                        <td>{{$item->service}}</td>
										<td>{{$item->payment_date }}</td>
                                        <td>{{$item->payment_type}}</td>
                                        <td>{{$item->payment_number}}</td>
										<td>{{$item->transaction_id}}</td>
                                        
                                    
										
									</tr>
									@endforeach
								</tbody>
							
						</table>
						</div>

					</div>
				</div>
			</div> 
			


			
			
			

		</div>
		
	</section>
			
</div>



@endsection
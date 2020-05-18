@extends('layout')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Thông Tin Tài Khoản Của Bạn</p>
							<div class="form-one">
								<table border="1"  style="text-align: center;">
								@foreach($customer_account as $values)
								<thead>
									<th>Tên Người dùng </th> 
									<th>Email </th> 
									<th>Số Điện Thoại </th>  
								</thead>
								<tbody>
									<td>{{$values->customer_name}}</td>
									<td>{{$values->customer_email}}</td>
									<td>{{$values->customer_phone}}</td>
								</tbody>
								
								@endforeach
								</table>
							</div>
							
						</div>
					</div>
		</div>
	</section><!--/form-->
@endsection
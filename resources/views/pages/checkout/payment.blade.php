@extends('layout')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang Chủ</a></li>
				  <li class="active">Thanh Toán Giỏ Hàng</li>
				</ol>
			</div><!--/breadcrums-->

			
		

			
			<div class="review-payment">
				<h2>Xem Lại Giỏ hàng</h2>
				<div class="table-responsive cart_info">
				
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Mô tả</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
							
							$content = Cart::getContent();
								//echo '<pre>';
								//print_r($content);
								//echo '/<pre>';
							
						?>
						@foreach($content as $v_content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->attributes->image)}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content->name}}</a></h4>
								<p>{{$v_content->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($v_content->price)}} VNĐ</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form method="POST" action="{{URL::to('quantity-update')}}">
										{{ csrf_field() }}
									
									<input type="submit" class="cart_quantity_down" name="quantity_down" value=" - ">
									<input type="hidden" name="productid" value="{{$v_content->id}}">
									<input  type="text" name="cart_quantity" value="{{$v_content->quantity}}" size="1" disabled="true">
									<input type="submit" class="cart_quantity_up" name="quantity_up" value=" +">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
								<?php
								$subtotal = $v_content->price * $v_content->quantity;
								echo number_format($subtotal).' '.'VNĐ';
								?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('Del-Cart/'.$v_content->id)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>

						@endforeach
					</tbody>
				</table>
			</div>
			</div>

			
			<div class="payment-options">
				<h2 style="    color: #696763;font-size: 20px;font-weight: 300;">
				Chọn Hình Thức Thanh Toán</h2>
				<form method="POST" action="{{URL::to('/order-place')}}">
					{{ csrf_field() }}
					<span>
						<label><input name="payment_option" type="checkbox" value="1"> ATM</label>
					</span>
					<span>
						<label><input name="payment_option" type="checkbox" value="2"> Tiền Mặt</label>
					</span>
					<span>
						<input type="submit" name="send_order_place" value="Đặt Hàng" class="btn btn-primary btn-sm">
					</span>
					
				</form>
				</div>
		</div>
	</section> <!--/#cart_items-->
@endsection
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

			
			
			<div class="register-req">
				<p>Đăng ký tài khoản và đăng nhập để thanh toán giỏ hàng</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					{{-- <div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form>
								<input type="text" placeholder="Display Name">
								<input type="text" placeholder="User Name">
								<input type="password" placeholder="Password">
								<input type="password" placeholder="Confirm password">
							</form>
							<a class="btn btn-primary" href="">Get Quotes</a>
							<a class="btn btn-primary" href="">Continue</a>
						</div>
					</div> --}}
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Thông Tin Người Nhận</p>
							<div class="form-one">
								<form method="POST" action="{{URL::to('/save-checkout-customer')}}">
									{{ csrf_field() }}
									<input type="text" name="shipping_email" placeholder="Email *">
									<input type="text" name="shipping_name" placeholder="Name *">
									<input type="text" name="shipping_address" placeholder="Địa chỉ *">
									<input type="text" name="shipping_phone" placeholder="Số Điện Thoại *">
									<textarea name="shipping_note"  placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>
									<input type="submit" name="send_order" value="Gửi" class="btn btn-primary btn-sm">
								</form>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->
@endsection
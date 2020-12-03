@extends('layout2')
@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Xem lại giỏ hàng</h2>
			</div>
			
			<div class="table-responsive cart_info">
				<?php
					$content = Cart::content();
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $key => $value)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('public/uploads/product/'.$value->options->image)}}" width="50" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$value->name}}</a></h4>
								<p>ID sản phẩm: {{$value->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($value->price)}} VNĐ</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('/update-cart-quantity')}}">
									{{ csrf_field() }}
									<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$value->qty}}" size="2">
									<input type="text" value="{{$value->rowId}}" name="rowId_cart" hidden="">
									<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm"></button>
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{ number_format($value->price * $value->qty)}} VNĐ</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$value->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<h4 style="margin: 40px 0;">Chọn hình thức thanh toán</h4>
			<form action="{{URL::to('/order-place')}}" method="post" >
				{{csrf_field()}}
				
			
			<div class="payment-options">
				<span>
					<label><input name="payment_option" type="checkbox" value="1"> Thanh toán bằng ATM</label>
				</span>
				<span>
					<label><input name="payment_option" type="checkbox" value="2"> Thanh toán khi nhận hàng</label>
				</span>
				<span>
					<label><input name="payment_option" type="checkbox" value="3"> Thanh toán thẻ ghi nợ</label>
				</span>
				<span>
					<input type="submit" style="margin: auto" value="Đặt hàng" name="send_order" class="btn btn-primary">
				</span>
			</div>


			</form>
		</div>
	</section> <!--/#cart_items-->
@endsection
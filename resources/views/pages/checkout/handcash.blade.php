@extends('layout2')
@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Đặt hàng thành công</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Chúc mừng bạn đã đặt hàng thành công, chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất !</h2>
			</div>

		</div>
	</section> <!--/#cart_items-->
@endsection
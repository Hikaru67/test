@extends('layout2')
@section('content')

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập tài khoản</h2>
						<?php 
							$message = Session::get('message');
							if($message){
								echo '<span class="text-alert">'.$message.'</span>';
								Session::put('message', null);
							}
						?>	
						<form action="{{URL::to('/login-customer')}}" method="post">
							{{csrf_field()}}
							<input type="text" name="customer_username" placeholder="Tài khoản" />
							<input type="password" name="customer_password" placeholder="Mật khẩu" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Ghi nhớ đăng nhập
							</span>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Người dùng mới!</h2>
						<form action="{{URL::to('/add-customer')}}" method="post">
							{{csrf_field()}}
							<input type="text" name="customer_username" placeholder="Tên tài khoản"/>
							<input type="password" name="customer_password" placeholder="Mật khẩu"/>
							<input type="text" name="customer_name" placeholder="Họ và tên"/>
							<input type="email" name="customer_email" placeholder="Email Address"/>
							<input type="text" name="customer_phone" placeholder="sđt"/>
							<button type="submit" class="btn btn-default">Đăng ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection
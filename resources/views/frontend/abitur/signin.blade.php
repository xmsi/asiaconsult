@extends('frontend.layouts.index')
@section('content')
			<section class="modal login container-fluid">
				<div class="content col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12">
					<x-modalbtn/>
					<div class="content-part">
						<form action="" method="">
							<div class="input">
								<span>Логин</span>
								<input type="text" name="user_name" placeholder="Имя" required />
							</div>
							<div class="input">
								<span>Пароль</span>
								<input type="password" name="user_pass" placeholder="Пароль" required />
							</div>
							<button type="submit" class="default-btn">Войти</button>
							<a class="forgot-password" href="#!">Забыли пароль?</a>
						</form>
					</div>
				</div>
			</section>
			@endsection
@extends('frontend.layouts.index')
@section('content')
			<section class="modal forgotpass container-fluid">
				<div class="content col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12">
<x-modalbtn />
		@include('frontend.error')
					<div class="content-part">
						<p class="title">Восстановление пароля</p>
						<form action="/pwdreset_last" method="POST">
							@csrf
							<div class="input">
								<input type="hidden" name="phone" value="{{ $phone }}">
								<span>Введите новый пароль</span>
								<input type="password" name="password" placeholder="" required />
							</div>
							<div class="input">
								<span>Повторите новый пароль</span>
								<input type="password" name="password_confirmation" placeholder="" required />
							</div>
							<button type="submit" class="default-btn">Сохранить</button>
						</form>
					</div>
				</div>
			</section>
@endsection
@extends('frontend.layouts.index')
@section('content')
			<section class="modal login container-fluid">
				<div class="content col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12">
					<x-modalbtn/>
					@include('frontend.error')
					@include('frontend.success')
					<div class="content-part">
						<form action="/signin" method="POST" id="phoneform">
							@csrf
							<div class="input">
								<span>@lang('Номер телефона')</span>
								<input type="tel" class="phonenumber" name="phone" placeholder="+998 99 314 42 63" required />
							</div>
							<div class="input">
								<span>@lang('Пароль')</span>
								<input type="password" name="password" placeholder="@lang('Пароль')"required />
							</div>
							<button type="submit" class="default-btn">@lang('Войти')</button>
							<a class="forgot-password" href="/passwordreset">@lang('Забыли пароль?')</a>
						</form>
					</div>
				</div>
			</section>
			@endsection
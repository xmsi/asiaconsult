@extends('frontend.layouts.index')
@section('content')
			<section class="modal signup step-3 container-fluid">
				<div class="content col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12">
					<x-modalbtn />
					<div class="content-part">
						<form action="/worksheet" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
							@csrf
							@include('frontend.error')
							<input type="hidden" name="phone", value="{{ $phone }}">
							<div class="input w50">
								<span>@lang('Имя')</span>
								<input type="text" name="name" placeholder="Валентина" required />
							</div>
							<div class="input w50">
								<span>@lang('Фамилия')</span>
								<input type="text" name="second_name" placeholder="Лихачева" required />
							</div>
							<div class="input">
								<span>@lang('Отчесво')</span>
								<input type="text" name="father_name" placeholder="@lang('Отчесво')"/>
							</div>
							<div class="input">
								<span>@lang('Паспорт серия, номер')</span>
								<input type="text" name="passport_id" placeholder="AB7777777" required/>
							</div>
							<div class="input">
								<span>@lang('Дата выдачи паспорта')</span>
								<input type="text" class="maskdate" name="passport_date" placeholder="01.12.2001" required/>
							</div>
							<div class="input">
								<span>@lang('Место выдачи ИИБ паспорта')</span>
								<input type="text" name="passport_iib" placeholder="" required/>
							</div>
							<div class="input w50 qw">
								<span>@lang('Пароль')</span>
								<input type="password" name="password" id="password" required autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" />
								<i class="far fa-eye" id="togglePassword"></i>
							</div>
							<div class="input w50">
								<span>@lang('Повторите пароль')</span>
								<input type="password" name="password_confirmation" required autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" />
							</div>
							<div class="input">
								<span>@lang('Email')</span>
								<input type="email" name="email" placeholder="test@gmail.com" required/>
							</div>
							<div class="choose-before-app" style="padding: 0">
							<div class="documents">
							<div class="item">
								<p style="color: #828282;">@lang('Основание на скидку (сканер):')</p>
								<label for="zags">
									<input type="file" name="sale_document" id="zags" />
									<img src="/assets/icons/upload.svg" alt="upload" />
									<p style="color: #828282;" id="scan-zags">@lang('загрузить')</p>
									<!-- <img src="/assets/icons/x-close.svg" id="close-it-zags" alt=""> -->
								</label>
								<span class="progressBar">
									<div class="active zags"></div>
								</span>
								<br>
							</div>
							</div>
							</div>
							<div class="camefrom">
								<p>@lang('Откуда вы о нас узнали?')</p>
								<div class="checkboxes">
									<label for="telegram">
										<input type="checkbox" name="from_where_info" id="telegram" value="Telegram" />
										<span></span>
										<p>Telegram</p>
									</label>
									<label for="Instagram">
										<input type="checkbox" name="from_where_info" id="Instagram" value="Instagram" />
										<span></span>
										<p>Instagram</p>
									</label>
									<label for="Facebook">
										<input type="checkbox" name="from_where_info" id="Facebook" value="Facebook" />
										<span></span>
										<p>Facebook</p>
									</label>
									<label for="Телевидение">
										<input type="checkbox" name="from_where_info" id="Телевидение" value="Телевидение" />
										<span></span>
										<p>@lang('Телевидение')</p>
									</label>
									<label for="Google">
										<input type="checkbox" name="from_where_info" id="Google" value="Google" />
										<span></span>
										<p>Google</p>
									</label>
									<label for="Знакомые">
										<input type="checkbox" name="from_where_info" id="Знакомые" value="Знакомые" />
										<span></span>
										<p>@lang('Знакомые')</p>
									</label>
									<label for="Youtube">
										<input type="checkbox" name="from_where_info" id="Youtube" value="Youtube" />
										<span></span>
										<p>Youtube</p>
									</label>
									<label for="Радио">
										<input type="checkbox" name="from_where_info" id="Радио" value="Радио" />
										<span></span>
										<p>@lang('Радио')</p>
									</label>
								</div>
							</div>

							<button type="submit" class="default-btn">@lang('Зарегистрироваться')</button>
						</form>
					</div>
				</div>
			</section>
@endsection

@section('extra_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<style type="text/css">
	.qw{
		position: relative;
	}
	.qw i {
		position: absolute;
		right: 5%;
		cursor: pointer;
		bottom: 22%;
	}
</style>

@endsection

@section('extra_js')
<script type="text/javascript">
	const togglePassword = document.querySelector('#togglePassword');
	const password = document.querySelector('#password');

	togglePassword.addEventListener('click', function (e) {
	    // toggle the type attribute
	    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
	    password.setAttribute('type', type);
	    // toggle the eye slash icon
	    this.classList.toggle('fa-eye-slash');
	});

	$('.maskdate').mask('00.00.0000');

	setInterval(function () {
		if (document.getElementById("zags").files.length == 0) {
		} else {
			$(".active.zags").width("100%");
			document.getElementById("scan-zags").innerHTML = "zags.pdf";
			document.getElementById("close-it-zags").style.display = 'block';
		}
	});

	document.getElementById("close-it-zags").addEventListener('click', function () {
		$(".active.zags").width("5px");
		document.getElementById("scan-zags").innerHTML = "ЗАГРУЗИТЬ";
		document.getElementById("close-it-zags").style.display = 'none';
	});
</script>
@endsection

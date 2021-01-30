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
								<span>Имя</span>
								<input type="text" name="name" placeholder="Валентина" required />
							</div>
							<div class="input w50">
								<span>Фамилия</span>
								<input type="text" name="second_name" placeholder="Лихачева" required />
							</div>
							<div class="input">
								<span>Отчесво</span>
								<input type="text" name="father_name" placeholder="Отчесво"/>
							</div>
							<div class="input w50">
								<span>Пароль</span>
								<input type="password" name="password" required />
							</div>
							<div class="input w50">
								<span>Повторите пароль</span>
								<input type="password" name="password_confirmation" required />
							</div>

							<div class="camefrom">
								<p>Откуда вы о нас узнали?</p>
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
										<p>Телевидение</p>
									</label>
									<label for="Google">
										<input type="checkbox" name="from_where_info" id="Google" value="Google" />
										<span></span>
										<p>Google</p>
									</label>
									<label for="Знакомые">
										<input type="checkbox" name="from_where_info" id="Знакомые" value="Знакомые" />
										<span></span>
										<p>Знакомые</p>
									</label>
									<label for="Youtube">
										<input type="checkbox" name="from_where_info" id="Youtube" value="Youtube" />
										<span></span>
										<p>Youtube</p>
									</label>
									<label for="Радио">
										<input type="checkbox" name="from_where_info" id="Радио" value="Радио" />
										<span></span>
										<p>Радио</p>
									</label>
								</div>
							</div>

							<button type="submit" class="default-btn">Зарегистрироваться</button>
						</form>
					</div>
				</div>
			</section>
@endsection
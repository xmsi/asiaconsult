@extends('frontend.layouts.index')
@section('content')
			<section class="modal signup step-3 container-fluid">
				<div class="content col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12">
					<x-modalbtn />
					<div class="content-part">
						<form action="" method="">
							@csrf
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
								<input type="text" name="father_name" placeholder="Логин" required />
							</div>
							<div class="input w50">
								<span>Пароль</span>
								<input type="password" name="password" placeholder="llll333" required />
							</div>
							<div class="input w50">
								<span>Повторите пароль</span>
								<input type="password" name="password_repeat" placeholder="llll333" required />
							</div>

							<div class="camefrom">
								<p>Откуда вы о нас узнали?</p>
								<div class="checkboxes">
									<label for="telegram">
										<input type="checkbox" name="camefrom" id="telegram" value="Telegram" />
										<span></span>
										<p>Telegram</p>
									</label>
									<label for="Instagram">
										<input type="checkbox" name="camefrom" id="Instagram" value="Instagram" />
										<span></span>
										<p>Instagram</p>
									</label>
									<label for="Facebook">
										<input type="checkbox" name="camefrom" id="Facebook" value="Facebook" />
										<span></span>
										<p>Facebook</p>
									</label>
									<label for="Телевидение">
										<input type="checkbox" name="camefrom" id="Телевидение" value="Телевидение" />
										<span></span>
										<p>Телевидение</p>
									</label>
									<label for="Google">
										<input type="checkbox" name="camefrom" id="Google" value="Google" />
										<span></span>
										<p>Google</p>
									</label>
									<label for="Знакомые">
										<input type="checkbox" name="camefrom" id="Знакомые" value="Знакомые" />
										<span></span>
										<p>Знакомые</p>
									</label>
									<label for="Youtube">
										<input type="checkbox" name="camefrom" id="Youtube" value="Youtube" />
										<span></span>
										<p>Youtube</p>
									</label>
									<label for="Радио">
										<input type="checkbox" name="camefrom" id="Радио" value="Радио" />
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
@extends('frontend.layouts.index')
@section('content')
			<section class="modal signup container-fluid">
				<div class="content col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12">
					<x-modalbtn />
					<div class="content-part">
						<form action="/sms" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
							@csrf
							<div class="input">
								<span>Введите код из смс - сообщения</span>
								<input type="hidden" name="id" value="{{ $phone }}">
								<input type="number" name="sms_code" placeholder="12345" required />
							</div>
							<button type="submit" class="default-btn">Подтвердить</button>
							<div class="code-resend">
								<span>Не пришел код?</span>
								<a href="#!">Отправить еще раз</a>
							</div>
						</form>
					</div>
				</div>
			</section>
@endsection
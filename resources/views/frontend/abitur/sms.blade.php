@extends('frontend.layouts.index')
@section('content')
			<section class="modal signup container-fluid">
				<div class="content col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12">
					<x-modalbtn />
		@include('frontend.error')
					<div class="content-part">
						<form action="/sms" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
							@csrf
							<div class="input">
								<span>@lang('Введите код из смс - сообщения')</span>
								<input type="hidden" name="id" value="{{ $phone }}">
								<input type="hidden" name="pwdreset" value="{{ $pwdreset }}">
								<input type="number" name="sms_code" placeholder="12345" required />
							</div>
							<button type="submit" class="default-btn">@lang('Подтвердить')</button>
							<div class="code-resend">
								<span>@lang('Не пришел код?')</span>
								<a href="#!">@lang('Отправить еще раз')</a>
							</div>
						</form>
					</div>
				</div>
			</section>
@endsection
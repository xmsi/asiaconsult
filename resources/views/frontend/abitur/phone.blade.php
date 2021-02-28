@extends('frontend.layouts.index')
@section('content')
<section class="modal signup container-fluid">
	<div class="content col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12">
		<x-modalbtn />
		@include('frontend.error')
		<div class="content-part">
			<form action="/" method="POST" accept-charset="utf-8" enctype="multipart/form-data" id="phoneform">
				@csrf
				<div class="input">
					<span>@lang('Номер телефона')</span>
					<input type="tel" class="phonenumber" name="phone" placeholder="+998 99 314 42 63" required />
				</div>
				<button type="submit" class="default-btn">@lang('Отправить')</button>
			</form>
		</div>
	</div>
</section>
@endsection
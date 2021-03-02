@extends('frontend.layouts.index')
@section('content')
				<section class="cabinet choose-after-app container-fluid">
 				<div class="modal1">
 				@include('frontend.error')
 				</div>
 				
					@include('frontend.success')
				<div class="title">
					<h1>{{ getStudent()->second_name }}  {{ getStudent()->name }}</h1>
					<a href="#">+998 {{ getStudent()->phone }}</a>
				</div>

				<span class="line"></span>

				<div class="university">
					<x-univer />

<!-- 					<div class="buttons">
						<a href="#!" class="other-uni">Выбрать другой</a>
					</div>
 -->				</div>

				<div class="items_row">
					<div class="item col-xl-4 col-lg-4 col-md-4 col-sm-12">
						<div class="content">
							<p>@lang('Приказ о поступлении:')</p>
							@if(getStudent()->entrance_ref)
							<a href="/stdocs/entrance_ref/{{ getStudent()->entrance_ref }}" download>
								<img src="/assets/icons/download.svg" alt="download" />
								<span>prikaz</span>
							</a>
							@else
								<a href="#!">
									<span>@lang('Отсутствует')</span>
								</a>
							@endif
						</div>
					</div>
					<div class="item col-xl-4 col-lg-4 col-md-4 col-sm-12">
						<div class="content">
							<p>@lang('Контракт на оплату обучения:')</p>
							@if(getStudent()->university_contract)
								<a href="/stdocs/university_contract/{{ getStudent()->university_contract }}" download>
									<img src="/assets/icons/download.svg" alt="download" />
									<span>contract</span>
								</a>
							@else
								<a href="#!">
									<span>@lang('Отсутствует')</span>
								</a>
							@endif
						</div>
					</div>
					<div class="item col-xl-4 col-lg-4 col-md-4 col-sm-12">
						<div class="content">
							<p>@lang('Квитанция об оплате обучения:')</p>
							<form action="/cab/universitycontract" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
								@csrf
								<label class="upload" for="invoice" style="justify-content: center;">
									<input type="file" name="university_pay" id="invoice" required/>
									<img src="/assets/icons/upload.svg" alt="upload" />
									<p id="scan-invoice">@lang('Загрузить')</p>
									<!-- <img src="/assets/icons/x-close.svg" id="close-it-invoice" alt=""> -->
								</label>
						<span class="progressBar" style="margin-left: auto;margin-right: auto;">
							<div class="active zero"></div>
						</span>

								<button>@lang('Отправить')</button>
							</form>
						</div>
					</div>
				</div>

				<div class="documents">
<!-- 					<div class="item">
						<p>Сканнер диплома (аттестата):</p>
						<a href="/stdocs/diplom/{{ getStudent()->diplom }}" class="uploaded" download>
							<img src="/assets/icons/upload.svg" alt="upload" />
							<p>diplom</p>
						</a>
					</div> -->
					<div class="item">
						<p>@lang('Скан паспорта:')</p>
						<a href="/stdocs/passport/{{ getStudent()->passport }}" class="uploaded" download>
							<img src="/assets/icons/upload.svg" alt="upload" />
							<p>pasport</p>
						</a>
					</div>
				</div>
			</section>
@endsection

@section('extra_js')
<script>
	$('form').submit(function(e){
		if( $(this).hasClass('form-submitted') ){
			e.preventDefault();
			return;
		}
		$(this).addClass('form-submitted');
	});


	setInterval(function () {
		if (document.getElementById("invoice").files.length == 0) {
		} else {
			$(".active.zero").width("100%");
			document.getElementById("scan-invoice").innerHTML = "invoice.pdf";
			document.getElementById("close-it-invoice").style.display = 'block';
		}
	}, 500);
	document.getElementById("close-it-invoice").addEventListener('click', function () {
		$(".active.zero").width("5px");
		document.getElementById("scan-invoice").innerHTML = "ЗАГРУЗИТЬ";
		document.getElementById("close-it-invoice").style.display = 'none';
	})
		</script>
@endsection
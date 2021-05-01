@extends('frontend.layouts.index')
@section('content')
 			<section class="cabinet choose-before-app container-fluid">
 				<div class="modal1">
 				@include('frontend.error')
 				</div>
 				
					@include('frontend.success')
				<div class="payment">
					<div class="description col-xl-6 col-lg-8 col-md-9 col-sm-8 col-12">
						<h1>{{ $student->second_name }}  {{ $student->name }}</h1>
						<a href="#">+998 {{ $student->phone }}</a>

						<p>
							@lang('Перед отправкой документов необходимо произвести оплату наших услуг и загрузить скан квитанции (если оплачиваете наличными или перечислением) или произвести онлайн - платеж на нашем сайте, в противном случае вы не сможете отправить документы. Осуществить оплату наших услуг вы можете по скаченному договору')
						</p>
					</div>
					<form action="/service_contract_file" method="POST" accept-charset="utf-8" enctype="multipart/form-data" class="buttons">
						@csrf
						<a class="download" href="/dogovor2w">
							<img src="/assets/icons/download.svg" alt="download" />
							<p>@lang('Скачать Договор')</p>
						</a>
						<label class="upload" for="invoice" href="#!">
							<input type="file" name="service_contract_file" id="invoice" required/>
							<img src="/assets/icons/upload.svg" alt="upload" />
							<p id="scan-invoice">@lang('Загрузить квитанцию об оплате')</p>
							<img src="/assets/icons/x-close.svg" id="close-it-invoice" alt="">
						</label>
						<span class="progressBar">
							<div class="active invoice"></div>
						</span>
						<button>@lang('Отправить')</button>
					</form>
				</div>

				<span class="line"></span>

				<div class="university">
					<x-univer />

<!-- 					<div class="buttons">
						<a href="/university_select" class="other-uni">Выбрать другой</a>
					</div> -->
				</div>

				<span class="line"></span>

				<form action="/cab/docs_receive" method="POST" class="documents" accept-charset="utf-8" enctype="multipart/form-data">
					@csrf
					<div class="item">
						<p>@lang('Скан паспорта:')</p>
						<label for="passport">
							<input type="file" name="passport" id="passport" required />
							<img src="/assets/icons/upload.svg" alt="upload" />
							<p id="scan-passport">@lang('загрузить')</p>
							<img src="/assets/icons/x-close.svg" id="close-it-passport" alt="">
						</label>
						<span class="progressBar">
							<div class="active passport"></div>
						</span>
					</div>
					<div class="item">
						<p>@lang('Скан диплома:')</p>
						<label for="diploma">
							<input type="file" name="diplom" id="diploma"/>
							<img src="/assets/icons/upload.svg" alt="upload" />
							<p id="scan-diploma">@lang('загрузить')</p>
							<img src="/assets/icons/x-close.svg" id="close-it-diploma" alt="">
						</label>
						<span class="progressBar">
							<div class="active diploma"></div>
						</span>
					</div>
					<div class="item">
						<p>@lang('Скан аттестата:')</p>
						<label for="attestat">
							<input type="file" name="attestat" id="attestat"/>
							<img src="/assets/icons/upload.svg" alt="upload" />
							<p id="scan-attestat">@lang('загрузить')</p>
							<!-- <img src="/assets/icons/x-close.svg" id="close-it-attestat" alt=""> -->
						</label>
						<span class="progressBar">
							<div class="active attestat"></div>
						</span>
					</div>
					<div class="item">
						<p>@lang('Скан ЗАГСа (только для замужних):')</p>
						<label for="zags">
							<input type="file" name="zags" id="zags" />
							<img src="/assets/icons/upload.svg" alt="upload" />
							<p id="scan-zags">@lang('загрузить')</p>
							<!-- <img src="/assets/icons/x-close.svg" id="close-it-zags" alt=""> -->
						</label>
						<span class="progressBar">
							<div class="active zags"></div>
						</span>
					</div>
					<div class="item">
						<p>@lang('Скан паспорта отца или матери (только для Российских вузов):')</p>
						<label for="parent_passport">
							<input type="file" name="parent_passport" id="parent_passport"/>
							<img src="/assets/icons/upload.svg" alt="upload" />
							<p id="scan-parent_passport">@lang('загрузить')</p>
						<!-- <img src="/assets/icons/x-close.svg" id="close-it-parent_passport" alt=""> -->
						</label>
						<span class="progressBar">
							<div class="active parent_passport"></div>
						</span>
					</div>
					<div class="item">
						<p>@lang('Фото (3x4) :')</p>
						<label for="image">
							<input type="file" name="image" id="image"/>
							<img src="/assets/icons/upload.svg" alt="upload" />
							<p id="scan-image">@lang('загрузить')</p>
							<!-- <img src="/assets/icons/x-close.svg" id="close-it-image" alt=""> -->
						</label>
						<span class="progressBar">
							<div class="active image"></div>
						</span>
						</label>
					</div>
					<button type="submit">@lang('Отправить')</button>
				</form>
			</section>
@endsection('content')

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
			$(".active.invoice").width("100%");
			document.getElementById("scan-invoice").innerHTML = "invoice.pdf";
			// document.getElementById("close-it-invoice").style.display = 'block';
		}
		if (document.getElementById("passport").files.length == 0) {
		} else {
			$(".active.passport").width("100%");
			document.getElementById("scan-passport").innerHTML = "passport.pdf";
			// document.getElementById("close-it-passport").style.display = 'block';
		}
		if (document.getElementById("diploma").files.length == 0) {
		} else {
			$(".active.diploma").width("100%");
			document.getElementById("scan-diploma").innerHTML = "diploma.pdf";
			// document.getElementById("close-it-diploma").style.display = 'block';
		}
		if (document.getElementById("attestat").files.length == 0) {
		} else {
			$(".active.attestat").width("100%");
			document.getElementById("scan-attestat").innerHTML = "attestat.pdf";
			// document.getElementById("close-it-attestat").style.display = 'block';
		}

		if (document.getElementById("zags").files.length == 0) {
		} else {
			$(".active.zags").width("100%");
			document.getElementById("scan-zags").innerHTML = "zags.pdf";
			// document.getElementById("close-it-zags").style.display = 'block';
		}

		if (document.getElementById("parent_passport").files.length == 0) {
		} else {
			$(".active.parent_passport").width("100%");
			document.getElementById("scan-parent_passport").innerHTML = "parent_passport.pdf";
			// document.getElementById("close-it-parent_passport").style.display = 'block';
		}

		if (document.getElementById("image").files.length == 0) {
		} else {
			$(".active.image").width("100%");
			document.getElementById("scan-image").innerHTML = "image.pdf";
			// document.getElementById("close-it-image").style.display = 'block';
		}
	}, 500);

	document.getElementById("close-it-invoice").addEventListener('click', function () {
		$(".active.invoice").width("5px");
		document.getElementById("scan-invoice").innerHTML = "ЗАГРУЗИТЬ";
		document.getElementById("close-it-invoice").style.display = 'none';
	})

	document.getElementById("close-it-passport").addEventListener('click', function () {
		$(".active.passport").width("5px");
		document.getElementById("scan-passport").innerHTML = "ЗАГРУЗИТЬ";
		document.getElementById("close-it-passport").style.display = 'none';
	})

	document.getElementById("close-it-diploma").addEventListener('click', function () {
		$(".active.diploma").width("5px");
		document.getElementById("scan-diploma").innerHTML = "ЗАГРУЗИТЬ";
		document.getElementById("close-it-diploma").style.display = 'none';
	})

	document.getElementById("close-it-attestat").addEventListener('click', function () {
		$(".active.attestat").width("5px");
		document.getElementById("scan-attestat").innerHTML = "ЗАГРУЗИТЬ";
		document.getElementById("close-it-attestat").style.display = 'none';
	})

	document.getElementById("close-it-zags").addEventListener('click', function () {
		$(".active.zags").width("5px");
		document.getElementById("scan-zags").innerHTML = "ЗАГРУЗИТЬ";
		document.getElementById("close-it-zags").style.display = 'none';
	})

	document.getElementById("close-it-parent_passport").addEventListener('click', function () {
		$(".active.parent_passport").width("5px");
		document.getElementById("scan-parent_passport").innerHTML = "ЗАГРУЗИТЬ";
		document.getElementById("close-it-parent_passport").style.display = 'none';
	})

	document.getElementById("close-it-image").addEventListener('click', function () {
		$(".active.image").width("5px");
		document.getElementById("scan-image").innerHTML = "ЗАГРУЗИТЬ";
		document.getElementById("close-it-image").style.display = 'none';
	})
		</script>
@endsection
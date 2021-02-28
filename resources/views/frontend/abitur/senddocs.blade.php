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
							@lang('Перед отправкой документов необходимо произвести оплату наших услуг и загрузить скан квитанции (если
							оплачиваете наличными или перечислением) или произвести онлайн - платеж на нашем сайте, в противном случае
							вы не сможете отправить документы. Осуществить оплату наших услуг вы можете по скаченному договору или с
							помощью <a href="#!">онлайн - платежа</a>')
						</p>
					</div>
					<form action="/service_contract_file" method="POST" accept-charset="utf-8" enctype="multipart/form-data" class="buttons">
						@csrf
						<a class="download" href="/dogovor">
							<img src="/assets/icons/download.svg" alt="download" />
							<p>@lang('Скачать Договор')</p>
						</a>
						<label class="upload" for="invoice" href="#!">
							<input type="file" name="service_contract_file" id="invoice" required/>
							<img src="/assets/icons/upload.svg" alt="upload" />
							<p id="scan-invoice">@lang('Загрузить Квитанцию об оплате')</p>
							<img src="/assets/icons/x-close.svg" id="close-it-invoice" alt="">
						</label>
						<span class="progressBar">
							<div class="active zero"></div>
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
							<p>@lang('загрузить')</p>
						</label>
					</div>
					<div class="item">
						<p>@lang('Скан диплома:')</p>
						<label for="diploma">
							<input type="file" name="diplom" id="diploma"/>
							<img src="/assets/icons/upload.svg" alt="upload" />
							<p>@lang('загрузить')</p>
						</label>
					</div>
					<div class="item">
						<p>@lang('Скан аттестата:')</p>
						<label for="attestat">
							<input type="file" name="attestat" id="attestat"/>
							<img src="/assets/icons/upload.svg" alt="upload" />
							<p>@lang('загрузить')</p>
						</label>
					</div>
					<div class="item">
						<p>@lang('Скан ЗАГСа (только для замужних):')</p>
						<label for="zags">
							<input type="file" name="zags" id="zags" />
							<img src="/assets/icons/upload.svg" alt="upload" />
							<p>@lang('загрузить')</p>
						</label>
					</div>
					<div class="item">
						<p>@lang('Скан паспорта отца или матери (только для Российских вузов):')</p>
						<label for="parent_passport">
							<input type="file" name="parent_passport" id="parent_passport"/>
							<img src="/assets/icons/upload.svg" alt="upload" />
							<p>@lang('загрузить')</p>
						</label>
					</div>
					<div class="item">
						<p>@lang('Фото (3x4) :')</p>
						<label for="image">
							<input type="file" name="image" id="image" required/>
							<img src="/assets/icons/upload.svg" alt="upload" />
							<p>@lang('загрузить')</p>
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
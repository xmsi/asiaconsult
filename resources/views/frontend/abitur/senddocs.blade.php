@extends('frontend.layouts.index')
@section('content')
 			<section class="cabinet choose-before-app container-fluid">
 				@include('frontend.error')
				<div class="payment">
					<div class="description col-xl-6 col-lg-8 col-md-9 col-sm-8 col-12">
						<h1>{{ $student->second_name }}  {{ $student->name }}</h1>
						<a href="#">+998 {{ $student->phone }}</a>

						<p>
							Перед отправкой документов необходимо произвести оплату наших услуг и загрузить скан квитанции (если
							оплачиваете наличными или перечислением) или произвести онлайн - платеж на нашем сайте, в противном случае
							вы не сможете отправить документы. Осуществить оплату наших услуг вы можете по скаченному договору или с
							помощью <a href="#!">онлайн - платежа</a>
						</p>
					</div>
					<form action="" method="" class="buttons">
						<a class="download" href="#!">
							<img src="/assets/icons/download.svg" alt="download" />
							<p>Скачать Договор</p>
						</a>
						<label class="upload" for="invoice" href="#!">
							<input type="file" name="aaaaaaaaaa" id="invoice" />
							<img src="/assets/icons/upload.svg" alt="upload" />
							<p>Загрузить Квитанцию об оплате</p>
						</label>
						<button>Отправить</button>
					</form>
				</div>

				<span class="line"></span>

				<div class="university">
					<x-univer />

					<div class="buttons">
						<a href="/university_select" class="other-uni">Выбрать другой</a>
					</div>
				</div>

				<span class="line"></span>

				<form action="/cab/docs_receive" method="POST" class="documents" accept-charset="utf-8" enctype="multipart/form-data">
					@csrf
					<div class="item">
						<p>Сканнер пасспорта:</p>
						<label for="diploma">
							<input type="file" name="passport" id="diploma" required />
							<img src="/assets/icons/upload.svg" alt="upload" />
							<p>загрузить</p>
						</label>
					</div>
					<div class="item">
						<p>Сканнер диплома:</p>
						<label for="passport">
							<input type="file" name="diplom" id="passport" required />
							<img src="/assets/icons/upload.svg" alt="upload" />
							<p>загрузить</p>
						</label>
					</div>
					<button type="submit" class="disabled">Отправить</button>
				</form>
			</section>
@endsection('content')
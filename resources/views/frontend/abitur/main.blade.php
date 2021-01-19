@extends('frontend.layouts.index')
@section('content')
				<section class="cabinet choose-after-app container-fluid">
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
							<p>Приказ о поступлении:</p>
							<a href="#!">
								<img src="/assets/icons/download.svg" alt="download" />
								<span>prikaz.docx</span>
							</a>
						</div>
					</div>
					<div class="item col-xl-4 col-lg-4 col-md-4 col-sm-12">
						<div class="content">
							<p>Контракт на оплату обучения:</p>
							<a href="#!">
								<span>Отсутствует</span>
							</a>
						</div>
					</div>
					<div class="item col-xl-4 col-lg-4 col-md-4 col-sm-12">
						<div class="content">
							<p>Квитанция об оплате обучения:</p>

							<label class="upload" for="invoice" href="#!">
								<input type="file" name="aaaaaaaaaa" id="invoice" />
								<img src="/assets/icons/upload.svg" alt="upload" />
								<p>Загрузить</p>
							</label>

							<button>Отправить</button>
						</div>
					</div>
				</div>

				<div class="documents">
					<div class="item">
						<p>Сканнер диплома (аттестата):</p>
						<a href="/stdocs/diplom/{{ getStudent()->diplom }}" class="uploaded" download>
							<img src="/assets/icons/upload.svg" alt="upload" />
							<p>diplom</p>
						</a>
					</div>
					<div class="item">
						<p>Сканнер паспорта:</p>
						<a href="/stdocs/passport/{{ getStudent()->passport }}" class="uploaded" download>
							<img src="/assets/icons/upload.svg" alt="upload" />
							<p>pasport</p>
						</a>
					</div>
				</div>
			</section>
@endsection
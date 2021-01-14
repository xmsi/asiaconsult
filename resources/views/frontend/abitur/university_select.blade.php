@extends('frontend.layouts.index')
@section('content')
			<section class="modal signup step-4 container-fluid">
				<div class="content col-xl-8 col-lg-10 col-md-10 col-sm-12 col-12">
					<div class="content-part">
						<h2>Выберите университет</h2>
						<span class="line"></span>
						<p>
							Заполните все необходимые поля ниже, чтобы узнать стоимость обучения, количество мест в университете и
							подать документы*
						</p>
						<form action="" method="">
							<div class="input select">
								<input class="country" type="hidden" name="country" id="country" value="Страна" required />
								<p class="selected">Страна</p>
								<ul>
									@foreach($country as $key => $value)
									<li class="inputselector" data-id="{{ $key }}">{{ $value }}</li>
									@endforeach
								</ul>
							</div>
							<div class="input select disabled">
								<input type="hidden" name="university" id="university" value="Университет" required />
								<p class="selected">Университет</p>
								<ul id="universityul">
									<li class="inputselector">University 1</li>
									<li class="inputselector">University 2</li>
									<li class="inputselector">University 3</li>
									<li class="inputselector">University 4</li>
								</ul>
							</div>
							<div class="input select disabled w50">
								<input type="hidden" name="faculty" id="faculty" value="Факультет" required />
								<p class="selected">Факультет</p>
								<ul id="facultyul">
									<li class="inputselector">Faculty 1</li>
									<li class="inputselector">Faculty 2</li>
									<li class="inputselector">Faculty 3</li>
									<li class="inputselector">Faculty 4</li>
								</ul>
							</div>
							<div class="input select disabled w50">
								<input type="hidden" name="speciality" id="speciality" value="Форма обучения" required />
								<p class="selected">Специальность</p>
								<ul id="specialityul">
									<li class="inputselector">Eduform 1</li>
									<li class="inputselector">Eduform 2</li>
									<li class="inputselector">Eduform 3</li>
									<li class="inputselector">Eduform 4</li>
								</ul>
							</div>

							<div class="input select disabled">
								<input type="hidden" name="EDUFORM" value="Форма обучения" required />
								<p class="selected">Форма обучения</p>
								<ul>
									<li class="inputselector">Eduform 1</li>
									<li class="inputselector">Eduform 2</li>
									<li class="inputselector">Eduform 3</li>
									<li class="inputselector">Eduform 4</li>
								</ul>
							</div>

							<div class="informations">
								<div class="price">
									<p class="title">Стоимость контракта в год:</p>
									<p><span id="contract">345</span> <span id="currency">USD</span></p>
									<p><span id="contractsum">1 234 500</span> сум</p>
								</div>
								<div class="place">
									<p class="title">Доступные места:</p>
									<p id="volume">24</p>
								</div>
							</div>

							<button type="submit" class="default-btn">Подать документы</button>
						</form>
					</div>
				</div>
			</section>
@endsection

@section('extra_js')
	<script>
		jQuery(document).ready(function($) {
			$("#country").bind('changing', function(event) {
				$.ajax({
					url: '/api/getu',
					type: 'POST',
					dataType: 'json',
					data: {
						_token: "{{ csrf_token() }}",
						country_id: this.value
					},
				})
				.done(function(data) {
					$("#universityul").empty();
					$.each(data, function(index, val) {
						$("#universityul").append('<li class="inputselector1" data-id="'+ index +'">'+val+'</li>');
					});
				})
				.fail(function() {
					console.log("error");
				})
				
			});
			$("#university").bind('changing', function(event) {
				$.ajax({
					url: '/api/getf',
					type: 'POST',
					dataType: 'json',
					data: {
						_token: "{{ csrf_token() }}",
						university_id: this.value
					},
				})
				.done(function(data) {
					$("#facultyul").empty();
					$.each(data, function(index, val) {
						$("#facultyul").append('<li class="inputselector1" data-id="'+ index +'">'+val+'</li>');
					});
				})
				.fail(function() {
					console.log("error");
				})
				
			});

			$("#faculty").bind('changing', function(event) {
				$.ajax({
					url: '/api/getd',
					type: 'POST',
					dataType: 'json',
					data: {
						_token: "{{ csrf_token() }}",
						faculty_id: this.value
					},
				})
				.done(function(data) {
					$('#volume').text(data[0].volume);
					$.each(data, function(val){
						$('#currency').text(val.currency);
						$('#contract').text(val.contract);
					});
				})
				.fail(function() {
					console.log("error");
				})
				
			});
			
		});
	</script>
@endsection
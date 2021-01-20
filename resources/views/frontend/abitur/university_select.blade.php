@extends('frontend.layouts.index')
@section('content')
			<section class="modal signup step-4 container-fluid">
				<div class="content col-xl-8 col-lg-10 col-md-10 col-sm-12 col-12">
					<div class="content-part">
						<h2>Выберите университет</h2>
						<span class="line"></span>
						@include('frontend.error')
						<p>
							Заполните все необходимые поля ниже, чтобы узнать стоимость обучения, количество мест в университете и
							подать документы*
						</p>
						<form action="/university_selected" method="POST">
							@csrf
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
								<p class="selected" id="universityp" data-name="Университет">Университет</p>
								<ul id="universityul">
									<li class="inputselector">University 1</li>
									<li class="inputselector">University 2</li>
									<li class="inputselector">University 3</li>
									<li class="inputselector">University 4</li>
								</ul>
							</div>
							<div class="input select disabled w50">
								<input type="hidden" name="faculty" id="faculty" value="Факультет" required />
								<p class="selected" data-name="Факультет">Факультет</p>
								<ul id="facultyul">
									<li class="inputselector">Faculty 1</li>
									<li class="inputselector">Faculty 2</li>
									<li class="inputselector">Faculty 3</li>
									<li class="inputselector">Faculty 4</li>
								</ul>
							</div>
							<div class="input select disabled w50">
								<input type="hidden" name="speciality" id="speciality" value="Специальность" required />
								<p class="selected" data-name="Специальность">Специальность</p>
								<ul id="specialityul">
									<li class="inputselector">Eduform 1</li>
									<li class="inputselector">Eduform 2</li>
									<li class="inputselector">Eduform 3</li>
									<li class="inputselector">Eduform 4</li>
								</ul>
							</div>

							<div class="input select disabled">
								<input type="hidden" name="formatype" id="formatype" value="Форма обучения" required />
								<p class="selected" data-name="Форма обучения">Форма обучения</p>
								<ul id="formatypeul">
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
					$("#universityul").prev().text(function(){
						return $(this).data('name');
					});

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
					$("#facultyul").prev().text(function(){
						return $(this).data('name');
					});
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
					$('#volume').text(data[0].faculty.volume);
					console.log(data);
					$("#specialityul").empty();
					$("#specialityul").prev().text(function(){
						return $(this).data('name');
					});
					$.each(data, function(index, val){
						$("#specialityul").append('<li class="inputselector1" data-id="'+ val.id +'">'+val.name+'</li>');
					});
				})
				.fail(function() {
					console.log("error");
				})
				
			});

			$("#speciality").bind('changing', function(event) {
				$.ajax({
					url: '/api/gets',
					type: 'POST',
					dataType: 'json',
					data: {
						_token: "{{ csrf_token() }}",
						speciality_id: this.value
					},
				})
				.done(function(data) {
					$("#currency").text(data.faculty.university.country.currency);
					$("#contract").text(data.contract);
					$("#formatypeul").empty();
					$("#formatypeul").prev().text(function(){
						return $(this).data('name');
					});
					check_dropdown(data.weekend_time, 'По выходным', 4);
					check_dropdown(data.night_time, 'Вечернее', 3);
					check_dropdown(data.online, 'Онлайн', 2);
					check_dropdown(data.part_time, 'Заочное', 1);
					check_dropdown(data.full_time, 'Очное', 0);


				})
				.fail(function() {
					console.log("error");
				})
				
			});
			
			function check_dropdown(status, name, orig){
				if(status == 1){
					$("#formatypeul").append('<li class="inputselector1" data-id="'+ orig +'">'+name+'</li>');
				}
			}

		});
	</script>
@endsection
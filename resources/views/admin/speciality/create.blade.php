@extends('admin.layouts.index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Создать</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		@include('error')
		<form action="/admin/speciality" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="title">Название</label>
				<input type="text" name="name" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="country">Университет</label>
				<div class="input-group mb-3">
					<select id="university" class="form-control" required>
						<option value="">Выбрать вуз......</option>
						@foreach($universities as $value => $key)
							<option value="{{ $value }}">{{ $key }}</option>
						@endforeach
					</select>
				</div>	
			</div> 
			<div class="form-group">
				<label for="country">Факультеты</label>
				<div class="input-group mb-3">
					<select name="faculty_id" id="faculty" class="form-control" required>
						<option value="">Выбрать......</option>
					</select>
				</div>	
			</div> 
			<div class="form-group">
				<label for="title">Контракт</label>
				<input type="text" name="contract" class="form-control" required>
				<small class="form-text text-muted">в валюте страны где находится университет</small>
			</div>
			<div class="form-group">
				<label for="title">Консалтинговые услуги</label>
				<input type="text" name="service_sum" class="form-control" required>
				<small class="form-text text-muted">в суммах</small>
			</div>
			<div class="form-group">
				<label for="title">Консалтинговые услуги (словами)</label>
				<input type="text" name="service_sum_name" class="form-control">
			</div>
			<h4>Какие типы обучения поддерживает специальность</h4>
			<div class="form-check">
				<input type="checkbox" name="online" class="form-check-input" id="exampleCheck1" value="1">
				<label class="form-check-label" for="exampleCheck1">Online</label>
			</div>	
			<div class="form-check">
				<input type="checkbox" name="full_time" class="form-check-input" id="exampleCheck2" value="1">
				<label class="form-check-label" for="exampleCheck2">Очное</label>
			</div>
			<div class="form-check">
				<input type="checkbox" name="part_time" class="form-check-input" id="exampleCheck3" value="1">
				<label class="form-check-label" for="exampleCheck3">Заочное</label>
			</div>
			<div class="form-check">
				<input type="checkbox" name="weekend_time" class="form-check-input" id="exampleCheck4" value="1">
				<label class="form-check-label" for="exampleCheck4">По выходным</label>
			</div>
			<div class="form-check">
				<input type="checkbox" name="night_time" class="form-check-input" id="exampleCheck5" value="1">
				<label class="form-check-label" for="exampleCheck5">Вечернее</label>
			</div>
			<br>
			<div class="form-group">
				<label for="status">Статус</label>
				<div class="input-group mb-3">
					<select name="status" id="status" class="form-control" required>
						<option value="1">Прием документов</option>
						<option value="0">Закрыть прием</option>
					</select>
				</div>	
			</div> 
			<button type="submit" class="btn btn-primary" value="0" name="btncreate">Создать</button>
			<button type="submit" class="btn btn-success" value="1" name="btncreate">Создать еще</button>
		</form>
	</div>
</div>
@endsection

@section('extra_js')
	<script>
		jQuery(document).ready(function($) {
			$("#university").on('change', function(event) {
				$.ajax({
					url: '/admin/speciality/faculty',
					type: 'POST',
					dataType: 'json',
					data: {
						_token: "{{ csrf_token() }}",
						university_id: this.value
					},
				})
				.done(function(data) {
					$("#faculty").empty();
					$("#faculty").append(new Option('Выбрать...', ''));
					$.each(data, function(index, val) {
						$("#faculty").append(new Option(val, index));
					});
				})
				.fail(function() {
					console.log("error");
				})
				
			});
		});
	</script>
@endsection
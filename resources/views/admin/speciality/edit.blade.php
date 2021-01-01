@extends('admin.layouts.index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Изменить</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		@include('error')
		<form action="{{ route('speciality.update', $speciality->id) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="title">Название</label>
				<input type="text" name="name" value="{{ $speciality->name }}" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="country">Факультет</label>
				<div class="input-group mb-3">
					<select name="faculty_id" id="country" class="form-control" required>
						<option value="">Выбрать ......</option>
						@foreach($faculty as $value)
							<option value="{{ $value->id }}" @if($speciality->faculty_id == $value->id) selected @endif >{{ $value->name }} (вуз {{ $value->university->name }})</option>
						@endforeach
					</select>
				</div>	
			</div> 
			<div class="form-group">
				<label for="title">Контракт</label>
				<input type="text" name="contract" class="form-control" value="{{ $speciality->contract }}" required>
				<small class="form-text text-muted">в валюте страны где находится университет</small>
			</div>
			<div class="form-group">
				<label for="title">Консалтинговые услуги</label>
				<input type="text" name="service_sum" value="{{ $speciality->service_sum }}" class="form-control" required>
				<small class="form-text text-muted">в суммах</small>
			</div>
			<h4>Какие типы обучения поддерживает специальность</h4>
			<div class="form-check">
				<input type="checkbox" name="online" class="form-check-input" id="exampleCheck1" value="1" @if($speciality->online) checked @endif>
				<label class="form-check-label" for="exampleCheck1">Online</label>
			</div>	
			<div class="form-check">
				<input type="checkbox" name="full_time" class="form-check-input" id="exampleCheck2" value="1" @if($speciality->full_time) checked @endif>
				<label class="form-check-label" for="exampleCheck2">Очное</label>
			</div>
			<div class="form-check">
				<input type="checkbox" name="part_time" class="form-check-input" id="exampleCheck3" value="1" @if($speciality->part_time) checked @endif>
				<label class="form-check-label" for="exampleCheck3">Заочное</label>
			</div>
			<br>
			<div class="form-group">
				<label for="status">Статус</label>
				<div class="input-group mb-3">
					<select name="status" id="status" class="form-control" required>
					<option value="0" @if($speciality->status == 0) selected @endif>Закрыть прием</option>
					<option value="1" @if($speciality->status == 1) selected @endif>Прием документов</option>
					</select>
				</div>	
			</div> 
			<button type="submit" class="btn btn-primary">{{ __('Изменить') }}</button>
		</form>
	</div>
</div>
@endsection

@extends('admin.layouts.index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Изменить</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		@include('error')
		<form action="{{ route('universities.update', $university->id) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="title">Название</label>
				<input type="text" name="name" value="{{ $university->name }}" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="country">Страна</label>
				<div class="input-group mb-3">
					<select name="country_id" id="country" class="form-control" required>
						<option value="">Выбрать город......</option>
						@foreach($countries as $value => $key)
							<option value="{{ $value }}" @if($university->country_id == $value) selected @endif >{{ $key }}</option>
						@endforeach
					</select>
				</div>	
			</div> 
			<div class="form-group">
				<label for="description">Описание</label>
				<textarea name="description" class="form-control" id="" cols="10" rows="10">{{ $university->description }}</textarea>
			</div>
			<div class="form-group">
				<label for="date">Прием документов заканчивается</label>
				<input type="text" name="deadline" value="{{ $university->normaldeadline }}" class="form-control datepicker-here">
			</div>
			<div class="form-group">
				<label for="status">Статус</label>
				<div class="input-group mb-3">
					<select name="status" id="status" class="form-control" required>
					<option value="0" @if($university->status == 0) selected @endif>Закрыть прием</option>
					<option value="1" @if($university->status == 1) selected @endif>Прием документов</option>
					</select>
				</div>	
			</div> 
			<div class="form-group">
				<label for="title">Ссылка на информацию о вузе</label>
				<input type="text" name="link" value="{{ $university->link }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="image">Картинка</label><br>
				<input type="file" name="image">
			</div>
			<button type="submit" class="btn btn-primary">Изменить</button>
		</form>
	</div>
</div>
@endsection

@section('extra_css')
<link rel="stylesheet" href="/css/datepicker.min.css">
@endsection
@section('extra_js')

<script src="/js/datepicker.min.js"></script>

@endsection


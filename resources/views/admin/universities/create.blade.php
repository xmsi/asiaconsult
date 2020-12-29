@extends('admin.layouts.index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Создать</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		@include('error')
		<form action="/admin/universities" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="title">Название</label>
				<input type="text" name="name" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="country">Страна</label>
				<div class="input-group mb-3">
					<select name="country_id" id="country" class="form-control" required>
						<option value="">Выбрать город......</option>
						@foreach($countries as $value => $key)
							<option value="{{ $value }}">{{ $key }}</option>
						@endforeach
					</select>
				</div>	
			</div> 
			<div class="form-group">
				<label for="description">Описание</label>
				<textarea name="description" class="form-control" id="" cols="10" rows="10"></textarea>
			</div>
			<div class="form-group">
				<label for="date">Прием документов заканчивается</label>
				<input type="text" name="date" placeholder="Дата" class="form-control datepicker-here">
			</div>
			<div class="form-group">
				<label for="status">Статус</label>
				<div class="input-group mb-3">
					<select name="status" id="status" class="form-control" required>
						<option value="1">Прием документов</option>
						<option value="0">Закрыть прием</option>
					</select>
				</div>	
			</div> 
			<div class="form-group">
				<label for="title">Ссылка на информацию о вузе</label>
				<input type="text" name="link" class="form-control">
			</div>
			<div class="form-group">
				<label for="image">Картинка</label><br>
				<input type="file" name="image">
			</div>
			<button type="submit" class="btn btn-primary" value="0" name="btncreate">Создать</button>
			<button type="submit" class="btn btn-success" value="1" name="btncreate">Создать еще</button>
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
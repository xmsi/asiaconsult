@extends('admin.layouts.index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Создать</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		@include('error')
		<form action="/admin/faculty" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="title">Название</label>
				<input type="text" name="name" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="country">Университет</label>
				<div class="input-group mb-3">
					<select name="university_id" id="country" class="form-control" required>
						<option value="">Выбрать вуз......</option>
						@foreach($universities as $value => $key)
							<option value="{{ $value }}">{{ $key }}</option>
						@endforeach
					</select>
				</div>	
			</div> 
			<div class="form-group">
				<label for="title">Кол-во принимаемых студентов</label>
				<input type="number" name="volume" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="description">Описание</label>
				<textarea name="description" class="form-control" id="" cols="10" rows="10"></textarea>
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
				<label for="image">Картинка</label><br>
				<input type="file" name="image">
			</div>
			<button type="submit" class="btn btn-primary" value="0" name="btncreate">Создать</button>
			<button type="submit" class="btn btn-success" value="1" name="btncreate">Создать еще</button>
		</form>
	</div>
</div>
@endsection

@extends('admin.layouts.index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Изменить</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		@include('error')
		<form action="{{ route('faculty.update', $faculty->id) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="title">Название</label>
				<input type="text" name="name" value="{{ $faculty->name }}" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="country">Университет</label>
				<div class="input-group mb-3">
					<select name="university_id" id="country" class="form-control" required>
						<option value="">Выбрать вуз......</option>
						@foreach($universities as $value => $key)
							<option value="{{ $value }}" @if($faculty->university_id == $value) selected @endif >{{ $key }}</option>
						@endforeach
					</select>
				</div>	
			</div> 
			<div class="form-group">
				<label for="description">Описание</label>
				<textarea name="description" class="form-control" id="" cols="10" rows="10">{{ $faculty->description }}</textarea>
			</div>
			<div class="form-group">
				<label for="title">Кол-во принимаемых студентов</label>
				<input type="number" name="volume" value="{{ $faculty->volume }}" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="status">Статус</label>
				<div class="input-group mb-3">
					<select name="status" id="status" class="form-control" required>
					<option value="0" @if($faculty->status == 0) selected @endif>Закрыть прием</option>
					<option value="1" @if($faculty->status == 1) selected @endif>Прием документов</option>
					</select>
				</div>	
			</div> 
			<div class="form-group">
				<label for="image">Картинка</label><br>
				<input type="file" name="image">
			</div>
			<button type="submit" class="btn btn-primary">{{ __('Изменить') }}</button>
		</form>
	</div>
</div>
@endsection


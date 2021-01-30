@extends('admin.layouts.index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Изменить</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		@include('error')
		<form action="{{ route('filial.update', $filial->id) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="title">Нумерация</label>
				<input type="text" name="number" class="form-control"  value="{{ $filial->number }}" required>
			</div>
			<div class="form-group">
				<label for="author">Город</label>
				<input type="text" name="country" class="form-control"  value="{{ $filial->country }}" required>
			</div>
			<div class="form-group">
				<label for="description">Описание</label>
				<textarea name="description" class="form-control" id="" cols="10" rows="10">{{ $filial->description }}</textarea>
			</div>
			<button type="submit" class="btn btn-primary">Изменить</button>
		</form>
	</div>
</div>
@endsection


@extends('admin.layouts.index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Изменить</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		@include('error')
		<form action="{{ route('countries.update', $country->id) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="name">Название</label>
				<input type="text" name="name" class="form-control" value="{{ $country->name }}" required>
			</div>
			<div class="form-group">
				<label for="currency">Валюта</label>
				<input type="text" name="currency" class="form-control" value="{{ $country->currency }}" required>
			</div>
			<button type="submit" class="btn btn-primary">Изменить</button>
		</form>
	</div>
</div>
@endsection


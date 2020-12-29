@extends('admin.layouts.index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Создать</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		@include('error')
		<form action="/admin/countries" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="title">Название</label>
				<input type="text" name="name" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="author">Валюта</label>
				<input type="text" name="currency" class="form-control" required>
			</div>
			<button type="submit" class="btn btn-primary" value="0" name="btncreate">Создать</button>
			<button type="submit" class="btn btn-success" value="1" name="btncreate">Создать еще</button>
		</form>
	</div>
</div>
@endsection
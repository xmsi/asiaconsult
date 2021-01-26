@extends('admin.layouts.index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Создать</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		@include('error')
		<form action="/admin/manager" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="title">Логин (для менеджера)</label>
				<input type="text" name="login" class="form-control">
			</div>
			<div class="form-group">
				<label for="title">Пароль (для менеджера)</label>
				<input type="password" name="password" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary" value="0" name="btncreate">Создать</button>
			<button type="submit" class="btn btn-success" value="1" name="btncreate">Создать еще</button>
		</form>
	</div>
</div>
@endsection

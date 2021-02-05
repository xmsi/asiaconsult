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
				<label for="title">ФИО</label>
				<input type="text" name="name" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="description">Описание</label>
				<textarea name="description" class="form-control" id="" cols="10" rows="10"></textarea>
			</div>
			<div class="form-group">
				<label for="title">Номер телефона</label>
				<input type="text" name="phone" class="form-control" placeholder="902839954">
			</div>
			<div class="form-group">
				<label for="title">Логин</label>
				<input type="text" name="login" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="title">Пароль</label>
				<input type="password" name="password" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="status">Статус</label>
				<div class="input-group mb-3">
					<select name="status" id="status" class="form-control" required>
						<option value="1">Работает</option>
						<option value="0">Закрыть доступ</option>
					</select>
				</div>	
			</div> 
			<button type="submit" class="btn btn-primary" value="0" name="btncreate">Создать</button>
			<button type="submit" class="btn btn-success" value="1" name="btncreate">Создать еще</button>
		</form>
	</div>
</div>
@endsection

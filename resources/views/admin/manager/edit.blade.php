@extends('admin.layouts.index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Изменить</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		@include('error')
		<form action="{{ route('manager.update', $manager->id) }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="title">ФИО</label>
				<input type="text" name="name" value="{{ $manager->name }}" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="title">Номер телефона</label>
				<input type="text" name="phone" class="form-control" placeholder="902839954" value="{{ $manager->phone }}">
			</div>
			<div class="form-group">
				<label for="description">Описание</label>
				<textarea name="description" class="form-control" id="" cols="10" rows="10">{{ $manager->description }}</textarea>
			</div>
			<div class="form-group">
				<label for="title">Логин</label>
				<input type="text" name="login" value="{{ $manager->user->name }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="title">Пароль</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="form-group">
				<label for="status">Статус</label>
				<div class="input-group mb-3">
					<select name="status" id="status" class="form-control" required>
						<option value="1"  @if($manager->status == 1) selected @endif>Работает</option>
						<option value="0"  @if($manager->status == 0) selected @endif>Закрыть доступ</option>
					</select>
				</div>	
			</div> 
			<button type="submit" class="btn btn-primary">{{ __('Изменить') }}</button>
		</form>
	</div>
</div>
@endsection


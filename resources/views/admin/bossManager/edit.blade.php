@extends('admin.layouts.index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Изменить</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		@include('error')
		<form action="{{ route('bossManager.update', $bossManager->id) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="title">Имя</label>
				<input type="text" name="name" class="form-control" value="{{ $bossManager->name }}" required>
			</div>
			<div class="form-group">
				<label for="country">Филиал</label>
				<div class="input-group mb-3">
					<select name="filial_id" id="country" class="form-control" required>
						<option value="">Выбрать филиал......</option>
						@foreach($filials as $value => $key)
							<option value="{{ $value }}" @if($bossManager->filial_id == $value) selected @endif>{{ $key }}</option>
						@endforeach
					</select>
				</div>	
			</div> 
			<div class="form-group">
				<label for="description">Описание</label>
				<textarea name="description" class="form-control" id="" cols="10" rows="10">{{ $bossManager->description }}</textarea>
			</div>
			<div class="form-group">
				<label for="title">Логин</label>
				<input type="text" name="login" class="form-control" value="{{ $bossManager->user->name }}">
			</div>
			<div class="form-group">
				<label for="title">Пароль</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="form-group">
				<label for="status">Статус</label>
				<div class="input-group mb-3">
					<select name="status" id="status" class="form-control" required>
						<option value="1"  @if($bossManager->status == 1) selected @endif>Работает</option>
						<option value="0"  @if($bossManager->status == 0) selected @endif>Закрыть доступ</option>
					</select>
				</div>	
			</div> 
			<button type="submit" class="btn btn-primary">{{ __('Изменить') }}</button>
		</form>
	</div>
</div>
@endsection


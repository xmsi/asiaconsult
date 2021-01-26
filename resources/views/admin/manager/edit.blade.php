@extends('admin.layouts.index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Изменить</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		@include('error')
		<form action="{{ route('manager.update', $manager->id) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="title">Логин (для Менеджера)</label>
				<input type="text" name="login" value="{{ $manager->name }}" class="form-control">
			</div>
			<div class="form-group">
				<label for="title">Пароль (для Менеджера)</label>
				<input type="password" name="password" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary">{{ __('Изменить') }}</button>
		</form>
	</div>
</div>
@endsection


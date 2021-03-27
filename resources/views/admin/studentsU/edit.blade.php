@extends('admin.layouts.index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Изменить</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		@include('error')
		<form action="{{ route('studentsU.update', $student->id) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="comments">Коментарии</label><br>
				<input class="form-control" type="text" name="comments" value="{{ $student->comments }}">
			</div>
			<div class="form-group">
				<label for="entrance_ref">Выписка из приказа</label><br>
				<input type="file" name="entrance_ref">
			</div>

			<div class="form-group">
				<label for="university_contract">Контракт на оплату</label><br>
				<input type="file" name="university_contract">
			</div>
			<br>
			<button type="submit" class="btn btn-primary">Изменить</button>
		</form>
	</div>
</div>
@endsection

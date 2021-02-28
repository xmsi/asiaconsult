@extends('admin.layouts.index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Изменить</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		@include('error')
		<form action="{{ route('studentsT.update', $student->id) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="passport_per">Паспорт перевод</label><br>
				<input type="file" name="passport_per">
			</div><br>
			<div class="form-group">
				<label for="diplom_per">Диплом перевод</label><br>
				<input type="file" name="diplom_per">
			</div>
			<br>
			<div class="form-group">
				<label for="attestat_per">Аттестат перевод</label><br>
				<input type="file" name="attestat_per">
			</div>
			<br>
			<div class="form-group">
				<label for="zags_per">ЗАГС перевод</label><br>
				<input type="file" name="zags_per">
			</div>
			<br>
			<div class="form-group">
				<label for="parent_passport_per">Паспорт родителей перевод</label><br>
				<input type="file" name="parent_passport_per">
			</div>
			<br>
			<button type="submit" class="btn btn-primary">Изменить</button>
		</form>
	</div>
</div>
@endsection

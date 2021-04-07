@extends('admin.layouts.index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Изменить</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		@include('error')
		<form action="{{ route('studentsSh.update', $student->id) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="title">Ismi</label>
				<input type="text" name="name" value="{{ $student->name }}" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="title">Familiyasi</label>
				<input type="text" name="second_name" value="{{ $student->second_name }}" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="title">Otasini ismi</label>
				<input type="text" name="father_name" value="{{ $student->father_name }}" class="form-control" required>
			</div>			
			<div class="form-group">
				<label for="title">Passport seriya, raqami</label>
				<input type="text" name="passport_id" value="{{ $student->passport_id }}" class="form-control" required>
			</div>			
			<div class="form-group">
				<label for="title">Passport berilgan sanasi</label>
				<input type="text" name="passport_date" value="{{ $student->passport_date }}" class="form-control" required>
			</div>			
			<div class="form-group">
				<label for="title">Passport berilgan joy IIB</label>
				<input type="text" name="passport_iib" value="{{ $student->passport_iib }}" class="form-control" required>
			</div>			
			<button type="submit" class="btn btn-primary">Изменить</button>
		</form>
	</div>
</div>
@endsection

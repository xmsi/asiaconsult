@extends('admin.layouts.index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Информация</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<span class="text">
			<div class="row">
				<div class="col-md-3">
					<a href="/admin/faculty/{{ $faculty->id }}/edit"><button class="btn btn-sm btn-primary">Изменить</button></a>
				</div>
				<div class="col-md-2 offset-md-7" align="right">
					<form action="{{ route('faculty.destroy', $faculty->id) }}" method="POST">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger btn-sm">Удалить</button>
					</form>
				</div>
			</div>
		</span>
	</div>
	<div class="card-body">
		@include('success')
		<table class="table table-bordered">
			<tbody>
				<tr>
					<th scope="row">Название</th>
					<td>{{ $faculty->name }}</td>
				</tr>
				<tr>
					<th scope="row">Университет</th>
					<td>{{ $faculty->university->name }}</td>
				</tr>
				<tr>
					<th scope="row">Кол-во</th>
					<td>{{ $faculty->volume }}</td>
				</tr>
				<tr>
					<th scope="row">Статус</th>
					<td>{{ $faculty->statusn }}</td>
				</tr>
				<tr>
					<th scope="row">Описание</th>
					<td>{!! nl2br($faculty->description) !!}</td>
				</tr>
				<tr>
					<th scope="row">Картинкa</th>
					<td>	
						<img src="/images/{{ $faculty->image }}" style="max-width: 200px" alt="">
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection
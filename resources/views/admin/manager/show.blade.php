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
					<a href="/admin/manager/{{ $manager->id }}/edit"><button class="btn btn-sm btn-primary">Изменить</button></a>
				</div>
				<div class="col-md-2 offset-md-7" align="right">
					<form action="{{ route('manager.destroy', $manager->id) }}" method="POST">
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
					<th scope="row">ФИО</th>
					<td>{{ $manager->name }}</td>
				</tr>
				<tr>
					<th scope="row">Логин</th>
					<td>{{ $manager->user->name }}</td>
				</tr>
				<tr>
					<th scope="row">Описание</th>
					<td>{!! nl2br($manager->description) !!}</td>
				</tr>
				<tr>
					<th scope="row">Статус</th>
					<td>{{ $manager->statusn }}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection
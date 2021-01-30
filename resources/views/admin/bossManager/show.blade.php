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
					<a href="/admin/bossManager/{{ $bossManager->id }}/edit"><button class="btn btn-sm btn-primary">Изменить</button></a>
				</div>
			</div>
		</span>
	</div>
	<div class="card-body">
		@include('success')
		<table class="table table-bordered">
			<tbody>
				<tr>
					<th scope="row">Имя</th>
					<td>{{ $bossManager->name }}</td>
				</tr>
				<tr>
					<th scope="row">Логин</th>
					<td>{{ $bossManager->user->name }}</td>
				</tr>
				<tr>
					<th scope="row">Филиал</th>
					<td>{{ $bossManager->filial->full_name }}</td>
				</tr>
				<tr>
					<th scope="row">Статус</th>
					<td>{{ $bossManager->statusn }}</td>
				</tr>
				<tr>
					<th scope="row">Описание</th>
					<td>{!! nl2br($bossManager->description) !!}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection
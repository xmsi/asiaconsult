@extends('admin.layouts.index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Информация</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<span class="text">
			<div class="row">
				@can('isSuperadmin')
				<div class="col-md-3">
					<a href="/admin/universities/{{ $university->id }}/edit"><button class="btn btn-sm btn-primary">Изменить</button></a>
				</div>
				<div class="col-md-2 offset-md-7" align="right">
					<form action="{{ route('universities.destroy', $university->id) }}" method="POST">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger btn-sm">Удалить</button>
					</form>
				</div>
				@endcan
			</div>
		</span>
	</div>
	<div class="card-body">
		@include('success')
		<table class="table table-bordered">
			<tbody>
				<tr>
					<th scope="row">Название</th>
					<td>{{ $university->name }}</td>
				</tr>
				<tr>
					<th scope="row">Страна</th>
					<td>{{ $university->country->name }}</td>
				</tr>
				<tr>
					<th scope="row">Статус</th>
					<td>{{ $university->statusn }}</td>
				</tr>
				<tr>
					<th scope="row">Дата зыкрытия приема документов</th>
					<td>{{ $university->normaldeadline }}</td>
				</tr>
				<tr>
					<th scope="row">Описание</th>
					<td>{!! nl2br($university->description) !!}</td>
				</tr>
				<tr>
					<th scope="row">Ссылка</th>
					<td>{{ $university->link }}</td>
				</tr>
				<tr>
					<th scope="row">Картинкa</th>
					<td>	
						<img src="/images/{{ $university->image }}" style="max-width: 200px" alt="">
					</td>
				</tr>
			</tbody>
		</table>
					<form action="/admin/universities/{{$university->id}}/allstatuses/" method="post">
					@csrf
					<button class="btn btn-success">Открыть все направления</button>
				</form>
	</div>
</div>
@endsection
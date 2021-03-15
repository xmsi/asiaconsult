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
					<a href="/admin/speciality/{{ $speciality->id }}/edit"><button class="btn btn-sm btn-primary">Изменить</button></a>
				</div>
				<div class="col-md-2 offset-md-7" align="right">
					<form action="{{ route('speciality.destroy', $speciality->id) }}" method="POST">
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
					<td>{{ $speciality->name }}</td>
				</tr>
				<tr>
					<th scope="row">Университет</th>
					<td>{{ $speciality->faculty->university->name }}</td>
				</tr>
				<tr>
					<th scope="row">Факультет</th>
					<td>{{ $speciality->faculty->name }}</td>
				</tr>
				<tr>
					<th scope="row">Контракт</th>
					<td>{{ $speciality->contract }} {{ $speciality->faculty->university->country->currency }}</td>
				</tr>
				<tr>
					<th scope="row">Консалтинговые услуги</th>
					<td>{{ $speciality->service_sum }} сум</td>
				</tr>
				<tr>
					<th scope="row">Консалтинговые услуги (словами)</th>
					<td>{{ $speciality->service_sum_name }}</td>
				</tr>
				<tr>
					<th scope="row">Типы</th>
					<td>@if($speciality->online) Онлайн <br> @endif 
					@if($speciality->full_time) Очное <br> @endif 
					@if($speciality->part_time) Заочное <br> @endif 
					@if($speciality->weekend_time) По выходным <br> @endif 
					@if($speciality->night_time) Вечернее <br> @endif 
					@if($speciality->full_part) очное-заочное <br> @endif 
					@if($speciality->night_11) вечернее(для 11 классов) <br> @endif 
					@if($speciality->night_collage) вечернее(для колледжей) <br> @endif 
					@if($speciality->night_weekend_full) вечернее и выходное, очное <br> @endif 
					@if($speciality->night_weekend_part) вечернее и выходное, заочное <br> @endif </td>
				</tr>
				<tr>
					<th scope="row">Статус</th>
					<td>{{ $speciality->statusn }}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection
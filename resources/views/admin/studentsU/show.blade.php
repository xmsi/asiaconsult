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
					<a href="/admin/studentsU/{{ $student->id }}/edit"><button class="btn btn-sm btn-primary">Изменить</button></a>
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
					<td>{{ $student->name }}</td>
				</tr>
				<tr>
					<th scope="row">Фамилия</th>
					<td>{{ $student->second_name }}</td>
				</tr>
				<tr>
					<th scope="row">Отчество</th>
					<td>{{ $student->father_name }}</td>
				</tr>
				<tr>
					<th scope="row">Факультет</th>
					<td>{{ $student->speciality->faculty->name }}</td>
				</tr>
				<tr>
					<th scope="row">Специальность</th>
					<td>{{ $student->speciality->name }}</td>
				</tr>
				<tr>
					<th scope="row">Паспорт (перевод)</th>
					<td>							
						<a href="/stdocs/{{ $student->passport_per }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация" download>
                    			<i class="fas fa-download"></i> Скачать
                  			</a>
                  	</td>
				</tr>				
				<tr>
					<th scope="row">Диплом (перевод)</th>
					<td>							
						<a href="/stdocs/{{ $student->diplom_per }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация" download>
                    			<i class="fas fa-download"></i> Скачать
                  			</a>
                  	</td>
				</tr>				
				<tr>
					<th scope="row">Паспорт (оригинал)</th>
					<td>							
						<a href="/stdocs/{{ $student->passport }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация" download>
                    			<i class="fas fa-download"></i> Скачать
                  			</a>
                  	</td>
				</tr>
				<tr>
					<th scope="row">Диплом (оригинал)</th>
					<td>							
						<a href="/stdocs/{{ $student->diplom }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация" download>
                    			<i class="fas fa-download"></i> Скачать
                  			</a>
                  	</td>
				</tr>
				@if($student->entrance_ref)
				<tr>
					<th scope="row">Справка о зачислении</th>
					<td>							
						<a href="/stdocs/{{ $student->entrance_ref }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация" download>
                    			<i class="fas fa-download"></i> Скачать
                  			</a>
                  	</td>
				</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>
@endsection
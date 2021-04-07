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
					<a href="/admin/studentsT/{{ $student->id }}/edit"><button class="btn btn-sm btn-primary">Изменить</button></a>
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
					<th scope="row">Университет</th>
					<td>{{ $student->speciality->faculty->university->name }}</td>
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
					<th scope="row">Паспорт</th>
					<td>							
						<a href="/stdocs/passport/{{ $student->passport }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация" download>
                    			<i class="fas fa-download"></i> Скачать
                  			</a>
                  	</td>
				</tr>
				@if($student->diplom)				
					<tr>
						<th scope="row">Диплом</th>
						<td>							
							<a href="/stdocs/diplom/{{ $student->diplom }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация" download>
	                    			<i class="fas fa-download"></i> Скачать
	                  			</a>
	                  	</td>
					</tr>
				@endif	
				@if($student->attestat)				
					<tr>
						<th scope="row">Аттестат</th>
						<td>							
							<a href="/stdocs/attestat/{{ $student->attestat }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация" download>
	                    			<i class="fas fa-download"></i> Скачать
	                  			</a>
	                  	</td>
					</tr>
				@endif	
				@if($student->zags)				
					<tr>
						<th scope="row">ЗАГС</th>
						<td>							
							<a href="/stdocs/zags/{{ $student->zags }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация" download>
	                    			<i class="fas fa-download"></i> Скачать
	                  			</a>
	                  	</td>
					</tr>
				@endif	
				@if($student->parent_passport)				
					<tr>
						<th scope="row">Паспорт родителей</th>
						<td>							
							<a href="/stdocs/parent_passport/{{ $student->parent_passport }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация" download>
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
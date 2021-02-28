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
					<th scope="row">Номер телефона</th>
					<td>{{ '+998 '.getNormalPhone($student->phone) }}</td>
				</tr>
				<tr>
					<th scope="row">Паспорт (перевод)</th>
					<td>							
						<a href="/stdocs/passport_per/{{ $student->passport_per }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация" download>
                    			<i class="fas fa-download"></i> Скачать
                  			</a>
                  	</td>
				</tr>
				@if($student->diplom_per)				
				<tr>
					<th scope="row">Диплом (перевод)</th>
					<td>							
						<a href="/stdocs/diplom_per/{{ $student->diplom_per }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация" download>
                    			<i class="fas fa-download"></i> Скачать
                  			</a>
                  	</td>
				</tr>
				@endif		
				@if($student->attestat_per)				
				<tr>
					<th scope="row">Аттестат (перевод)</th>
					<td>							
						<a href="/stdocs/attestat_per/{{ $student->attestat_per }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация" download>
                    			<i class="fas fa-download"></i> Скачать
                  			</a>
                  	</td>
				</tr>
				@endif	
				@if($student->zags_per)				
				<tr>
					<th scope="row">ЗАГС (перевод)</th>
					<td>							
						<a href="/stdocs/zags_per/{{ $student->zags_per }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация" download>
                    			<i class="fas fa-download"></i> Скачать
                  			</a>
                  	</td>
				</tr>
				@endif	
				@if($student->parent_passport_per)				
				<tr>
					<th scope="row">Паспорт родителей (перевод)</th>
					<td>							
						<a href="/stdocs/parent_passport_per/{{ $student->parent_passport_per }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация" download>
                    			<i class="fas fa-download"></i> Скачать
                  			</a>
                  	</td>
				</tr>
				@endif	
				@if($student->passport)				
				<tr>
					<th scope="row">Паспорт</th>
					<td>							
						<a href="/stdocs/passport/{{ $student->passport }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация" download>
                    			<i class="fas fa-download"></i> Скачать
                  			</a>
                  	</td>
				</tr>
				@endif
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
				@if($student->image)				
				<tr>
					<th scope="row">Фото</th>
					<td>	
						<img src="/stdocs/image/{{ $student->image }}" style="max-width: 200px" alt="">
					</td>
				</tr>
				@endif		
<!-- 				<tr>
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
				</tr> -->
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
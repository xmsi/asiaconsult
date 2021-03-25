@extends('admin.layouts.index')

@section('extra_css')
<link href="/adminassets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
@include('success')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Студенты</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" data-order="[]" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ФИО</th>
						<th>Номер Телефона</th>
						<th>Email</th>
						<th>Факультет</th>
						<th>Направление</th>
						<th>Вид обучения</th>
						<th>Оплата контракта</th>
						<th></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>ФИО</th>
						<th>Номер Телефона</th>
						<th>Email</th>
						<th>Факультет</th>
						<th>Направление</th>
						<th>Вид обучения</th>
						<th>Оплата контракта</th>
						<th></th>
					</tr>
				</tfoot>
				<tbody>
					@foreach($faculty as $fac)
						@foreach($fac->students as $student)
						<tr @if($student->entrance_ref) class="table-success" @else class="table-danger" @endif>
							<td>{{ $student->full_name }}</td>
							<td>{{ '+998'.getNormalPhone($student->phone) }}</td>
							<td>{{ $student->user->email }}</td>
							<td>{{ $fac->name }}</td>
							<td>{{ $student->speciality->name }}</td>
							<td>{{ $student->typeN }}</td>
							<td>
				@if($student->university_pay)											
						<a href="/stdocs/university_pay/{{ $student->university_pay }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация" download>
                    			<i class="fas fa-download"></i> Скачать
                  			</a>
				@endif
							</td>
							<td>
	                  			<a href="/admin/studentsU/{{ $student->id }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация">
	                  				<i class="fas fa-info-circle"></i>
	                  			</a>
	                  			<a href="/admin/studentsU/{{ $student->id }}/edit" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Изменить">
	                  				<i class="fas fa-pen"></i>
	                  			</a>
	                  		</td>
						</tr>
					@endforeach
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('extra_js')
<!-- Page level plugins -->
<script src="/adminassets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/adminassets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/adminassets/js/demo/datatables-demo.js"></script>
@endsection
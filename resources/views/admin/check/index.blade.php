@extends('admin.layouts.index')

@section('extra_css')
<link href="/adminassets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
@include('success')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Факультеты</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
<!-- 	<div class="card-header py-3">
		<a href="/admin/student/create" class="btn btn-sm btn-success">
			<span class="text">Создать</span>
		</a>
	</div> -->
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-order='[]'>
				<thead>
					<tr>
						<th>ФИО</th>
						<th>Вуз</th>
						<th>Номер</th>
						<th>Номер Менеджера</th>
						<th>Квитанция</th>
						<th></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>ФИО</th>
						<th>Вуз</th>
						<th>Номер</th>
						<th>Номер Менеджера</th>
						<th>Квитанция</th>
						<th></th>
					</tr>
				</tfoot>
				<tbody>
					@foreach($students as $student)
					<tr @if($student->service_contract_check == 1) class="table-success" @else class="table-danger" @endif>
						<td>{{ $student->fullName }}</td>
						<td>@if($student->speciality()->exists())
							{{ $student->speciality->faculty->university->name }}
						@endif</td>
						<td>{{ $student->phone }}</td>
						<td>@if($student->manager()->exists())
							{{ $student->manager->phone }}
						@endif</td>
						<td>
							<a href="/stdocs/service_contract_file/{{ $student->service_contract_file }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Квитанция" download>
                    			<i class="fas fa-download"></i> Скачать
                  			</a>
						</td>
						<td>
							@if(!$student->service_contract_check)
							<form action="{{ route('contract_true') }}" method="POST">
                  			@csrf
                  				<input type="hidden" name="id" value="{{ $student->id }}">
                  				<button type="submit" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Правильно"><i class="fas fa-check"></i></button>
                  			</form>
                  			@endif
                  		</td>
					</tr>
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
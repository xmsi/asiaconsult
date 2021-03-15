@extends('admin.layouts.index')

@section('extra_css')
<link href="/adminassets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
@include('success')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Специальности</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<a href="/admin/speciality/create" class="btn btn-sm btn-success">
			<span class="text">Создать</span>
		</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Название</th>
						<th>Вуз</th>
						<th>Факультеты</th>
						<th>Контракт</th>
						<th></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Название</th>
						<th>Вуз</th>
						<th>Факультеты</th>
						<th>Контракт</th>
						<th></th>
					</tr>
				</tfoot>
				<tbody>
					@foreach($specialitys as $speciality)
					<tr>
						<td>{{ $speciality->name }}</td>
						<td>{{ $speciality->faculty->university->name }}</td>
						<td>{{ $speciality->faculty->name }}</td>
						<td>{{ $speciality->contract }}</td>
						<td width="120px">
							@can('isSuperadmin')
							<form action="{{ route('speciality.destroy', $speciality->id) }}" method="POST">
							<a href="/admin/speciality/{{ $speciality->id }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация">
                    			<i class="fas fa-info-circle"></i>
                  			</a>
                  			<a href="/admin/speciality/{{ $speciality->id }}/edit" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Изменить">
                  				<i class="fas fa-pen"></i>
                  			</a>
                  			@csrf
                  				@method('DELETE')
                  				<button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Удалить"><i class="fas fa-trash"></i></button>
                  			</form>
                  			@elsecan('isAdmin')
							<a href="/admin/speciality/{{ $speciality->id }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация">
                    			<i class="fas fa-info-circle"></i>
                  			</a>
                  			@endcan
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
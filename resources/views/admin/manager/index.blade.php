@extends('admin.layouts.index')

@section('extra_css')
<link href="/adminassets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
@include('success')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Менеджеры</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<a href="/admin/manager/create" class="btn btn-sm btn-success">
			<span class="text">Создать</span>
		</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Имя</th>
						<th>Номер телефона</th>
						<th>Кол-во</th>
						<th></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Имя</th>
						<th>Номер телефона</th>
						<th>Кол-во</th>
						<th></th>
					</tr>
				</tfoot>
				<tbody>
					@foreach($managers as $manager)
					<tr>
						<td>{{ $manager->name }}</td>
						<td>{{ $manager->phone }}</td>
						<td>{{ $manager->students_count }}</td>
						<td width="120px">
							<form action="{{ route('manager.destroy', $manager->id) }}" method="POST">
							<a href="/admin/manager/{{ $manager->id }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация">
                    			<i class="fas fa-info-circle"></i>
                  			</a>
                  			<a href="/admin/manager/{{ $manager->id }}/edit" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Изменить">
                  				<i class="fas fa-pen"></i>
                  			</a>
                  			@csrf
                  				@method('DELETE')
                  				<button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Удалить"><i class="fas fa-trash"></i></button>
                  			</form>
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
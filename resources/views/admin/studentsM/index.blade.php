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
	<div class="card-header py-3">
		<a href="{{ route('reg') }}" class="btn btn-success">
			<span class="text">Создать</span>
		</a>
	</div>
	<div class="card-body">
		<p>Всего {{ $students->count() }}</p>
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" data-order="[]" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Имя</th>
						<th>Фамилия</th>
						<th>Отчество</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Имя</th>
						<th>Фамилия</th>
						<th>Отчество</th>
					</tr>
				</tfoot>
				<tbody>
					@foreach($students as $student)
					<tr>
						<td>{{ $student->name }}</td>
						<td>{{ $student->second_name }}</td>
						<td>{{ $student->father_name }}</td>
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
@extends('admin.layouts.index')

@section('extra_css')
<link href="/adminassets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ __('Страны') }}</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<a href="/admin/countries/create" class="btn btn-sm btn-success">
			<span class="text">{{ __('Создать') }}</span>
		</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>{{ __('Название') }}</th>
						<th>{{ __('Валюта') }}</th>
						<th></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>{{ __('Название') }}</th>
						<th>{{ __('Валюта') }}</th>
						<th></th>
					</tr>
				</tfoot>
				<tbody>
					@foreach($countriess as $countries)
					<tr>
						<td>{{ $countries->name }}</td>
						<td>{{ $countries->currency }}</td>
						<td width="120px">
                  			<a href="/admin/countries/{{ $countries->id }}/edit" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="{{ __('Изменить') }}">
                  				<i class="fas fa-pen"></i>
                  			</a>
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
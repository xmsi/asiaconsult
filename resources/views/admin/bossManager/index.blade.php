@extends('admin.layouts.index')

@section('extra_css')
<link href="/adminassets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
@include('success')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Босс Менеджеров</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<a href="/admin/bossManager/create" class="btn btn-sm btn-success">
			<span class="text">Создать</span>
		</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Филиал</th>
						<th>Имя</th>
						<th>Описание</th>
						<th>Статус</th>
						<th></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Филиал</th>
						<th>Имя</th>
						<th>Описание</th>
						<th>Статус</th>
						<th></th>
					</tr>
				</tfoot>
				<tbody>
					@foreach($bossManagers as $bossManager)
					<tr>
						<td>{{ $bossManager->filial->full_name }}</td>
						<td>{{ $bossManager->name }}</td>
						<td>{{ $bossManager->description }}</td>
						<td>{{ $bossManager->statusn }}</td>
						<td width="120px">
							<a href="/admin/bossManager/{{ $bossManager->id }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация">
                    			<i class="fas fa-info-circle"></i>
                  			</a>
                  			<a href="/admin/bossManager/{{ $bossManager->id }}/edit" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Изменить">
                  				<i class="fas fa-pen"></i>
                  			</a>
                  			<button  type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#logoutModal{{ $bossManager->id }}" data-placement="top" title="Удалить"><i class="fas fa-trash"></i></button>
                  		</td>
					</tr>
<div class="modal fade" id="logoutModal{{ $bossManager->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Готовы удалить?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Нажмите удалить если вы действително хотите удалить запись.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Отмена</button>
          <a class="btn btn-danger" onclick="event.preventDefault();$(this).next().submit();" href="{{ route('bossManager.destroy', $bossManager->id) }}">Удалить</a>
          <form action="{{ route('bossManager.destroy', $bossManager->id) }}" method="POST" style="display: none;">
                  @csrf
				  @method('DELETE')
          </form>
        </div>
      </div>
    </div>
  </div>
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
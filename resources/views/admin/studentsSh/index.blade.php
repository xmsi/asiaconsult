@extends('admin.layouts.index')

@section('extra_css')
<link href="/adminassets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
@include('success')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Студенты</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<a href="/admin/studentsSh1/export" class="btn btn-success">
			<span class="text">Export</span>
		</a>
	</div>
	<div class="card-body" style="font-size: 13px;">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTablexel" data-order="[]" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>шартнома раками</th>
						<th>шартнома санаси</th>
						<th>Ф.И.Ш</th>
						<th>Тел раками</th>
						<th>Компания тулови</th>
						<th>Институт</th>
						<th>Мутахассислиги</th>
						<th>Ўқиш тури</th>
						<th>Таржимага берилди</th>
						<th>Таржима килинди</th>
						<th>Филиал</th>
						<th>Менеджер</th>
						<!-- <th>Диплом</th> -->
						<th></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Shartnoma raqami</th>
						<th>шартнома санаси</th>
						<th>FIO</th>
						<th>Telefon</th>
						<th>Компания тулови</th>
						<th>Universitet</th>
						<th>Mutaxassisligi</th>
						<th>Ўқиш тури</th>
						<th>Таржимага берилди</th>
						<th>Таржима килинди</th>
						<th>Филиал</th>
						<th>Менеджер</th>
						<!-- <th>Диплом</th> -->
						<th></th>
					</tr>
				</tfoot>
				<tbody>
					@foreach($students as $student)
					<tr>
						<td>{{ $student->sh_number }}</td>
						<td>{{ date('m/d/Y', strtotime($student->service_date)) }}</td>
						<td>{{ $student->full_name }}</td>
						<td>{{ '+998'. getNormalPhone($student->phone) }}</td>
						<td>
							@if(isset($student->service_amount))
							{{ $student->service_amount }}
							@endif
						</td>
						<td>
							@if(isset($student->speciality->faculty->university->name))
							{{ $student->speciality->faculty->university->name }}
							@endif
						</td>
						<td>
							@if(isset($student->speciality->name))
							{{ $student->speciality->name }}
							@endif
						</td>
						<td>{{ $student->type_n }}</td>
						<td>@if($student->service_contract_check)переводга берилди @endif</td>
						<td>@if($student->perevod_status) перевод булди @endif</td>
						<td>
							@if(isset($student->manager->boss_manager->filial))
							{{ $student->manager->boss_manager->filial->full_name }}
							@endif
						</td>
						<td>
							@if(isset($student->manager->name))
							{{ $student->manager->name }}
							@endif
						</td>
						<td style="width: 120px;">
<!-- 							<a href="/admin/studentsSh/{{ $student->id }}/show" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Информация">
                    			<i class="fas fa-info-circle"></i>
                  			</a> -->
                  			<a href="{{ route('studentsSh.edit', $student->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Изменить">
                  				<i class="fas fa-pen"></i>
                  			</a>
                  			<a href="/admin/studentsSh1/download/{{ $student->id }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Изменить">
                  				<i class="fas fa-download"></i>
                  			</a>
                  			@can('isSuperadmin')
								<button  type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#logoutModal{{ $student->id }}" data-placement="top" title="Удалить"><i class="fas fa-trash"></i></button>
                  			@endcan
                  		</td>
					</tr>
					@can('isSuperadmin')
 <div class="modal fade" id="logoutModal{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <a class="btn btn-danger" onclick="event.preventDefault();$(this).next().submit();" href="{{ route('studentsSA.destroy', $student->id) }}">Удалить</a>
          <form action="{{ route('studentsSA.destroy', $student->id) }}" method="POST" style="display: none;">
                  @csrf
				  @method('DELETE')
          </form>
        </div>
      </div>
    </div>
  </div>
  					@endcan
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
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>

<!-- Page level custom scripts -->
<script src="/adminassets/js/demo/datatables-demo.js"></script>
@endsection
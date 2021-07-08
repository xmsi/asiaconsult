@extends('admin.layouts.index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Изменить</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		@include('error')
		<form action="{{ route('studentsSh1.update_sale', $student->id) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			@csrf
			@method('PUT')

<a href="/stdocs/sale_document/{{ $student->sale_document }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Скидка" download>
                  				<i class="fas fa-file-alt"></i> Скачать файл
                  			</a>

                  			<br><br>
			<h4>Скидки</h4>
			<!-- Default value -->
			<!-- <input type="hidden" name="sale_code" value="0"> -->
			@foreach($student->sale_code_n as $value => $codeN)
				<div class="form-check">
					<label class="form-check-label">
						<input type="radio" class="form-check-input" name="sale_code" value="{{ $value }}" @if($student->sale_code == $value) checked @endif>{{ $codeN }}
					</label>
				</div>
			@endforeach
			<br>
			<p id="new_summ">--------</p>
			<div class="form-group">
				<label for="title">Imtiyez bilan narxi ( gap bilan )</label>
				<input type="text" name="sale_sum_name" value="{{ $student->sale_sum_name }}" class="form-control" required>
			</div>
			<br>
	
			<button type="submit" class="btn btn-primary">Изменить</button>	
		</form>
	</div>
</div>
@endsection


@section('extra_js')
	<script>
		jQuery(document).ready(function($) {


			// radio buttons for sale
			$('input[type=radio][name=sale_code]').change(function() {
				$.ajax({
					url: '/api/getsale',
					type: 'POST',
					dataType: 'json',
					data: {
						_token: "{{ csrf_token() }}",
						sale_code: this.value,
						speciality: "{{ $student->speciality_id }}",
						service_amount: "{{ $student->service_amount }}"
					},
				}).done(function(data) {
					console.log(data)
					$('#new_summ').text(data)
				}).fail(function() {
					console.log("error");
				})
			});

		});
	</script>
@endsection
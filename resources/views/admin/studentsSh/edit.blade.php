@extends('admin.layouts.index')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Изменить</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-body">
		@include('error')
		<form action="{{ route('studentsSh.update', $student->id) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="title">Ismi</label>
				<input type="text" name="name" value="{{ $student->name }}" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="title">Familiyasi</label>
				<input type="text" name="second_name" value="{{ $student->second_name }}" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="title">Otasini ismi</label>
				<input type="text" name="father_name" value="{{ $student->father_name }}" class="form-control" required>
			</div>			
			<div class="form-group">
				<label for="title">Passport seriya, raqami</label>
				<input type="text" name="passport_id" value="{{ $student->passport_id }}" class="form-control" required>
			</div>			
			<div class="form-group">
				<label for="title">Passport berilgan sanasi</label>
				<input type="text" name="passport_date" value="{{ $student->passport_date }}" class="form-control" required>
			</div>			
			<div class="form-group">
				<label for="title">Passport berilgan joy IIB</label>
				<input type="text" name="passport_iib" value="{{ $student->passport_iib }}" class="form-control" required>
			</div>
			@can('isSuperadmin')
				<div class="form-group">
					<label for="title">Shartnoma sanasi</label>
					<input type="text" name="service_date" value="{{ date('d.m.Y', strtotime($student->service_date)) }}" class="form-control">
				</div>
				<div class="form-group">
					<label for="title">Shartnoma puli</label>
					<input type="text" name="service_amount" value="{{ $student->service_amount }}" class="form-control">
				</div>
			@endcan
			<div class="form-group">
				<label for="country">Universitet</label>
				<div class="input-group mb-3">
					<select id="university" class="form-control">
						<option value="">Universitetni tanlash......</option>
						@foreach($universities as $value => $key)
							<option value="{{ $value }}">{{ $key }}</option>
						@endforeach
					</select>
				</div>	
			</div> 
			<div class="form-group">
				<label for="country">Fakultet</label>
				<div class="input-group mb-3">
					<select id="faculty" class="form-control">
						<option value="">tanlash......</option>
					</select>
				</div>	
			</div>
			<div class="form-group">
				<label for="country">Mutaxassisligi</label>
				<div class="input-group mb-3">
					<select name="speciality_id" id="speciality" class="form-control">
						<option value="">tanlash......</option>
					</select>
				</div>	
			</div> 	 	
			<div class="form-group">
				<label for="country">O'qish turi</label>
				<div class="input-group mb-3">
					<select name="type" id="type" class="form-control">
						<option value="">tanlash......</option>
					</select>
				</div>	
			</div> 	 	
			<div class="form-group">
				<label for="diplom_per">Pasport</label><br>
				<input type="file" name="passport" id="passport"/>
			</div>
			<div class="form-group">
				<label for="diplom_per">Diplom</label><br>
				<input type="file" name="diplom" id="diploma"/>
			</div>
			<div class="form-group">
				<label for="diplom_per">Attestat</label><br>
				<input type="file" name="attestat" id="attestat"/>
			</div>
			<div class="form-group">
				<label for="diplom_per">Zags</label><br>
				<input type="file" name="zags" id="zags" />
			</div>
			<div class="form-group">
				<label for="diplom_per">Otasini yoki Onasini passport skani</label><br>
				<input type="file" name="parent_passport" id="parent_passport"/>
			</div>
			<div class="form-group">
				<label for="diplom_per">Rasm</label><br>
				<input type="file" name="image" id="image"/>
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
			$("#university").on('change', function(event) {
				$.ajax({
					url: '/admin/speciality/faculty',
					type: 'POST',
					dataType: 'json',
					data: {
						_token: "{{ csrf_token() }}",
						university_id: this.value
					},
				})
				.done(function(data) {
					$("#faculty").empty();
					$("#faculty").append(new Option('Tanlash...', ''));
					$.each(data, function(index, val) {
						$("#faculty").append(new Option(val, index));
					});
				})
				.fail(function() {
					console.log("error");
				})
				
			});
			$("#faculty").on('change', function(event) {
				$.ajax({
					url: '/admin/studentsSh1/speciality',
					type: 'POST',
					dataType: 'json',
					data: {
						_token: "{{ csrf_token() }}",
						faculty_id: this.value
					},
				})
				.done(function(data) {
					$("#speciality").empty();
					$("#speciality").append(new Option('Tanlash...', ''));
					$.each(data, function(index, val) {
						$("#speciality").append(new Option(val, index));
					});
				})
				.fail(function() {
					console.log("error");
				})
				
			});
			$("#speciality").on('change', function(event) {
				$.ajax({
					url: '/api/gets',
					type: 'POST',
					dataType: 'json',
					data: {
						_token: "{{ csrf_token() }}",
						speciality_id: this.value
					},
				})
				.done(function(data) {
					$("#type").empty();
					$("#type").append(new Option('Tanlash...', ''));
					check_dropdown(data.night_weekend_part, 'вечернее и выходное, заочное', 9);
					check_dropdown(data.night_weekend_full, 'вечернее и выходное, очное', 8);
					check_dropdown(data.night_collage, 'вечернее(для колледжей)', 7);
					check_dropdown(data.night_11, 'вечернее(для 11 классов)', 6);
					check_dropdown(data.full_part, 'очное-заочное', 5);
					check_dropdown(data.weekend_time, 'По выходным', 4);
					check_dropdown(data.night_time, 'Вечернее', 3);
					check_dropdown(data.online, 'Онлайн', 2);
					check_dropdown(data.part_time, 'Заочное', 1);
					check_dropdown(data.full_time, 'Очное', 0);

					$("#loading-image").hide();
					$("section").css('opacity', 1);
				})
				.fail(function() {
					console.log("error");
				})

				function check_dropdown(status, name, orig){
					if(status == 1){
						// $("#speciality").append('<li class="inputselector1" data-id="'+ orig +'">'+name+'</li>');
						$("#type").append(new Option(name, orig));
					}
				}
				
			});
		});
	</script>
@endsection

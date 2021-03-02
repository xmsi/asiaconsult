			@if($errors->any())
				<div class="alert alert-danger">
					<strong>@lang('Неправильно заполнена форма')</strong>
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
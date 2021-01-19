@if($errors->any())
					<div class="error">
						<p> <b>Неправильно заполнена форма!</b> <br>
								@foreach($errors->all() as $error)
									{{ $error }}
								@endforeach
						</p>
						<img src="/assets/icons/x-close.svg" class="x-close" alt="close">
					</div>
@endif
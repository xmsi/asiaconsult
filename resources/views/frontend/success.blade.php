@if($message = Session::get('success'))
					<div class="successq">
						<p>
								{{ $message }}
						</p>
						<img src="/assets/icons/x-close.svg" class="x-close" alt="close">
					</div>
@endif
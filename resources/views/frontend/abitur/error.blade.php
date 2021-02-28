@extends('frontend.layouts.index')
@section('content')
			<section class="modal popup container-fluid">
				<div class="content col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12">
					<h2>@lang('Приносим извинения, но сейчас вы не можете подать документы в данный ВУЗ, попробуйте позже')</h2>
				</div>
				<div class="modal-close"></div>
			</section>
@endsection

@section('extra_js')
	<script>
		jQuery(document).ready(function($) {
			$('.modal-close').click(function() {
				window.location.href = '/university_select';
				return false;
			});
		});
	</script>
@endsection
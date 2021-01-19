@extends('frontend.layouts.index')
@section('content')
			<section class="modal popup container-fluid">
				<div class="content col-xl-6 col-lg-8 col-md-10 col-sm-12 col-12">
					<h2>Ваши документы переданы на обработку</h2>
					<p>
						Если обработка пройдет успешно, в ваш личный кабинет будет отправлено подтверждение о зачислении Вас в ряды
						студентов и позже будет отправлен контракт на оплату учебного года, по которому вы должны произвести оплату
						и загрузить квитанцию.
					</p>
					<p class="title">Обработка документов займет около 3 - х дней</p>
				</div>
				<div class="modal-close"></div>
			</section>
@endsection

@section('extra_js')
	<script>
		jQuery(document).ready(function($) {
			$('.modal-close').click(function() {
				window.location.href = '/cab/';
				return false;
			});
		});
	</script>
@endsection
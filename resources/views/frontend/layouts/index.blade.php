<!DOCTYPE html>
<html lang="ru">
	<head>
		<x-whoami />
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
		<link rel="icon" href="/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="/assets/libs/bootstrap-grid/bootstrap-grid.min.css" />
		<link rel="stylesheet" href="/assets/styles/style.css" />

		<title>Asiaconsult</title>
	</head>

	@if(request()->is('cab*') && auth()->check())
		<header>
			<div class="logo col-xl-2 col-lg-2 col-md-3 col-sm-3">
				<img src="/assets/icons/logo.svg" alt="logo" />
			</div>
			<div class="additions col-xl-6 col-lg-8 col-md-9 col-sm-9 col-12">
				<a href="onlinepay.html" class="online-pay">
					<img src="/assets/icons/card.svg" alt="card" />
					<p>Онлайн - оплата услуг</p>
				</a>
				<div class="account">
					<img src="/assets/icons/account.svg" alt="account" />
					<p>{{ auth()->user()->student->name }}</p>
				</div>
				<div class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					<img src="/assets/icons/logout.svg" alt="logout" />
					<p>Выйти</p>
				</div>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>
			</div>
		</header>
	@endif

	<body>
		<main>
			@yield('content')
		</main>

		<script src="/assets/libs/jquery/jquery-3.5.1.min.js"></script>
		<script src="/assets/libs/jquery_mask/jquery.mask.min.js"></script>
		<script src="/assets/scripts/main.js"></script>
		@yield('extra_js')
	</body>
</html>

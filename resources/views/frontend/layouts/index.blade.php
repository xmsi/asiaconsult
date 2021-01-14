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

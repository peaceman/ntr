<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>nTimeRec</title>
	<link rel="stylesheet" href="{{ elixir('css/vendor.css') }}" media="screen" charset="utf-8">
	<link rel="stylesheet" href="{{ elixir('css/main.css') }}" media="screen" charset="utf-8">
	<script src="{{ elixir('js/vendor.js') }}"></script>
</head>
<body>
	@include('partials.navbar')

	<div class="container">
		@yield('content')
	</div><!-- /.container -->
</body>
</html>

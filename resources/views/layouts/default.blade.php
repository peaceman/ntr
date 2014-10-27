<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>nTimeRec</title>
	<link rel="stylesheet" href="{{ elixir('css/vendor.css') }}" media="screen" charset="utf-8">
	<link rel="stylesheet" href="{{ elixir('css/main.css') }}" media="screen" charset="utf-8">
	<link rel="stylesheet" href="/css/selectize.bootstrap3.css"/>
	<script src="{{ elixir('js/vendor.js') }}"></script>
	<script>
	$(function() {
		$(document.body).livetime();
		$('[data-duration]').each(function(idx, ele) {
			var durationInSeconds = parseInt(ele.getAttribute('data-duration'));
			var duration = moment.duration(durationInSeconds, 'seconds');
			ele.innerHTML = duration.format('hh:mm:ss', {trim: false});
		});
	});
	</script>
</head>
<body>
	@include('partials.navbar')

	<div class="container">
		@yield('content')
	</div><!-- /.container -->
</body>
</html>

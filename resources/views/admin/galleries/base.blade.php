<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title') | {{ config('app.name')}}</title>
    <link rel="icon" href="/laravel.png">
	<link rel="stylesheet" href="/css/uikit.min.css">
	<script src="/js/uikit.min.js"></script>
	<script src="/js/uikit-icons.min.js"></script>
</head>
<body>
	<div class="uk-container uk-container-small">
		<h3 class="">{{ $post->pagetitle }}</h3>
	</div>
</body>
</html>
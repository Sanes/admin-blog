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
{{-- 	<script src="/js/turbolinks.js"></script>
    <meta name="turbolinks-cache-control" content="no-cache"> --}}
    <style>
        .uk-navbar-item, .uk-navbar-nav > li > a, .uk-navbar-toggle {padding: 0 10px;}
        .uk-notification-message {font-size: 16px;}
        .CodeMirror {
			border: 1px solid #eee;
			font-size: 0.8rem;
		}
    </style> 	
</head>
<body>
	<div class="uk-container" style="min-height: calc(100vh - 51px);">
		<nav class="uk-navbar uk-margin-bottom" style="border-bottom: 1px solid #e5e5e5;">
			<div class="uk-navbar-left">
				<a href="/" class="uk-logo uk-text-uppercase">Sanes</a>
			</div>
			<div class="uk-navbar-right">
				<ul class="uk-navbar-nav">
					<li><a href="" class="uk-icon-link" uk-icon="desktop" target="_blank"></a></li>
					<li>
						<a onclick="document.getElementById('logout').submit();"><span class="uk-margin-small-right" uk-icon="sign-out"></span>Выйти</a>
						<form action="{{ route('logout') }}" method="POST" id="logout">
                        	@csrf
                    	</form> 						
					</li>
				</ul>
			</div>
		</nav>
		<div class="uk-grid-divider uk-grid-medium" uk-grid>
			@include('admin.sidebar')
			<div class="uk-width-expand">
				@yield('content')
			</div>
		</div>
	</div>
    <div class="uk-container uk-padding-small uk-text-small uk-text-center uk-text-uppercase">Sanes © 2022</div>
    @yield('js')
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DutGRIFF</title>

	<link href="{{ asset('/css/all.css') }}" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

  <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>

  @yield('head-content')

</head>
<body>
  @yield('prepage-content')

  @include('layout.navbar')

	@yield('content')

  <script src="/js/all.css"></script>
  @yield('scripts')
</body>
</html>

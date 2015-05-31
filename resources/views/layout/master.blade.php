<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DutGRIFF</title>

  <link rel="apple-touch-icon" sizes="57x57" href="/images/theme/favicon/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/images/theme/favicon/apple-touch-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/images/theme/favicon/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/images/theme/favicon/apple-touch-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/images/theme/favicon/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/images/theme/favicon/apple-touch-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/images/theme/favicon/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/images/theme/favicon/apple-touch-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/images/theme/favicon/apple-touch-icon-180x180.png">
  <link rel="icon" type="image/png" href="/images/theme/favicon/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="/images/theme/favicon/favicon-194x194.png" sizes="194x194">
  <link rel="icon" type="image/png" href="/images/theme/favicon/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="/images/theme/favicon/android-chrome-192x192.png" sizes="192x192">
  <link rel="icon" type="image/png" href="/images/theme/favicon/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="/images/theme/favicon/manifest.json">
  <link rel="shortcut icon" href="/images/theme/favicon/favicon.ico">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-TileImage" content="/images/theme/favicon/mstile-144x144.png">
  <meta name="msapplication-config" content="/images/theme/favicon/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">

  <link href="{{ asset('/css/all.css') }}" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  @yield('head-content')

</head>
<body>
@yield('header')

@include('layout._navbar')

<noscript>
  <div id="no-script-warning" class="container">
    <div class="row container-inlay-container">
      <div class="col-xs-12 container-inlay inverse inverse-danger">
        <span class="h3">Whoa!</span> It's {{ Carbon\Carbon::now()->year }} and you don't have Javascript enabled.
        Unless you are doing this for a
        specific reason I'd suggest turning Javascript on to get the most out of this website and just about every other
        site.
        Here are the <a href="http://www.enable-javascript.com/" target="_blank"> instructions on how to enable
          JavaScript
          in your web browser</a>.
      </div>
    </div>
  </div>
</noscript>

@yield('prepage-content')

<div id="main-container" class="container">

  @yield('content')

</div>

@include('layout._footer')

<script src="/js/all.js"></script>
@yield('scripts')
</body>
</html>

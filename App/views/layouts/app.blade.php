<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta author="Gustavo da Silva Gomes">
  <meta keywords="Bíblia, Catecismo, Encíclica">
  <meta name="theme-color" content="#000000">
  <title>Vida Cristã - {{ $title ?? 'Home' }}</title>
  <link rel="stylesheet" type="text/css" href="/dist/styles/main.css">
  <link rel="manifest" href="/manifest.json">
  <link rel="icon" href="/dist/assets/img/favico/favicon.ico" sizes="16x16">
  <link rel="icon" href="/dist/assets/img/favico/favicon-16x16.png" sizes="16x16">
  <link rel="icon" href="/dist/assets/img/favico/favicon-32x32.png" sizes="32x32">
  <link rel="icon" href="/dist/assets/img/favico/pwa-192x192.png" sizes="192x192">
  <link rel="icon" href="/dist/assets/img/favico/pwa-512x512.png" sizes="512x512">
  <link rel="icon" href="/dist/assets/img/favico/apple-touch-icon-180x180.png" sizes="180x180">
</head>
@if ($title == 'Bíblia' ?? $title == 'Encíclicas papais' ?? $title == 'Busca' ?? $title == 'Filtro' ?? $title == null)
  @php $no_filter = 'class=no-filter'; @endphp
@endif
<body {{ $no_filter ?? '' }}>
  @include("partials.header")
  @include("partials.menu")
  @yield('content')
  @include("partials.footer")
  <script src="/dist/scripts/main.js" type="text/javascript" charset="utf-8" async defer></script>
</body>
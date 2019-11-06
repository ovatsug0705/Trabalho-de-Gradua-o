<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta author="Gustavo da Silva Gomes">
  <meta keywords="Bíblia, Catecismo, Encíclica">
  <meta name="theme-color" content="#260e04">
  <meta name="description" content="Facilitando o acesso do Cristão aos documentos fundamentais de sua fé.">
  <title>Vida Cristã - {{ $title ?? 'Home' }}</title>
  <link rel="stylesheet" type="text/css" href="/dist/styles/main.css">
  <link rel="manifest" href="/manifest.json">
  <link rel="icon" href="/dist/assets/img/favico/favicon.ico" sizes="16x16">
  <link rel="icon" href="/dist/assets/img/favico/favicon-16x16.png" sizes="16x16">
  <link rel="icon" href="/dist/assets/img/favico/favicon-32x32.png" sizes="32x32">
  <link rel="icon" href="/dist/assets/img/favico/pwa-192x192.png" sizes="192x192">
  <link rel="icon" href="/dist/assets/img/favico/pwa-512x512.png" sizes="512x512">
  <link rel="icon" href="/dist/assets/img/favico/apple-touch-icon-180x180.png" sizes="180x180">
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="pt_BR">
  <meta property="og:title" content="Vida Cristã - {{ $title ?? 'Home' }}" />
  <meta property="og:description" content="Facilitando o acesso do cristão aos documentos fundamentais de sua fé." />
  <meta property="og:image" content="https://vidacrista2.000webhostapp.com/dist/assets/img/church.webp" />
  <meta property="og:url" content="{{ $full_url }}" />
  <meta name="msapplication-TileColor" content="#260e04">
  <meta name="msapplication-TileImage" content="https://vidacrista2.000webhostapp.com/dist/assets/img/church.webp">
</head>
@if ($title == 'Bíblia' || $title == 'Encíclicas papais' || $title == 'Busca' || $title == 'Filtro' || $title == null || $title == 'Home' || $title == '404')
@php $no_filter = 'class=no-filter'; @endphp
@endif
<body {{ $no_filter ?? '' }}>
  @include("partials.header")
  @include("partials.menu")
  @yield('content')
  @include("partials.footer")
  <script src="/dist/scripts/main.js" type="text/javascript" charset="utf-8" async defer></script>
  <script type="text/javascript" charset="utf-8" async defer>
  //This is the "Offline copy of pages" service worker

  //Install stage sets up the index page (home page) in the cache and opens a new cache
  self.addEventListener('install', function(event) {
    var indexPage = new Request('https://vidacrista2.000webhostapp.com');
    event.waitUntil(
      fetch(indexPage).then(function(response) {
        return caches.open('pwabuilder-offline').then(function(cache) {
          console.log('[PWA Builder] Cached index page during Install'+ response.url);
          return cache.put(indexPage, response);
        });
    }));
  });
  
  //If any fetch fails, it will look for the request in the cache and serve it from there first
  self.addEventListener('fetch', function(event) {
    var updateCache = function(request){
      return caches.open('pwabuilder-offline').then(function (cache) {
        return fetch(request).then(function (response) {
          console.log('[PWA Builder] add page to offline'+response.url)
          return cache.put(request, response);
        });
      });
    };
  
    event.waitUntil(updateCache(event.request));
  
    event.respondWith(
      fetch(event.request).catch(function(error) {
        console.log( '[PWA Builder] Network request Failed. Serving content from cache: ' + error );
  
        //Check to see if you have it in the cache
        //Return response
        //If not in the cache, then return error page
        return caches.open('pwabuilder-offline').then(function (cache) {
          return cache.match(event.request).then(function (matching) {
            var report =  !matching || matching.status == 404?Promise.reject('no-match'): matching;
            return report
          });
        });
      })
    );
  })
  </script>
</body>
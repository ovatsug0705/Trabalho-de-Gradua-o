<header class="header">
  <button data-menu-button class="menu-button">menu</button>
  <a class="logo" href="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";?>">
    <h1 class="title title--main">Vida Cristã</h1>
  </a>
  <!-- <form action="/busca" method="get" data-request>
    <input required="true" data-input type="text" name="s" id="searchInput">
    <input type="submit" value="Enviar">
  </form> -->
  <form method="get" data-request>
    <input required="true" data-input type="text" class="test2" name="s" id="searchInput">
    <button data-input-button>Enviar</button>
  </form>
</header>
<a id="link" href="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";?>catecismo/4">catecismo</a>


<nav class="menu" data-menu>
  <ul class="menu__list">
    <li class="menu__list-item">
      <a class="menu__list-link" href="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";?>/">Home</a>
    </li>
    <li class="menu__list-item">
      <a class="menu__list-link" href="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";?>/catecismo">Catecismo</a>
    </li>
    <li class="menu__list-item">
      <a class="menu__list-link" href="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";?>/doutrina_social">Doutrina Social</a>      
    </li>
    <li class="menu__list-item">
      <a class="menu__list-link" href="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";?>/canodo">Código de Direito Canônico</a>
    </li>
    <li class="menu__list-item">
      <a class="menu__list-link" href="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";?>/enciclicas">Enciclicas</a>
    </li>
    <li class="menu__list-item">
      <a class="menu__list-link" href="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";?>/biblia">Bíblia</a>
    </li>
  </ul>
</nav>
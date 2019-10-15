<header class="s-header">
  <div class="s-header__holder content" data-search-mobile>
    <button data-menu-button class="s-header__menu-button">
      <span class="s-header__menu-button-content">Menu</span>
    </button>
    <a class="s-header__link" href="/">
      @if($title == 'home')
        <strong class="s-header__logo">Vida Cristã</strong>
      @else
        <h1 class="s-header__logo">Vida Cristã</h1>
      @endif
    </a>
    
    <div class="s-header__actions">
      <form class="s-header__search-form" method="get" action="/busca" data-search>
        <input class="s-header__search-input" required="true" placeholder="Buscar" data-search-input type="text" class="test2" name="s" id="searchInput">
        <button type="button" class="s-header__search-close hide" data-search-close>X</button>
        <button type="submit" class="s-header__submit-button icon-search" value="" data-search-submit></button>
      </form>
      @include('partials.actions')
    </div>
  </div>
</header>

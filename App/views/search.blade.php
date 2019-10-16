@extends('layouts.app')

@section('content')

@include("partials.webdoor", ["data_page" => 'search'])

<main class="content s-search">
  <div class="s-search_container">
    <span class="s-search__desc s-search__desc--highlight">Resultados da busca por: <strong>{{ $data['text'] }}</strong></span>
    @foreach ($data['books'] as $item)
      <div class="s-search__row">
        <span class="s-search__desc">Bíblia</span>
        <a href="/biblia/{{ $item['url_text'] }}" class="s-search__link">
          <strong class="s-search__highlight">{{ $item['book_name'] }}</strong>
        </a>
      </div>
    @endforeach
    
    @foreach ($data['encyclical'] as $item)
      <div class="s-search__row">
        <span class="s-search__desc">Encíclica</span>
        <a href="/enciclicas/{{ $item['url_text'] }}" class="s-search__link">
          <strong class="s-search__highlight">{{ $item['encyclical_name'] }}</strong>
        </a>
      </div>
    @endforeach

    @if (!empty($data['cano']))
      <div class="s-search__row">
        <a href="/canodo/" class="s-search__link">
          <strong class="s-search__highlight">Cânodo</strong>
        </a>
      </div>
    @endif

    @if (!empty($data['catechism']))
      <div class="s-search__row">
        <a href="/catecismo/" class="s-search__link">
          <strong class="s-search__highlight">Catecismo</strong>
        </a>
      </div>
    @endif

    @if (!empty($data['social_doctrine']))
      <div class="s-search__row">
        <a href="/doutrina_social/" class="s-search__link">
          <strong class="s-search__highlight">Doutrina Social</strong>
        </a>
      </div>
    @endif

    @if (empty($data['books']) and empty($data['cano']) and empty($data['catechism']) and empty($data['encyclical']) and empty($data['social_doctrine']))
      <div class="s-search__row">
         <strong class="s-search__error">Desculpe não encontramos a sua busca :(</strong>
      </div>
    @endif
  </div>
</main>

@endsection
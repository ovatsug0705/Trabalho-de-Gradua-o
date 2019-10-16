@extends('layouts.app')

@section('content')

@include("partials.webdoor", ["data_page" => 'encyclical'])

<main class="s-encyclical">
  <div class="s-encyclical__holder content">
    @foreach ($data as $items)
      <div class="s-encyclical__content" data-acordeon>
        <strong class="s-encyclical__author">{{ $items[0]['pontiff'] }}</strong>
        <ul class="s-encyclical__list">
          @foreach ($items as $item)
            <li class="s-encyclical__item">
              <a href="enciclicas/{{ $item['url_text'] }}" class="s-encyclical__link">{{ $item['encyclical_name'] }}</a>
            </li>
          @endforeach
        </ul>
      </div> 
    @endforeach
  </div>
</main>

@endsection
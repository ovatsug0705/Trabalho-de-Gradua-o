@extends('layouts.app')

@section('content')

@include("partials.webdoor", ["data_page" => 'bible'])
<main class="s-bible">
  <div class="s-bible__holder content">
    <div class="s-bible__content">
      <h2 class="s-bible__title">Antigo Testamento</h2>
      <ul class="s-bible__links">
        @foreach ($data as $item)
          @if ($item['testament'] == 'antigo')
            <li class="s-bible__item">
              <a href="/biblia/{{ $item["url_text"] }}" class="s-bible__link">{{ $item["book_name"] }}</a>
            </li>
          @endif
        @endforeach
      </ul>
    </div>
    <div class="s-bible__content">
      <h2 class="s-bible__title">Novo Testamento</h2>
      <ul class="s-bible__links">
        @foreach ($data as $item)
          @if ($item['testament'] == 'novo')
            <li class="s-bible__item">
              <a href="/biblia/{{ $item["url_text"] }}" class="s-bible__link">{{ $item["book_name"] }}</a>
            </li>
          @endif
        @endforeach
      </ul>
    </div>
  </div>
</main>
@endsection
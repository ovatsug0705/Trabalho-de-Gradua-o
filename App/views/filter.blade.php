@extends('layouts.app')

@section('content')

@include("partials.webdoor", ["data_page" => 'filter'])

<main class="content s-search">
  <div class="s-search_container">
		<span class="s-search__desc s-search__desc--highlight">Resultados da Filtragem por: <strong>{{ $data['text'] }}</strong></span>
		@if (empty($data['content']))
			<div class="s-search__row">
				<strong class="s-search__error">Desculpe não encontramos a sua busca :(</strong>
			</div>
		@endif

		@if ($data['doc'] == 'catecismo' or $data['doc'] == 'canodo' or $data['doc'] == 'doutrina_social')
			@foreach ($data['content'] as $item)
				@php
					if($item['paragraph_number'] % 20 == 0) {
						$link = $item['paragraph_number'] / 20;
					} else {
						$link = floor($item['paragraph_number'] / 20) + 1;
					}
				@endphp
				<div class="s-search__row">
					<a href="/{{ $data['doc'] }}/{{ $link }}#{{ $item['paragraph_number'] }}" class="s-search__link">
						<span class="c-document__highlight">
							@if( $data['doc'] == 'catecismo')Catecismo @endif
							@if( $data['doc'] == 'canodo')Código de Direito Canônico @endif
							@if( $data['doc'] == 'doutrina_social')Doutrina Social @endif
						 - {{ $item['paragraph_number'] }}
						</span>
						<p class="c-document__paragraph">
							<span class="c-document__paragraph-number">
								{{ $item['paragraph_number'] }}
							</span>
							{{ $item['paragraph_text'] }}
						</p>
					</a>
				</div>
			@endforeach
		@endif
		
		@if ($data['doc'] == 'biblia')
			@foreach ($data['content'] as $item)
				<div class="s-search__row">
					<a href="/biblia/{{ $item['url_text'] }}/{{ $item['chapter'] }}" class="s-search__link">
						<span class="c-document__highlight">{{ $item['book_name'] }} - {{ $item['chapter'] }}, {{ $item['verser_number'] }}</span>
						<p class="c-document__paragraph">
							<span class="c-document__paragraph-number">
								{{ $item['verser_number'] }}
							</span>
							{{ $item['verser_text'] }}
						</p>
					</a>
				</div>
			@endforeach
		@endif

		@if ($data['doc'] == 'biblia')
			@foreach ($data['content'] as $item)
				@php
					if($item['paragraph_number'] % 20 == 0) {
						$link = $item['paragraph_number'] / 20;
					} else {
						$link = floor($item['paragraph_number'] / 20) + 1;
					}
				@endphp
				<div class="s-search__row">
					<a href="/enciclicas/{{ $item['url_text'] }}/{{ $link }}" class="s-search__link">
						<span class="c-document__highlight">{{ $item['encyclical_name'] }} - {{ $item['paragraph_number'] }}</span>
						<p class="c-document__paragraph">
							<span class="c-document__paragraph-number">
								{{ $item['paragraph_number'] }}
							</span>
							{{ $item['paragraph_text'] }}
						</p>
					</a>
				</div>
			@endforeach
		@endif

  </div>
</main>

@endsection
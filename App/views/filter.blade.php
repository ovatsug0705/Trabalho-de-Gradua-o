@extends('layouts.app')

@section('content')

@include("partials.webdoor", ["data_page" => 'filter', "data-doc" => $data['doc']])

<main class="content s-search">
  <div class="s-search_container">
		<span class="s-search__desc s-search__desc--highlight"><strong>{{ $data['count'] }}</strong> resultados da Filtragem por: <strong>{{ $data['text'] }}</strong></span>
		@if (empty($data['content']))
			<div class="s-search__row">
				<strong class="s-search__error">Desculpe não encontramos a sua busca.</strong>
			</div>
		@endif

		@if ($data['doc'] == 'catecismo' or $data['doc'] == 'canodo' or $data['doc'] == 'doutrina-social')
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
							@if( $data['doc'] == 'doutrina-social')Doutrina Social @endif
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

		@if ($data['doc'] == 'enciclica')
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
  <div class="c-document__paginate" data-bottom-btn>
  	@php
  		$query_string = substr($_SERVER['QUERY_STRING'], strpos($_SERVER['QUERY_STRING'], '&') + 1);
  	@endphp
		@if($paginate != 1)
			<a href="/filtro/{{ $data['doc'] }}/{{ $paginate - 1 }}/?{{ $query_string }}" class="c-document__paginate-link c-document__paginate-link--fisrt">before</a>
		@endif
		@if(($data['count'] / 20) > ($paginate))
			<a href="/filtro/{{ $data['doc'] }}/{{ $paginate + 1 }}/?{{ $query_string }}" class="c-document__paginate-link">after</a>
		@endif
  </div>
</main>

@endsection
@extends('layouts.app')

@section('content')
@php
	$books = $data['books'];
	$data = $data['content'];
@endphp
@include("partials.webdoor", ["data_page" => 'bible', 'chapter' => $data[0]['chapter']])

<main class="c-document c-document--fix s-bible">
	<div class="c-document__holder">
		@foreach ($data as $item)
			<p id="{{ $item['verser_number'] }}" class="c-document__paragraph">
				<span class="c-document__paragraph-number">
					{{ $item['verser_number'] }}
				</span>
				{{ $item['verser_text'] }}
			</p>	
		@endforeach
	</div>
	@include("partials.socials", ["text" => "Leia a o livro do {$title} na bíblia no site Vida Cristã. Acesse agora: "])
	<div class="c-document__paginate" data-bottom-btn>
		@if($paginate != 1)
			<a href="/biblia/{{ $data[0]['url_text'] }}/{{ $paginate - 1 }}" class="c-document__paginate-link c-document__paginate-link--fisrt">before</a>
		@endif
		@if(($paginate + 1) <= ($data[0]['number_of_chapters']))
			<a href="/biblia/{{ $data[0]['url_text'] }}/{{ $paginate + 1 }}" class="c-document__paginate-link">after</a>
		@endif
	</div>
</main>

<aside class="c-filter" data-filter>	
	<button type="button" class="c-filter-close" data-filter-close>X</button>
	<div class="c-filter__form-holder">
		<form action="/filtro/biblia" class="c-filter__form">
			<label for="bibleText" class="c-filter__form-label">Busque na Bíblia</label>
			<div class="c-filter__input-holder">
				<input type="radio" class="c-filter__form-radio" checked name="p" id="all" value="all">
				<label for="all" class="c-filter__form-text">Todos os Livros</label>
			</div>
			<div class="c-filter__input-holder">
				<input type="radio" class="c-filter__form-radio" name="p" id="old" value="old">
				<label for="old" class="c-filter__form-text">Antigo testamento</label>
			</div>
			<div class="c-filter__input-holder">
				<input type="radio" class="c-filter__form-radio" name="p" id="new" value="new">
				<label for="new" class="c-filter__form-text">Novo testamento</label>
			</div>
			<div class="c-filter__input-holder">
				<input minlength="3" required type="text" class="c-filter__form-input" placeholder="Ex: Deus" name="t" id="bibleText">
				<input type="submit" class="c-filter__form-submit" value="ok">
			</div>
		</form>
	</div>

	<div class="c-filter__form-holder c-filter__form-holder--top">
		<form action="/filtro/pas" method="get" class="c-filter__form" accept-charset="utf-8">
			<label for="bibleText" class="c-filter__form-label c-filter__form-label--bottom">Encontre na Bíblia</label>
			<div class="c-filter__input-holder">
				<label for="livro" class="c-filter__select-label">Livro</label>
				<select name="l" id="livro" class="c-filter__select" data-books='{{ $data[0]['url_text'] }}'>
					@foreach ($books as $book)
						@php
							if ($book['url_text'] === $data[0]['url_text']) {
								$selected = 'selected="selected"';
							} else {
								$selected = false;
							}
						@endphp
						<option {{ $selected ?? '' }} data-book="{{ $book['url_text'] }}" value="{{ $book['url_text'] }}">{{ $book['book_name'] }}</option>
					@endforeach
				</select>
			</div>
			<div class="c-filter__input-holder">
				<label for="cap" class="c-filter__select-label">Capítulo</label>
				<select name="c" id="cap" class="c-filter__select" data-books-number>
				</select>
				<input type="submit" class="c-filter__form-submit c-filter__form-submit--large" value="Encontrar">
			</div>
		</form>
	</div>
</aside>
@endsection
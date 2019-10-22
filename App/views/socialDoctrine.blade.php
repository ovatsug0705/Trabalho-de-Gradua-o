@extends('layouts.app')

@section('content')

@include("partials.webdoor", ["data_page" => 'social-doctrine'])
<main class="c-document c-document">
	<div class="c-document__holder">
		@foreach ($data as $item)
			@if (!empty($item['paragraph_partial']) or !empty($item['paragraph_section']) or !empty($item['paragraph_chapter']) or !empty($item['paragraph_title']))
				<header class="c-document__header">
					@if(!empty($item['paragraph_partial']))
						<h2 class="o-title o-title--2">{{ $item['paragraph_partial'] }}</h2>
					@endif
					@if(!empty($item['paragraph_chapter']))
						<h3 class="o-title o-title--4">{{ $item['paragraph_chapter'] }}</h3>
					@endif
					@if(!empty($item['paragraph_section']))
						<h4 class="o-title o-title--3">{{ $item['paragraph_section'] }}</h4>
					@endif
					@if(!empty($item['paragraph_title']))
						<h5 class="o-title o-title--6">{{ $item['paragraph_title'] }}</h5>
					@endif
				</header>
			@endif
			<p id="{{ $item['paragraph_number'] }}" class="c-document__paragraph">
				<span class="c-document__paragraph-number">
					{{ $item['paragraph_number'] }}
				</span>
				{{ $item['paragraph_text'] }}
			</p>
		@endforeach
	</div>
	<div class="c-document__paginate" data-bottom-btn>
		@if($paginate != 1)
			<a href="/doutrina_social/{{ $paginate - 1 }}" class="c-document__paginate-link c-document__paginate-link--fisrt"></a>
		@endif
		<!-- provisory, correct is 29 -->
		@if($paginate < 8)
			<a href="/doutrina_social/{{ $paginate + 1 }}" class="c-document__paginate-link"></a>
		@endif
	</div>
	@include('partials.references')
</main>

<aside class="c-filter" data-filter>
	<button type="button" class="c-filter-close" data-filter-close>X</button>
	<div class="c-filter__form-holder">
		<form action="/filtro/doutrina_social" class="c-filter__form">
			<label for="social-doctrineText" class="c-filter__form-label">Procure na Doutrina Social</label>
			<input type="text" class="c-filter__form-input" placeholder="Ex: igreja, fé" name="t" id="social-doctrineText">
			<input type="submit" class="c-filter__form-submit" value="ok">
		</form>
	</div>
	<div class="c-filter__form-holder">
		<form action="/filtro/doutrina_social" class="c-filter__form">
			<label class="c-filter__form-label" for="social-doctrineNumber">Encontre por número</label>
			<input type="number" class="c-filter__form-input c-filter__form-input--num" step="0" min="1" max="578" name="n" id="social-doctrineNumber">
			<input type="submit" class="c-filter__form-submit" value="ok">
		</form>
	</div>
</aside>

@endsection


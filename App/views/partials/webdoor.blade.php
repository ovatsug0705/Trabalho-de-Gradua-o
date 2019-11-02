@php
	if (!empty($data['doc'])) {
		if ($data['doc'] == 'catecismo') {
			$doc = '- Catecismo';
		} elseif ($data['doc'] == 'canodo') {
			$doc = '- Código de Direito Canônico';
		} elseif ($data['doc'] == 'doutrina-social') {
			$doc = '- Doutrina Social';
		} elseif ($data['doc'] == 'biblia') {
			$doc = '- Bíblia';
		} elseif ($data['doc'] == 'enciclica') {
			$doc = '- Encíclicas papais';
		}
	}
@endphp

<div class="c-webdoor c-webdoor--{{ $data_page }}">
  <div class="c-webdoor__content content">
    <h1 class="c-webdoor__title o-title">{{ $title }} {{ $chapter ?? '' }} {{ $doc ?? '' }}</h1>
  </div>
</div>
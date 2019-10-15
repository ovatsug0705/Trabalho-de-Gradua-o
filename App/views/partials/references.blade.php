@php $content = false; @endphp

@foreach ($data as $item)
  @if (!empty($item['ref_text']))
  @php $content = true; @endphp
  @endif
@endforeach

@if($content)
  <section class="c-references">
    <span class="c-references__title">Referências</span>
    <div class="c-references__holder">
      @foreach ($data as $item)
        <p class="c-references__text">{{ $item["ref_text"] }}</p>
      @endforeach
    </div>
  </section>
@endif
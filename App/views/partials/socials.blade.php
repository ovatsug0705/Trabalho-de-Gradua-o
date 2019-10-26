@php
  $text_encoded = urlencode($text);
@endphp
<div class="c-socials">
  <p class="c-socials__text">Compartilhar:</p>
  <ul class="c-socials__list">
    <li class="c-socials__list__item">
      <a id='facebookbtn-link' href="https://www.facebook.com/sharer/sharer.php?u={{ $full_url }}" class="c-socials__link icon-facebook" target="_blank"
        title="Facebook">Facebook</a>
    </li>
    <li class="c-socials__list__item">
      <a id='twitterbtn-link' href="https://twitter.com/intent/tweet/?url={{ $full_url }}&text={{ $text_encoded }}" target="_blank"
        class="c-socials__link icon-twitter" title="Twitter">Twitter</a>
    </li>
  </ul>
</div>
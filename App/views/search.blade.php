{% extends "layouts/app.html" %}

{% block content %}
{% set data_page = 'Search' %}
{% include "partials/webdoor.html" %}

<main class="content s-search">
  <div class="s-search_container">
    <span class="s-search__desc s-search__desc--highlight">Resultados da busca por: <strong>{{ data.text }}</strong></span>
    {% for item in data.books %}
      <div class="s-search__row">
        <span class="s-search__desc">Bíblia</span>
        <a href="/biblia/{{ item.url_text }}" class="s-search__link">
          <strong class="s-search__highlight">{{ item.book_name }}</strong>
        </a>
      </div>
    {% endfor %}
    {% for item in data.encyclical %}
      <div class="s-search__row">
        <span class="s-search__desc">Encíclica</span>
        <a href="/enciclicas/{{ item.url_text }}" class="s-search__link">
          <strong class="s-search__highlight">{{ item.encyclical_name }}</strong>
        </a>
      </div>
    {% endfor %}
    {% if data.cano %}
      <div class="s-search__row">
        <a href="/canodo/" class="s-search__link">
          <strong class="s-search__highlight">Cânodo</strong>
        </a>
      </div>
    {% endif %}
    {% if data.catechism %}
      <div class="s-search__row">
        <a href="/catecismo/" class="s-search__link">
          <strong class="s-search__highlight">Catecismo</strong>
        </a>
      </div>
    {% endif %}
    {% if data.social_doctrine %}
      <div class="s-search__row">
        <a href="/doutrina_social/" class="s-search__link">
          <strong class="s-search__highlight">Doutrina Social</strong>
        </a>
      </div>
    {% endif %}
    {% if (not data.cano) and (not data.catechism) and (not data.encyclical) and (not data.books) and (not data.social_doctrine) %}
    <div class="s-search__row">
       <strong class="s-search__error">Desculpe não encontramos a sua busca :(</strong>
    </div>
    {% endif %}
  </div>
</main>

{% endblock content %}
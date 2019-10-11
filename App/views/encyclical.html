{% extends "layouts/app.html" %}

{% block content %}

{% set data_page = 'encyclical' %}
{% include "partials/webdoor.html" %}

<main class="c-document s-encyclic">
	<div class="c-document__holder">
		{% for item in data %}
			<p id="{{ item.paragraph_number }}" class="c-document__paragraph">
				<span class="c-document__paragraph-number">
					{{ item.paragraph_number }}
				</span>
				{{ item.paragraph_text }}
			</p>
		{% endfor %}
	</div>
	{% set link = data.0.url_text %}
	<div class="c-document__paginate" data-bottom-btn>
		{% if paginate != 1 %}
			<a href="/enciclicas/{{ link }}/{{ paginate - 1 }}" class="c-document__paginate-link c-document__paginate-link--fisrt">➜</a>
		{% endif %}
		{% if (paginate + 1) <= data.0.number_of_pages %}
			<a href="/enciclicas/{{ link }}/{{ paginate + 1 }}" class="c-document__paginate-link">➜</a>
		{% endif %}
	</div>
	{% include "partials/references.html" %}
</main>

<aside class="c-filter" data-filter>
	<button type="button" class="c-filter-close" data-filter-close>X</button>
	<div class="c-filter__form-holder">
		<form action="/filtro/enciclica" class="c-filter__form">
			<label for="encyclicText" class="c-filter__form-label">Procure nas encíclicas</label>
			<input type="text" class="c-filter__form-input" placeholder="Ex: igreja, fé" name="t" id="encyclicText">
			<input type="submit" class="c-filter__form-submit" value="ok">
		</form>
	</div>
</aside>
{% endblock %}

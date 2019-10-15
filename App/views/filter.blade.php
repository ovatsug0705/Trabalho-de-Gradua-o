{% extends "layouts/app.html" %}

{% block content %}
{% set data_page = 'Filter' %}
{% include "partials/webdoor.html" %}

<main class="content s-search">
  <div class="s-search_container">
		<span class="s-search__desc s-search__desc--highlight">Resultados da Filtragem por: <strong>{{ data.text }}</strong></span>
		{% if (not data.content) %}
    <div class="s-search__row">
			<strong class="s-search__error">Desculpe não encontramos a sua busca :(</strong>
		</div>
		{% else %}

			{% if (data.doc == 'catecismo') or (data.doc == 'canodo') or (data.doc == 'doutrina_social') %}
				{% for item in data.content %}
					{% if (item.paragraph_number % 20) is same as(0) %}
						{% set link = (item.paragraph_number / 20)|round(0 ,'floor') %}
					{% else %}
						{% set link = ((item.paragraph_number / 20)|round(0, 'floor')) + 1 %}
					{% endif %}
					<div class="s-search__row">
						<a href="/{{ data.doc }}/{{ link }}#{{ item.paragraph_number }}" class="s-search__link">
							<span class="c-document__highlight">
								{% if data.doc == 'catecismo' %}Catecismo{% endif %}
								{% if data.doc == 'canodo' %}Código de Direito Canônico{% endif %}
								{% if data.doc == 'doutrina_social' %}Doutrina Social{% endif %}
							 - {{ item.paragraph_number }}
							</span>
							<p class="c-document__paragraph">
								<span class="c-document__paragraph-number">
									{{ item.paragraph_number }}
								</span>
								{{ item.paragraph_text }}
							</p>
						</a>
					</div>
				{% endfor %}
			{% endif %}
			
			{% if data.doc == 'biblia' %}
				{% for item in data.content %}
					<div class="s-search__row">
						<a href="/biblia/{{ item.url_text }}/{{ item.chapter }}" class="s-search__link">
							<span class="c-document__highlight">{{ item.book_name }} - {{ item.chapter }}, {{ item.verser_number }}</span>
							<p class="c-document__paragraph">
								<span class="c-document__paragraph-number">
									{{ item.verser_number }}
								</span>
								{{ item.verser_text }}
							</p>
						</a>
					</div>
				{% endfor %}
			{% endif %}

			{% if data.doc == 'enciclica' %}
				{% for item in data.content %}
					{% if (item.paragraph_number % 20) is same as(0) %}
						{% set link = (item.paragraph_number / 20)|round(0 ,'floor') %}
					{% else %}
						{% set link = ((item.paragraph_number / 20)|round(0, 'floor')) + 1 %}
					{% endif %}
					<div class="s-search__row">
						<a href="/enciclicas/{{ item.url_text }}/{{ link }}" class="s-search__link">
							<span class="c-document__highlight">{{ item.encyclical_name }} - {{ item.paragraph_number }}</span>
							<p class="c-document__paragraph">
								<span class="c-document__paragraph-number">
									{{ item.paragraph_number }}
								</span>
								{{ item.paragraph_text }}
							</p>
						</a>
					</div>
				{% endfor %}
			{% endif %}

		{% endif %}
  </div>
</main>
{% endblock %}
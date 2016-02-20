{% set users = ["Dakia Franck", "Etchien Boa", "Zorora Elvis", "Aghar Aghar Rodrigue", "Mme Kouakou"] %}
<ul>
{% if users is iterable %}
	{% for key, user in users %}
		<li>{{ user }} {{ key }}</li>
	{% endfor %}
{% endif %}
</ul>
{{ 'now'|date("Y-d-m H:i:s", "Africa/Abidjan") }}

{{ "<p>Hello</p>"|e }}

{% set phone = 49929598 %}
{% if phone matches '/^[0-9]{8}$/' %}
	&middot; phone number is Ok
{% else %}

{% endif %}

{{ 5 / 2 }}
{{ "hello #{ 5 + 6 }" }}
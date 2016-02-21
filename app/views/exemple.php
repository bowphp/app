{% set users = ["Dakia Franck", "Etchien Boa", "Zorora Elvis", "Aghar Aghar Rodrigue", "Mme Kouakou"] %}
<ul>
{% if users is iterable %}
	{% for key, user in users %}
		<li>{{ user }} {{ key }}</li>
	{% endfor %}
{% endif %}
</ul>
{{ 'now'|date("Y-d-m H:i:s", "Africa/Abidjan") }} <br/>

{{ "<p>Hello</p>"|e }}<br/>

{% set phone = 49929598 %}
{% if phone matches '/^[0-9]{8}$/' %}
	&middot; phone number matched<br/>
{% else %}
	&middot; phone number no match<br/>
{% endif %}

5 / 2 = {{ 5 / 2 }} <br/>
{{ "hello #{ 5 + 6 }" }}
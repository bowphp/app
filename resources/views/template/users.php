<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>
			Users listes
		</title>
	</head>
	<body>
		<div style="margin: auto; width: 98%">
		{% for key, user in users %}
			<div style="position: relative; background-color: #eee; float: left; width: 300px; font-family: 'Inconsolata'; color: #555; padding: 5px; border-radius: 5px; box-shadow: 0px 1px 1px #aaa; font-size: 15px; margin: 15px; ">
				<span style="position: absolute; right: 5px; top: 5px; ">(key: {{key}})</span>
				<span style="position: absolute; right: 5px; bottom: 5px; "><a href="/users/{{users|length > 1 ? user.id : ''}}" style="color: #47E">view</a></span>
				<span style="color: #47E">id</span>: {{user.id|lower}}<br/>
				<span style="color: #47E">name</span>: {{user.name|lower}}<br/>
				<span style="color: #47E">lastname</span>: {{user.lastname|lower}}<br/>
				<span style="color: #47E">email</span>: {{user.email}}<br/>
			</div>
		{% endfor %}
		</div>
	</body>
</html>
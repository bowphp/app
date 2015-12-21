<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Template - Test</title>
	<style type="text/css">
		body {
			font-family: inconsolata, "verdana";
			text-align: center;
			font-size: 18px;
			color: #FFF;
			background-color: #303030;
		}
		h1 {
			background-color: #323639;
		}
		dd {
			margin: 0;
			padding-top: 5px;
		}
		span:hover {
			cursor: pointer;
			padding: 5px;
			background-color: #356FCE;
		}
		.to {
			margin: auto;
			text-align: left;
			background-color: #262626;
			vertical-align: top;
			width: 500px;
			max-width: 500px;
		}
		h1, .to {
			min-width: 500px;
			padding: 10px;
			border: #000 1px solid;
		}
		a {
			color: inherit;
			text-decoration: none;
		}

		.right {
			float: right;
			color: #487;
		}
		.right:hover {
			text-decoration: underline;
		}
	</style>
</head>
<body>
	<h1>{{name}}</h1>
	<div class="to">
		<h3>Contributeurs. {{info}}</h3>
		<dl>
		{{#liste}}
			<dd><span><a href="mailto:{{email}}">{{name}} {{lastname}} - {{email}}</a></span><a href="/Php/Snoop/{{id}}" class="right">Voir</a></dd>
		{{/liste}}
		</dl>
		<p>{{licence}}</p>
	</div>
</body>
</html>
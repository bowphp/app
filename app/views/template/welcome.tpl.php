<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Hello</title>
	<style type="text/css">
		div {
			font-family: Helvetica, Arial;
			font-size: 20px;
			margin-left: 50px;
			margin-top: 50px;
			padding: 20px;
			color: #151515;
		}
		p.name {
			border-left: solid 2px #0480be;
			padding: 10px;
		}
		span.i {
			font-style: italic;
			display: inline-block;
			font-size: 10px;
		}
		code {
			font-weight: bold;
			color: #151515;
			font-family: monaco;
		}
		pre {
			margin-left: -100px;
			font-size: 18px;
		}
		.r {
			color: #bd362f;
		}
		.m {
			color: #004ab3;
		}
		.b {
			color: #bd362f;
		}
		a {
			font-size: 12px;
		}
	</style>
</head>
<body>
	<div>
		<p class="name">Welcome in { snoopframework }<br/>
			<span class="i">The Snoop Framework, simplify de webdev</span><br/>
			<a href="https://github.com/papac/snoop" target="_blank">fork me</a> &middot; <a href="https://snoopframework.github.io" target="_blank">doc</a>
		</p>
		<pre>
			<code id="code">
	1 $app->get("/", function($req, $res) {
	2
	3	$res->render("welcome");
	4
	5 });
			</code>
		</pre>
	</div>
	<script type="text/javascript">
		var code = document.getElementById("code");
		var content = code.innerHTML;
		content = content.replace(/(".+")/g, '<span class="m">$1</span>');
		content = content.replace(/(function)/g, '<span class="b">$1</span>');
		content = content.replace(/(\$)/g, '<span class="r">$1</span>');
		code.innerHTML = content;
	</script>
</body>
</html>
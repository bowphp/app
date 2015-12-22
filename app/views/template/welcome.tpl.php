<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Hello</title>
	<link rel="stylesheet" href="/public/css/prism.css">
	<style type="text/css">
		body {
			background: url(/public/images/snoop.gif) no-repeat center top 100px;
			margin: auto;
			width: 600px;
		},
		div {
			color: #151515;
			font-family: Helvetica, Arial;
		}
		p.name {
			border-left: solid 10px #1F2839;
			padding: 10px;
			margin-top: 100px;
		}
		.f-g {
			font-size: 30px;
		}
		span.i {
			font-style: italic;
			display: inline-block;
			font-size: 10px;
		}
		a {
			font-size: 13px;
		}
		.f {
			color: #bd362f;
		}
	</style>
</head>
<body>
	<div>
		<p class="name f-g">Welcome in { <span class="f">snoopframework</span> }<br/>
			<span class="i">The Snoop Framework, simplify de webdev</span><br/>
			<a href="https://github.com/papac/snoop" target="_blank">fork me</a> &middot; <a href="https://snoopframework.github.io" target="_blank">doc</a>
		</p>
		<pre><code class="language-php">$app->get("/", function($req, $res) {
	render("welcome");
});</code></pre>
	</div>
	<script type="text/javascript" src="/public/javascript/prism.js"></script>
</body>
</html>
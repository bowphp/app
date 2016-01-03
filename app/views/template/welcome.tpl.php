<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Hello</title>
	<style type="text/css">
		body {
			/*background: url(/public/images/snoop.gif) no-repeat center top 100px;*/
			margin: auto;
			width: 600px;
		},
		div {
			color: #151515;
			font-family: Helvetica, Arial;
		}
		p.name {
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
			border-radius: 2px;
			background-color: #555;
			color: #fff;
			padding: 5px;
			text-decoration: none;

		}
		a:hover {
			background-color: dimgrey;
		}
		.f {
			color: #bd362f;
		}
		.shell, .php {
			font-family: monaco;
			padding: 8px;
			border-radius: 5px;
			background-color: #555;
			color: #fff;
		}
		.shell {
			margin-bottom: 5px;
		}
	</style>
</head>
<body>
	<div>
		<p class="name f-g">Welcome in { <span class="f">snoop framework</span> }<br/>
			<span class="i">The Snoop Framework, simplify your webdev</span><br/>
			<a href="https://github.com/papac/snoop.git" target="_blank">fork me</a> &middot; <a href="https://papac.github.io" target="_blank">doc</a>
		</p>
		<div class="shell">$ composer create-projet snoop/snoop --prefer-dist App</div>
		<!-- <div class="php">
			<div>1 $app->get("/", function($req, $res) {</div>
			<div>2&nbsp;</div>
			<div>3<span style="position:relative; left: 50px;">render("welcome");</span></div>
			<div>4&nbsp;</div>
			<div>5 });</div>
		</div> -->
	</div>
	<script type="text/javascript">
		var shell = document.querySelector(".shell");
		var css = document.querySelector(".css");

	</script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Hello</title>
	<style type="text/css">
		body {
			/*background: url(/public/images/snoop.gif) no-repeat center top 100px;*/
			margin: auto;
			width: 550px;
			text-align: center;
		},
		div {
			color: #151515;
			font-family: monospace, monaco, 'Inconsolata', 'Menlo', "Menlo For PowerLine";
		}
		.f-g {
			font-size: 60px;
			position: relative;
		}
		span.i {
			font-style: italic;
			font-size: 10px;
			padding: 5px;
			position: absolute;
			left: 35px;
			top: 55px;
		}
		a {
			font-size: 13px;
			border-radius: 2px;
			background-color: #bd362f;
			color: #fff;
			padding: 5px;
			text-decoration: none;
		}
		a:hover {
			background-color: #555;
		}
		.f {
			color: #bd362f;
			font-weight: bolder;
			font-family: "Courier";
			position: relative;
		}
		.shell {
			margin-bottom: 5px;
			color: #ccc;
			font-family: "Courier";
			padding: 8px;
			border-radius: 5px;
			background-color: #eee;
			font-weight: bold;
			color: #555;
		}
	</style>
</head>
<body>
	<div>
		<p class="name f-g"><span class="f">Bow.framework</span><span class="i">The Bow . Framework, simplify your webdev</span></p>
		<p><a href="https://github.com/papac/bow.git" target="_blank">fork me</a> <a href="https://papac.github.io" target="_blank">doc</a></p>
		<div class="shell"><span style="color: red">$</span> composer <span style="color: #bd362f">create-projet</span> bow/bow <span style="color: #bd362f">--prefer-dist</span> App</div>
	</div>
</body>
</html>
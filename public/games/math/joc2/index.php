<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
		<link rel="stylesheet" type="text/css" href="stiluri.css">
		<script type="text/JavaScript">
			<?PHP
				if(!isset($LANGUAGE))$LANGUAGE="ro";
				echo 'var LIMBA="'.$LANGUAGE.'";';
			?>
		</script>
		<script type="text/JavaScript" src="../text/lang-ro.js"></script>
		<script type="text/JavaScript" src="config.js"></script>
		<script type="text/JavaScript" src="joc.js"></script>
	</head>
	<body>
		<div>
			<canvas id="canvasjoc" width="640" height="480" />
		</div>
		<span id="se_incarca">
			<img src="../imagini/asteapta.gif" alt="asteapta mesaj de la server" height="32" width="32" />
		</span>
		<div id="debug">
			DEBUG
		</div>
		<script>
			Init();
		</script>
	</body>
</html>

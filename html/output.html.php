<html>
<head>
	<meta charset="UTF-8">
	<title>I Have Plans &middot; Error Page</title>
	<link href="css/general.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<?php if(isset($error)) {
			echo ('<h2>'.$error.'</h2>');
		}?>
	</div>
</body>
</html>
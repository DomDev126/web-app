<!--
 * I Have Plans -- Error View
 
 * @author Steven Dufresne <steven@enserfud.ca>
 * @link http://github.com/StevenDufresne/web-app
 * @copyright 2012 Steven Dufresne
 * @license BSD-3-Clause <https://github.com/stevendufresne/web-app/BSD-3-CLAUSE-LICENSE.txt>
-->
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
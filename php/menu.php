<!-- dynamic menu -->

<nav id="main-nav" class="navbar navbar-inverse">
	<ul>
		<li><a href="index.php?state=home">Home</a></li>
		<?php 
			//logout visible only when logged in
			if(is_logged_in()) {
				echo '<li><a href="index.php?state=logout">Logout</a></li>'."\n";
			}
		?>

		<?php
			//register visible only when NOT logged in
			if(!is_logged_in()) {
				echo '<li><a href="index.php?state=register">Register</a></li>'."\n";
			}
		?>

		<?php
			if(!is_logged_in()) {
				echo '<li><a href="index.php?state=login">Login</a></li>'."\n";
			}
		?>

		<?php
			if(is_logged_in()) {
				echo '<li><a href="index.php?state=post">Post</a></li>'."\n";
			}
		?>
	</ul>
</nav>

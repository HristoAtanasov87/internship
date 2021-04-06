<?php
require_once 'includes/header.php';
?>
    <div>
		<h2>Login Page</h2>
		<a href="index.php">Click here to go back</a><br/><br/>
		<form action="includes/checklogin.php" method="post">
			<input type="text" name="username" placeholder="Enter username"/> <br/>
			<input type="password" name="password" placeholder="Enter password"/> <br/>
			<button type="submit" name="submit">Login</button>
		</form>
    </div>
<?php
require_once 'includes/footer.php';
?>
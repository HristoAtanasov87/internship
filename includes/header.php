<?php 
	session_start();
    require_once 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Jobs</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">

	<link rel="stylesheet" href="./css/master.css">
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="site-wrapper">
		<header class="site-header">
			<h1 class="site-title"><a href="index.php">Job Offers</a></h1>
			<?php
    		if (isset($_SESSION['sessionUser'])) {
        		echo "You are logged in!";
    		} else {
        		echo "Please login with admin account to edit/delete listings!";
				echo "<br>";
				echo "<a href=showLogin.php>Login</a>";
				echo "<br>";
    		}
			?>

			<?php
			echo "<br>";
			if (isset($_SESSION['sessionUser'])) {
				echo "<a href=includes/logout.php name=logout>Logout</a>";
				echo "<br>";

				echo "<a href=showEdit.php>Edit/Delete</a>";
				echo "<br>";
			}
			?>
            <a href="showCreate.php">Create listing</a>
			<br>
			<br>
			<form action="showSearch.php" method="GET">
				<input type="text" name="query" />
				<input type="submit" value="Search" />
			</form>
			
		</header>
		<hr>
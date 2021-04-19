<?php
session_start();
?>
<!doctype html>
<html>
<head>
<title>Bug P.I. - Login</title>
<style>
</style>
</head>
<body>
	<?php
		// Send details to controller
		include 'loginController.php';
	
		class loginBoundary {
			// Display UI function
			function displayPage() {
				echo
					"<div id='pageContainer'>
						<div id='loginPage'>
							<form method='POST' id='loginForm'>
								<p><input id='userid' class='required' type='text' name='userid' placeholder='user id' /></p>
								<p><input id='password' class='required' type='password' name='password' placeholder='password' /></p>
								<p class='submit' id='loginSubmit'>
								<input type='submit' name='submitButton' value='LOGIN''/>
								</p>
							</form>
						</div>
						<footer>
							<p>Copyright © 2020 Club Penguin. All rights reserved.</p>
						</footer>
					</div>";
				}
		
			// Login function to send input
			function sendInput() {
				// Variables
				$userid = $_POST['userid'];
				$password = $_POST['password'];
				
				// Create controller class
				$newLogin = new LoginController($userid, $password);
				// Run controller class function
				$newLogin->validateInput();
				}
			}
			
		// Create boundary class
		$loginPage = new loginBoundary();
		// Run boundary class function
		$loginPage->displayPage();
		
		// If 'Login' button is pressed, run function
		if (array_key_exists('submitButton', $_POST)) {
			$loginPage->sendInput();
		}
	?>
</body>
</html>
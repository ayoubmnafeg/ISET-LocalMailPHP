<!DOCTYPE html>
<html>
<head>
	<title>mail mini projet</title>
	<link rel="stylesheet" type="text/css" href="./style/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
	<script>
	function validate(){
		if(!document.getElementById("password").value==document.getElementById("confirm_password").value)
			document.getElementById("errmsg").innerText ="aaa";
		return document.getElementById("password").value==document.getElementById("confirm_password").value;
    }
    </script>
	<style>.red{color: red;}</style>
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<form method="post" action="./access/SignIn.php" name="f">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="E-mail" placeholder="E-mail" required>
					<input type="password" name="pswd" placeholder="Password" required>
					<input type="submit" name="SubmitButton" value="Login"/>
					<?php
					if(isset($_GET['err'])) {
						if ($_GET['err'] == "wrongpassword") 
						    echo "<center class=red>wrong password !</center>";
						elseif ($_GET['err'] == "wrongemail") 
						    echo "<center class=red>wrong email !</center>";
					}
					?>
				</form>
			</div>
			<div class="login">
				<form method="post" onSubmit="return validate()" action="./access/SignUp.php" name="f2">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="name" placeholder="name" required>
					<input type="email" name="E-mail" placeholder="E-mail" required>
					<input type="password" id="password" name="pswd" placeholder="Password" required>
					<input type="password" id="confirm_password" name="pswdcp" placeholder="confirm Password" required>
					<input type="submit" name="SubmitButton" value="Sign up"/>
				</form>
			</div>
			
	</div>
</body>
</html>
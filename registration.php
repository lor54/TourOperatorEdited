<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registrazione</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['email'])){
        // removes backslashes
 $role = stripslashes($_REQUEST['role']);
 
 echo $role;
        //escapes special characters in a string
 $email = stripslashes($_REQUEST['email']);
 $email = $conn->real_escape_string($email);
 $password = stripslashes($_REQUEST['password']);
 $password = $conn->real_escape_string($password);
 $trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (password, email)
VALUES ('".md5($password)."', '$email')";
        $result = $conn->query($query);
        if($result){
            echo "<div class='form'>
<h3>Ti sei registrato con successo!</h3>
<br/>Clicca quì per <a href='login.php'>Accedere</a></div>";
        }
    }else{
?>
		<div id="parent" >
			<form id="child" action="" method="post" name="registration">
				<table align="center" cellpadding="2" cellspacing="2" border="0">
					<tr>
						<td>
							<img src="img/logo.png" width="400px" height="59px">
							<h1>Registrazione</h1>
						</td>
					</tr>	
					<tr>
						<td>
                                                        <input type="text" name="nome" placeholder="Nome" required />
						</td>
					</tr>
					<tr>
						<td>
                                                        <input type="text" name="cognome" placeholder="Cognome" required />
						</td>
					</tr>
					<tr>
						<td>
                                                        <input type="email" name="email" placeholder="Email" required />
						</td>
					</tr>
					<tr>
						<td>
                                                        <input type="password" name="password" placeholder="Password" required />
						</td>
                                        </tr>
					<tr>
						<td>
                                                        <input type="submit" name="submit" value="Registrati" />
						</td>
					</tr>
				</table>
			</form>
		</div>
<?php } ?>
</body>
</html>
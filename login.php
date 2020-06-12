<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<?php
require ('db.php');
session_start();

if (isset($_POST['email']))
{

    $email = stripslashes($_REQUEST['email']);

    $email = $conn->real_escape_string($email);
    $password = stripslashes($_REQUEST['password']);
    $password = $conn->real_escape_string($password);

    $query = "SELECT * FROM `cliente` WHERE email='$email'
		and password='" . md5($password) . "'";
    $result = $conn->query($query) or die($conn->sqlstate);
    $rows = $result->num_rows;
    $obj = $result->fetch_object();
    echo $rows;
    if ($rows == 1)
    {
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $obj->nome;
        $_SESSION['cognome'] = $obj->cognome;

        // Rendirizza a index.php
        header("Location: index.php");
    }
    else
    {
        echo "<div class='form'>
		<h3>Email/password non corretto.</h3>
		<br/>Clicca quì per <a href='login.php'>Accedere</a></div>";
    }
}
else
{
?>
		<div id="parent" >
			<form id="child" action="" method="post" name="login">
				<table align="center" cellpadding="2" cellspacing="2" border="0">
					<tr>
						<td>
							<img src="img/logo.png" width="400px" height="59px">
							<h1>Accesso</h1>
						</td>
					</tr>	
					<tr>
						<td>
							<input type="text" name="email" placeholder="Email" required />
						</td>
					</tr>
					<tr>
						<td>
							<input type="password" name="password" placeholder="Password" required />
						</td>
					</tr>
					<tr>
						<td>
							<input name="submit" type="submit" value="Login" />
						</td>
					</tr>
					<tr>
						<td>
							<p>Non sei ancora registrato? <a href='registration.php'>Registrati Quì</a></p>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<?php
} ?>
	</body>
</html>

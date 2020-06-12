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
if (isset($_REQUEST['email'])){
 
 $email = stripslashes($_REQUEST['email']);
 $email = $conn->real_escape_string($email);
 $password = stripslashes($_REQUEST['password']);
 $password = $conn->real_escape_string($password);

 $nome = stripslashes($_REQUEST['nome']);
 $nome = $conn->real_escape_string($nome);
 $cognome = stripslashes($_REQUEST['cognome']);
 $cognome = $conn->real_escape_string($cognome);
 $cf = stripslashes($_REQUEST['cf']);
 $cf = $conn->real_escape_string($cf);
 $indirizzo = stripslashes($_REQUEST['indirizzo']);
 $indirizzo = $conn->real_escape_string($indirizzo);
 $citta = stripslashes($_REQUEST['citta']);
 $citta = $conn->real_escape_string($citta);
 $cap = stripslashes($_REQUEST['cap']);
 $cap = $conn->real_escape_string($cap);
 $stato = stripslashes($_REQUEST['stato']);
 $stato = $conn->real_escape_string($stato);

 $trn_date = date("Y-m-d H:i:s");
        $query = 'INSERT into `cliente` (cod_fisc, nome, cognome, email, password, indirizzo, citta, cap, stato, tipo) VALUES ("' . $cf . '", "' . $nome . '", "' . $cognome . '", "' . $email . '", ' . 'md5("' . $password . '"), "' . $indirizzo . '", "' . $citta . '", "' . $cap . '", "' . $stato . '", "STAFF")';
		$result = $conn->query($query);
        if($result){
            echo "<div class='form'>
<h3>Ti sei registrato con successo!</h3>
<br/>Clicca quì per <a href='login.php'>Accedere</a></div>";
        }
    }else{
?>
		<div id="parentReg" >
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
                                                        <input type="text" name="cf" placeholder="Codice Fiscale" required />
						</td>
					</tr>
										<tr>
						<td>
                                                        <input type="text" name="indirizzo" placeholder="Indirizzo" required />
						</td>
					</tr>
										<tr>
						<td>
                                                        <input type="text" name="citta" placeholder="Città" required />
						</td>
					</tr>
										<tr>
						<td>
                                                        <input type="text" name="cap" placeholder="CAP" />
						</td>
					</tr>
										<tr>
						<td>
                                                        <input type="text" name="stato" placeholder="Stato" required />
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
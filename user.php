<?php
    require('db.php');
    include("auth.php");

	if (isset($_GET['search'])) {
		$searchInput = $_GET['search'];
		$query = "SELECT titolo, durata, costo from viaggio where titolo LIKE '$searchInput'";

        $result = $conn->query($query);

        if (!$result) {
            $error = $conn->error;
        }
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Dashboard - Page Sicura</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <?php include("includes/navbar.php"); ?>
        <div class="w3-row" style="margin-top: 10%">
            <?php if (isset($error)) {
                echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$error.'</div>';
            } ?>
            <div class="w3-col s7 w3-center" style="margin-left: 20%; border-style: solid;">
                <div class="search-container">
                    <form action="" method="get">
                        <input type="text" placeholder="Cerca.." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                
                <?php 
                    if($result) { 
                        echo '<h1> I tuoi viaggi prenotabili: </h1>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Titolo</th>
                                        <th>Durata</th>
                                        <th>Prezzo</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr><td>".$row["titolo"]."</td><td>".$row["durata"]."</td><td>".$row["costo"]."</td></tr>";
                                        }
                                    }
                                echo '
                                </tbody>
                            </table>
                        </div> ';
                    }
                ?>
            </div>
        </div>
        <?php include("includes/footer.php"); ?>
    </body>
</html>
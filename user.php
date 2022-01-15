<?php
    require('db.php');
    include("auth.php");

	if (isset($_GET['search'])) {
		$searchInput = $_POST['search'];
		$query = "SELECT * from viaggio where titolo LIKE '$searchInput'";

        $result = $conn->query($query);
        if (!$result) {
            $error = $conn->error;
        }
	}
        $query = "SELECT id_viaggio, titolo, n_persone from prenotare join viaggio on prenotare.id_viaggio = viaggio.id group by titolo";
        $result = $conn->query($query) or die($conn->sqlstate);

        $rows = array();
        while($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            $rows[] = $row;
        }

        $i = 0;
        $titoli = array();
        foreach($rows as $row)
        {
            array_push($titoli, array(
                0 => $row['titolo'],
                1 => (int) $row['n_persone']
            ));
        }

    //print_r($titoli);
    
    /*while ($graphArr = $result->fetch_array(MYSQLI_ASSOC)) {
        printf("ID: %s  Name: %s", $graphArr["id"], $graphArr["name"]);
    }*/
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
                
                <h1> I tuoi viaggi prenotati: </h1>
            </div>
        </div>
        <?php include("includes/footer.php"); ?>
    </body>
</html>
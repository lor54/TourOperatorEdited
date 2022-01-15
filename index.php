<?php
    require('db.php');
    include("auth.php");

    $query = "SELECT SUM(COSTO * N_PERSONE) AS fatturato FROM viaggio JOIN prenotare ON viaggio.id = prenotare.id_viaggio";
    $result = $conn->query($query) or die($conn->sqlstate);
    $rows = $result->num_rows;
    $obj = $result -> fetch_object();
    $fatturato = $obj->fatturato;

    $query = "SELECT id_viaggio, titolo, sum(n_persone) as n_persone from prenotare join viaggio on prenotare.id_viaggio = viaggio.id group by titolo";
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
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            // Load google charts
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            // Draw the chart and set the chart values            
            function drawChart() {
                var s = '<?php echo json_encode($titoli); ?>';
                var obj = JSON.parse(s);
                obj.unshift(['Viaggio', 'Numero di Persone']);
                console.log(obj);
                var data = google.visualization.arrayToDataTable(obj);

                // Optional; add a title and set the width and height of the chart
                var options = {'title':'Passeggeri per Viaggio', 'width':550, 'height':400};

                // Display the chart inside the <div> element with id="piechart"
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
        <?php include("includes/navbar.php"); ?>
        <div class="w3-row" style="margin-top: 10%">
            <div class="w3-col s7 w3-center" style="margin-left: 4%; padding-left: 10%; border-style: solid;">
                <div id="piechart"></div>
            </div>
            <div class="w3-col s4 w3-center" style="padding-bottom: 5.6%; border-style: solid;">
                <h1>Fatturato Totale: </h1>
                <span class="w3-tag w3-padding w3-round-large w3-red w3-center">
                    <p class="w3-jumbo"><?php echo $fatturato; ?></p>
                </span>
            </div>
        </div>
        <?php include("includes/footer.php"); ?>
    </body>
</html>
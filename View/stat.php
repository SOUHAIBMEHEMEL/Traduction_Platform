<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>statistiques</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container" style="margin-right: 20%;">
    <div class="row">
        <div class="col-md-6">
            <h2>nombre de devis par client:</h2>
            <table class='table table-bordered'>
                <tr>
                    <th>nom du client</th><th>nbr de devis</th>
                </tr>
                <?php
                $dataPoints = array();
                $x=0;
                $y=0;
                $hostname="localhost";
                $username="root";
                $password="";
                $db = "tdw";
                $dbh = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
                foreach($dbh->query('SELECT user_id,nom,prenom,COUNT(*) FROM demandedevi LEFT JOIN devi ON demandedevi.devi_id=devi.id  GROUP BY user_id') as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['nom'] . " " . $row['prenom']."</td>";
                    echo "<td>" . $row['COUNT(*)'] . "</td>";
                    echo "</tr>";
                    $myrow=array("y" =>$row['COUNT(*)'], "label" =>  $row['nom'] . " " . $row['prenom']);
                    $dataPoints[$x]=$myrow;
                    $x++;
                }
                ?>
                </tbody></table>
            <script>
                window.onload = function() {

                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        theme: "light2",
                        title:{
                            text: "nombre de demandes de devis"
                        },
                        axisY: {
                            title: "nombre de demandes"
                        },
                        data: [{
                            type: "column",
                            yValueFormatString: "#,##0.## tonnes",
                            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                        }]
                    });
                    chart.render();

                }
            </script>
        </div>
    </div>
</div>
<div id="chartContainer" style="height: 370px; width: 60%;"></div>
<script src="js/canvasjs.min.js"></script>
</body>
</html>

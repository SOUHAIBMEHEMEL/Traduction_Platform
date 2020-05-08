<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Statistiques</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>nombre de fois du choix du traducteurs</h2>
            <table class='table table-bordered'>
                <tr>
                    <th>nom du traducteur</th><th>nbr de fois choisi</th>
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
                foreach($dbh->query('SELECT traducteur_id,user_name,COUNT(*) FROM demandedevi LEFT JOIN traducteur ON demandedevi.traducteur_id=user_id  GROUP BY user_id') as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['user_name']."</td>";
                    echo "<td>" . $row['COUNT(*)'] . "</td>";
                    echo "</tr>";
                    $myrow=array("y" =>$row['COUNT(*)'], "label" => $row['user_name']);
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
                            text: "choix"
                        },
                        axisY: {
                            title: "choix"
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
<div id="chartContainer" style="height: 370px; width: 60%; margin-right: 20%"></div>
<script src="js/canvasjs.min.js"></script>
</body>
</html>

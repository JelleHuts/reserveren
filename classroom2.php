<?php
  require 'server.php';

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ./login.php");
}
?>
<style>
    body{
        background-color: #343a40!important;
    }
</style>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classroom</title>
    <link rel="stylesheet" href="css/material-dashboard.min.css">
</head>
<body>
<main class="container bg-dark">
        <div class="row">
            <div class="col-md-6">
                    <div class="text-center pt-5" id="clock"></div>
            </div>
            <div class="col-md-6">
                <div class="card bg-secondary text-light">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Reservaties</h4>
                        <p class="card-category">Eerst volgende reservaties</p>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover-secondary">
                            <thead class="text-success">
                                <tr>
                                    <th>Datum</th>
                                    <th>Start tijd</th>
                                    <th>Eind tijd</th>
                                    <th>Lokaal</th>
                                    <th>Gepland door</th>
                                    <th>Met wie</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php
                                        $lokaal = $_GET['classroom'];
                                        $sql = "SELECT * FROM reservaties  WHERE date  >= CURRENT_DATE() ORDER BY date ASC, time_start"; 
                                        $result = mysqli_query($db, $sql) or die(mysqli_query($db));
                                        while ($row = $result->fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td class='text-light'>" . $row['date'] . "</td>";
                                            echo "<td class='text-light'>" . $row['time_start'] . "</td>";
                                            echo "<td class='text-light'>" . $row['time_end'] . "</td>";
                                            echo "<td class='text-light'>" . $row['lokaal'] . "</td>";
                                            echo "<td class='text-light'>" . $row['name'] . "</td>";
                                            echo "<td class='text-light'>" . $row['met_wie'] . "</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="./js/jQuery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#clock").load("classroom_clock.php");
            setInterval(() => {
                $("#clock").load("classroom_clock.php");
            }, 1000);
        });
    </script>
</body>
</html>
</body>
</html>
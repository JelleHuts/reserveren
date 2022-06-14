<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classroom</title>
    <link rel="stylesheet" href="css/classroom.css">
</head>
<body class="bg-dark">
<main class="container bg-dark">
    
        <div class="row">
        <div class="col-md-12 mt-4">
            <div class="row">
                <div class="col-md-9 col-6"><div class="text-left pt-5 mt-4" id="clock"></div></div>
                <div class="col-md-3 col-6"><img  src="img/qr2.png" class="img-fluid"></div>
            
        </div></div>
        
        
            
        <div class="col-md-12 mt-4"><div class=" text-center">
            <p class="h3 text-warning ">Let op! reserveringen krijgen voorrang voor het lokaal.</p>
        </div>
                <div class="card bg-secondary text-light">
                    <div class="card-header card-header-success text-center">
                        <h2 class="card-title">Vandaag</h2>
                        <p class="card-category h3">reserveringen van vandaag</p>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover-secondary">
                            <thead class="text-success">
                                <tr>
                                    <th style="font-size: 25px;">Datum</th>
                                    <th style="font-size: 25px;">Start tijd</th>
                                    <th style="font-size: 25px;">Eind tijd</th>
                                    <th style="font-size: 25px;">Lokaal</th>
                                    <th style="font-size: 25px;">Gepland door</th>
                                    <th style="font-size: 25px;">Met wie</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php
                                        $lokaal = $_GET['classroom'];
                                        $sql = "SELECT `id`,  DATE_FORMAT(date, '%d-%m') AS datum, TIME_FORMAT(time_start, '%H:%i') AS begin, TIME_FORMAT(time_end, '%H:%i') AS end, `name`, `lokaal`, `met_wie` FROM reservaties  WHERE lokaal = '$lokaal' AND date = CURRENT_DATE() AND time_end >= CURRENT_TIME() ORDER BY date ASC, time_start  "; 
                                        $result = mysqli_query($db, $sql) or die(mysqli_query($db, ""));
                                        $row_cnt = mysqli_num_rows($result);
                                        if($row_cnt == 0){
                                            echo "<tr>";
                                            echo "<td colspan='6' class='text-light'>" . '<h3 class="text-center">Vandaag nog geen reserveringen</h3>' . "</td>";
                                            echo "</tr>";
                                            
                                        } else {
                                        while ($row = $result->fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td class='text-light h3'>" . $row['datum'] . "</td>";
                                            echo "<td class='text-light h3'>" . $row['begin'] . "</td>";
                                            echo "<td class='text-light h3'>" . $row['end'] . "</td>";
                                            echo "<td class='text-light h3'>" . $row['lokaal'] . "</td>";
                                            echo "<td class='text-light h3'>" . $row['name'] . "</td>";
                                            echo "<td class='text-light h3'>" . $row['met_wie'] . "</td>";
                                            echo "</tr>";
                                        } }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <main class="container bg-dark">
        <div class="row">
            <div class="col-md-12">
                    <div class="text-center pt-5" id="clock"></div>
            </div>
            <div class="col-md-12 ">
                <div class="card bg-secondary text-light">
                    <div class="card-header card-header-success text-center">
                        <h2 class="card-title">Reserveringen</h2>
                        <p class="card-category h3">alle ingeplande reserveringen</p>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover-secondary">
                            <thead class="text-success">
                                <tr>
                                    <th style="font-size: 25px;">Datum</th>
                                    <th style="font-size: 25px;">Start tijd</th>
                                    <th style="font-size: 25px;">Eind tijd</th>
                                    <th style="font-size: 25px;">Lokaal</th>
                                    <th style="font-size: 25px;">Gepland door</th>
                                    <th style="font-size: 25px;">Met wie</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php
                                    setlocale(LC_ALL, 'nl_NL');
                                        $lokaal = $_GET['classroom'];
                                        $sql = "SELECT `id`, DATE_FORMAT(date, '%d-%m') AS datum, TIME_FORMAT(time_start, '%H:%i') AS begin, TIME_FORMAT(time_end, '%H:%i') AS end, `name`, `lokaal`, `met_wie` FROM reservaties WHERE lokaal = '$lokaal' AND date >= CURRENT_TIMESTAMP() ORDER BY date ASC, time_start"; 
                                        $result = mysqli_query($db, $sql) or die(mysqli_query($db, ""));
                                        $row_cnt = mysqli_num_rows($result);
                                        if($row_cnt == 0){
                                            echo "<tr>";
                                            echo "<td colspan='6' class='text-light'>" . '<h3 class="text-center">Nog geen reserveringen</h3>' . "</td>";
                                            echo "</tr>";
                                            
                                        } else {
                                        while ($row = $result->fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td class='text-light h3'>" . $row['datum'] . "</td>";
                                            echo "<td class='text-light h3'>" . $row['begin'] . "</td>";
                                            echo "<td class='text-light h3'>" . $row['end'] . "</td>";
                                            echo "<td class='text-light h3'>" . $row['lokaal'] . "</td>";
                                            echo "<td class='text-light h3'>" . $row['name'] . "</td>";
                                            echo "<td class='text-light h3'>" . $row['met_wie'] . "</td>";
                                            echo "</tr>";
                                        }}
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
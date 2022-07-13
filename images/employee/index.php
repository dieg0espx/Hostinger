<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="5"> -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Employees</title>
</head>
<body>
    <script src="script.js"></script>
    <div class="title">
        <h1> Payroll </h1>
    </div>
    <?php
        function console_log( $data ){
            echo '<script>';
            echo 'console.log('. json_encode( $data ) .')';
            echo '</script>';
        }
        include 'connection.php';
        $currentCode = 2502;
        $allNames = [];
        $conexion = mysqli_connect($servername, $username, $password, $dbname) or die("Problemas con la conexión");
        $registros = mysqli_query($conexion, "select * from employees order by name ASC ");
        //INSERTING ALL EMPLOYEES BY KEY => VALUE
        while ($reg = mysqli_fetch_array($registros)) { 
          $allNames +=  [$reg['code'] => $reg['name']];
        }
        $registros = mysqli_query($conexion, "SELECT * FROM payroll WHERE code = '$currentCode'");
    ?>
    <div class="wrapper">
        <div class="box" id="overlay" ></div>
        <div class="list">
            <?php
                $i = 0;
                while ($reg = mysqli_fetch_array($registros)) { ?>
                <div class="preElement" id="<?php echo "preElement".$i; ?>">
                    <p> <?php echo date("M j, Y", strtotime($reg['dateFrom']))." - ".date("M j, Y", strtotime($reg['dateTo'])); ?> </p>
                    <i id="<?php echo "btnShow".$i; ?>" class="bi bi-chevron-down btn-show" onClick="showElement(<?php echo $i; ?>)" ></i>
                    <i id="<?php echo "btnHide".$i; ?>" class="bi bi-chevron-up btn-hide" onClick="hideElement(<?php echo $i; ?>)" ></i>
                </div>
                <div class="element" id="<?php echo "element".$i; ?>">                 
                    <p> <i class="bi bi-calendar2-week"></i>  From:        <?php echo $reg['dateFrom']; ?> </p>
                    <p> <i class="bi bi-calendar2-week"></i>  To:          <?php echo $reg['dateTo']; ?> </p>
                    <p> <i class="bi bi-clock"></i>           Reg. Hours:  <?php echo $reg['regHours']; ?> </p>
                    <p> <i class="bi bi-clock-history"></i>   OT. Hours:   <?php echo $reg['otHours']; ?> </p>
                    <a onClick="showHours(<?php echo "'".date("M j, Y", strtotime($reg['dateFrom']))." - ".date("M j, Y", strtotime($reg['dateTo'])) ."','".$currentCode."','".$reg['dateFrom']."','".$reg['dateTo']."'"?>)"> Show Hours </a>
                </div>
            <?php $i ++;} ?>    
        </div>
        <div class="hours" id="hours">
            <h1> Hours </h1>
            <p id="hoursDates"></p>
            <div class="hoursTable" id="hoursTable"></div>
        </div>
    </div>
    
<!-- Bootstrap JS Bundle with Popper -->     
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
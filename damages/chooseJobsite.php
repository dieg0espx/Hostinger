<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta http-equiv="refresh" content="5"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="styles_newDamage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>New Truck</title>
</head>
<body>
<script src="newDamage.js"></script>
    <div class="title">
        <button onClick="goToChooseCompany()"> <i class="bi bi-chevron-left"></i>Back </button>
    </div>
    <hr>
        <?php 
            if(isset($_REQUEST['companyFiltered'])){
                include '../connection.php';
                $conexion = mysqli_connect($servername, $username, $password, $dbname) or die("Problemas con la conexión");
                $registros = mysqli_query($conexion, "select * from jobsites order by companyName ASC");      
                while ($reg = mysqli_fetch_array($registros)) { 
                    if($reg['companyName'] ==  $_REQUEST['companyFiltered']) {
                    ?>
                    <div class="cell">  
                        <button class="cellButton" onClick="goToPictureSubmission(<?php echo $reg['id'] ?>)"> 
                            <?php echo $reg['jobsite']?> 
                        </button>
                    </div>
                  <?php  
                    }
                }
            }
        ?> 
    
</body>
</html> 


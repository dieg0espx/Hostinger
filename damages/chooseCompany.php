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
<script>
function toggleAction(action) {
    console.log("Toggle Action" + action);
    const btnShipping = document.getElementById('btnShipping');
    const btnReturn = document.getElementById('btnReturn');
    if(action == 'shipping'){
        btnShipping.style.color = "white";
        btnShipping.style.backgroundColor = "rgb(142, 142, 147)";
        btnReturn.style.color = "rgb(142, 142, 147)";
        btnReturn.style.backgroundColor = "white";
    } 
    if(action == 'return') {
        btnReturn.style.color = "white";
        btnReturn.style.backgroundColor = "rgb(142, 142, 147)";
        btnShipping.style.color = "rgb(142, 142, 147)";
        btnShipping.style.backgroundColor = "white";
    }
}
</script>
<script src="newDamage.js"></script>
    
    <div class="screen1" id="screen1">
        <form>
            <input type="text" id="companyFilter" name="companyFilter" placeholder="Find Company">
            <button type="submit" class="btn-submit-filter"> Find </button>
        </form>
        <hr> 
        <?php 
            include '../connection.php';
            function console_log( $data ){
                echo '<script>';
                echo 'console.log('. json_encode( $data ) .')';
                echo '</script>';
              }
            $prev = '';
            $conexion = mysqli_connect($servername, $username, $password, $dbname) or die("Problemas con la conexión");
            $registros = mysqli_query($conexion, "select * from jobsites order by companyName ASC");      
            while ($reg = mysqli_fetch_array($registros)) { 
                if(isset($_REQUEST['companyFilter'])){
                    if ($reg['companyName'] == strtolower($_REQUEST['companyFilter'])){
                        if($reg['companyName'] == $prev){ continue; }?>
                        <div class="cell">  
                            <button class="cellButton" onClick="companySelected(<?php echo "'".$reg['companyName']."'";?>)"> 
                                <?php echo $reg['companyName']?> 
                            </button>
                        </div>
                            <?php
                            $prev = $reg['companyName']; 
                    }
                } else {
                    if($reg['companyName'] == $prev){ continue; }?>
                        <div class="cell">  
                            <button class="cellButton" onClick="companySelected(<?php echo "'".$reg['companyName']."'";?>)"> 
                                <?php echo $reg['companyName']?> 
                            </button>
                        </div>
                    <?php
                $prev = $reg['companyName']; 
                }
            }      
        ?>
        <br>
    </div>
</body>
</html> 


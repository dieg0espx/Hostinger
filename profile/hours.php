<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <meta http-equiv="refresh" content="5"> -->
  <link rel="stylesheet" href="../styles.css">
</head>
<style>
  body {
    background-color:white !important;
  }
</style>
<body>
  <?php 

    include '../connection.php';
    $code = $_COOKIE['currentCode'];
    
    $conexion = mysqli_connect($servername, $username, $password, $dbname) or die("Problemas con la conexión");
    $registros = mysqli_query($conexion, "select * from hours WHERE code=".$code);

    if(isset($_REQUEST['from']) && isset($_REQUEST['to'])){ 
        while ($reg = mysqli_fetch_array($registros)) { 
            if($reg['date'] >= $_REQUEST['from'] && $reg['date'] <= $_REQUEST['to']){ ?>
                <div class="content">            
                    <div class="row">
                      <div> <p> <?php echo date("M j", strtotime($reg['date'])); ?> </p> </div>
                      <div> <p> <?php echo date("h:i", strtotime($reg['signIn'])); ?> </p> </div>
                      <div> <p> <?php echo date("h:i", strtotime($reg['signOut'])); ?> </p> </div>
                      <div> <p> <?php echo round($reg['regHours'], 2); ?> </p> </div>
                      <div> <p> <?php echo round($reg['otHours'], 2); ?> </p> </div>
                    </div>            
                </div>
            <?php
            }
        }
    }  else {
    while ($reg = mysqli_fetch_array($registros)) { ?>
             <div class="content">            
                <div class="row">
                  <div> <p> <?php echo date("M j", strtotime($reg['date'])); ?> </p> </div>
                  <div> <p> <?php echo date("h:i", strtotime($reg['signIn'])); ?> </p> </div>
                  <div> <p> <?php echo date("h:i", strtotime($reg['signOut'])); ?> </p> </div>
                  <div> <p> <?php echo round($reg['regHours'], 2); ?> </p> </div>
                  <div> <p> <?php echo round($reg['otHours'], 2); ?> </p> </div>
                </div>            
            </div>
    <?php } }?>

    <br><br><br><br><br>
    <br><br><br><br><br>
</body>
</html>
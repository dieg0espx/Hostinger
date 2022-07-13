<?php
    include '../connection.php';

    $alreadyDone = '';
    $conexion = mysqli_connect($servername, $username, $password, $dbname) or die("Problemas con la conexión");
    $registros = mysqli_query($conexion, "select * from customers where id=".$_REQUEST['id']);
    while ($reg = mysqli_fetch_array($registros)) {  
        $alreadyDone = $reg['done'];
    }

    $link = mysqli_connect($servername, $username, $password, $dbname);

    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $newDones = $alreadyDone.','.$_REQUEST['elements'];
    // Attempt update query execution
    $sql = "UPDATE customers SET done='".$newDones."'WHERE id='".$_REQUEST['id']."'";
    if(mysqli_query($link, $sql)){
        // echo "Records were updated successfully.";
    } else {
        // echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    
    // Close connection
    mysqli_close($link);
?>
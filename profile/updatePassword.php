<?php
    $newPassword = $_REQUEST['newPassword'];

include '../connection.php';
$conexion = mysqli_connect($servername, $username, $password, $dbname) or die("Problemas con la conexión");
$registros = mysqli_query($conexion, "select * from employees where code=".$_REQUEST['code']);
while ($reg = mysqli_fetch_array($registros)) {  
        $link = mysqli_connect($servername, $username, $password, $dbname);
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        $sql = "UPDATE employees SET password='".$newPassword."'WHERE code='".$_REQUEST['code']."'";
        if(mysqli_query($link, $sql)){
            echo '<script>alert("Pasword Updated!")</script>';
            setcookie("currentPassword", $newPassword, 2147483647);
        } 
        // Close connection
        mysqli_close($link);
    } 

?>
<!-- BACKEND ==> POST TRUCK DETAIL AND PICTURES INTO THE DATABASE -->
<?php
    if(isset($_POST["submit"])){
        $revisar = getimagesize($_FILES["image1"]["tmp_name"]);
        if($revisar !== false){
            $image = $_FILES['image1']['tmp_name'];
            $imgContenido = addslashes(file_get_contents($image));

            include 'db_damages.php';

            //Crear conexion con la abse de datos
            $db = new mysqli($Host, $Username, $Password, $dbName);

            // Cerciorar la conexion
            if($db->connect_error){
                die("Connection failed: " . $db->connect_error);
            }

    		date_default_timezone_set('America/Los_Angeles');

            //GETTING DATE
            if ($_REQUEST['theDate'] == ""){
                $dt1= date("Y-m-d");
            } else {
                $dt1= $_REQUEST['theDate'];
            }
            //GETTING TIME
            if ($_REQUEST['theTime'] == ""){
                $theTime = date("H:i:s"); 
            } else {
                $theTime = $_REQUEST['theTime'];
            }
            //Insertar imagen en la base de datos
            $insertar = $db->query("INSERT into damages (company, theLocation, theDate, image1) 
                                                VALUES ('$_REQUEST[company]','$_REQUEST[theLocation]','$dt1', '$imgContenido')");
            // COndicional para verificar la subida del fichero
            if($insertar){
                echo '<script type="text/javascript">','alert("Submitted succesfully");','</script>';
            }else{
                echo "Ha fallado la subida, reintente nuevamente.";
            } 
            // Si el usuario no selecciona ninguna imagen
        }else{
            echo"Por favor seleccione imagen a subir";
        }
    }
?>
<!-- FRONTEND ==> FORM TO SUBMIT NEW TRUCK  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta http-equiv="refresh" content="5"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="styles_newDamage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>New Damage</title>
</head>
<body>
<script src="newDamage.js"></script>
    <!-- TOP BAR ==> BUTTON BACK -->
    <div class="title">
        <button onClick="goToChooseJobsite()"> <i class="bi bi-chevron-left"></i>Back </button>
    </div>       
    <form method="post" action="#" enctype="multipart/form-data">
        <!-- COMPANY DETAILS ==> SHOWS THE COMPANY AND JOBSITE ADDRESS -->
        <div class="companyDetails">
            <?php 
                include '../connection.php';
                $conexion = mysqli_connect($servername, $username, $password, $dbname) or die("Problemas con la conexión");
                $registros = mysqli_query($conexion, "select * from jobsites where id=".$_REQUEST['id']);      
                while ($reg = mysqli_fetch_array($registros)) { 
                   echo "<strong>".$reg['companyName']."</strong>";
                   echo "<br>";
                   echo $reg['jobsite']; 
            ?> 
        </div>
        <!-- DATE AND TIME PICKER -->
        <div class="dateAndTime" id="datePicker">
          <input type="date" name="theDate" placeholder="Choose a date">
        </div>
        <!-- PICTURE SUBMISSION ==> AREA TO CHOOSE PICTURES  -->
        <div class="pictureSubmission">
          <div class="imageField">
            <input type="file"  id="image1" name="image1">
          </div>
        </div>
        <!-- HIDDEN VARIABLES ==> ASSIGNING VALUES FROM PHP AND JS -->
        <input type="hidden" name="company" value="<?php echo $reg['companyName']; ?>">    
        <input type="hidden" name="theLocation" value="<?php echo $reg['jobsite']; ?>" >
        <button name="submit" id="btn-submit">Submit</button>
    </form>
    <?php } ?>
   </body>
</html>
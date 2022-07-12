<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <!-- <meta http-equiv="refresh" content="15"> -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Apple Handler Tags -->
    <meta name="application-name" content="Employee" />
    <meta name="apple-mobile-web-app-title" content="Employee" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name = "viewport" content = "initial-scale = 1.0 , user-scalable = no">
    <link rel="apple-touch-icon" href="icon.png" />
    <title>Employees</title>
</head>
<body>
<script src="script.js"></script> 
  <!-- SPLASH SCREEN -->
  <div class="splashScreen" id="splashScreen">
    <img class="fade-in" src="images/logo.png">
  </div>
  <!-- LOGIN SCREEN -->
  <div class="login-screen" id="loginScreen">
    <img class="centered" src="images/logo.png"> 
    <form>
        <input class="credentials centered" name="login-email" type="email" id="login-email" placeholder="Email">
        <input class="credentials centered" name="login-password" type="password" id="login-password" placeholder="Password" > 
        <button class="centered" type="submit" id="buttonLogin"> Login </button>
    </form>
    <?php
        function console_log( $data ){
          echo '<script>';
          echo 'console.log('. json_encode( $data ) .')';
          echo '</script>';
        }
    
        include 'connection.php';
        $currentCode = '0000';
        if($_REQUEST['login-email']){
            console_log("LOGIN BY URL");
            $email = $_REQUEST['login-email'];
            $conexion = mysqli_connect($servername, $username, $password, $dbname) or die("Problemas con la conexión");
            $registros = mysqli_query($conexion, "select * from employees");
            while ($reg = mysqli_fetch_array($registros)) { 
                if($email == $reg['email'] && $_REQUEST['login-password'] == $reg['password']){
                    console_log('found');
                    $currentEmail = $reg['email'];
                    $currentPassword =$reg['password'];
                    $currentCode = $reg['code'];
                    $currentName = $reg['name'];
                    setcookie("currentEmail", $currentEmail, 2147483647);
                    setcookie("currentPassword", $currentPassword, 2147483647);
                    setcookie("currentCode", $currentCode, 2147483647);
                    setcookie("currentName", $currentName, 2147483647);
                    console_log($currentCode);
                    console_log($currentPassword);
                    $foundByURL = true;
                    echo '<script type="text/javascript">',"loginIn();",'</script>';
                    break;
                } 
            }  
        }
    ?>
    <div class="saveCredentials centered">
        <div>
            <p> Remmember me </p>
        </div>
        <div>
            <label class="switch">
                <input id="slider" type="checkbox" onChange="toggleSwitch()">
                <span class="slider round"></span>
            </label>
        </div>
    </div>
  </div>
  <!-- TOP TRANSPARENT BAR => HANDLES IPHONE NOTCH -->
  <div class="titleHandler" id="titleHandler">
      <p id="txtScreenTitle"> Orders </p>
  </div>
  <!-- BOTTOM NAV-BAR -->
  <div id="bottomBar">
    <div class="btn-bar" onClick="bottomBar(1)">
      <i id="iconOrder" class="bi bi-files-alt"></i>
      <p>  Orders </p>
    </div>
    <div class="btn-bar" onClick="bottomBar(2)">
      <i id="iconTruck" class="bi bi-truck"></i>
      <p>  Trucks </p>
    </div>
    <div class="btn-bar" onClick="bottomBar(3)">
    <i id="iconDamages" class="bi bi-bandaid"></i>
      <p>  Damages </p>
    </div>
    <div class="btn-bar" onClick="bottomBar(4)">
      <i id="iconProfile" class="bi bi-person-lines-fill"></i>
      <p>  Profile  </p>
    </div>
  </div>
  <!-- ORDERS SCREEN -->
  <div class="ordersScreen" id="orderScreen" onscroll="scrolled()">
    <div class="title">
      <h1> Orders </h1>
    </div>
    <!-- UPCOMING ORDERS -->
    <div>
      <p id="subheading"> Upcoming Orders </p>
      <?php
        $today = date('Y-m-d');
        $conexion = mysqli_connect($servername, $username, $password, $dbname) or die("Problemas con la conexión");
        $registros = mysqli_query($conexion, "select * from customers order by date DESC");                                  
        while ($reg = mysqli_fetch_array($registros)) {
          if($reg['date'] > $today){
            $data = "'".$reg['id']."|".$reg['company']."'";
      ?>
            <div class="row-order" onClick="showOrder(<?php echo $data; ?>)">
              <p id="order-company"> <?php echo $reg['company']; ?> </p>
              <p id="order-jobsite"> <?php echo $reg['jobsite']; ?> </p>
              <p id="order-date"> <?php echo "Due Date: ".$reg['date']; ?> </p>
            </div>
      <?php  
          }
        }
      ?>
    </div>
    <!-- TODAY'S ORDERS -->
    <div>
      <p id="subheading"> Today's Orders </p>
      <?php
        $today = date('Y-m-d');
        $conexion = mysqli_connect($servername, $username, $password, $dbname) or die("Problemas con la conexión");
        $registros = mysqli_query($conexion, "select * from customers order by date DESC");                                  
        while ($reg = mysqli_fetch_array($registros)) {
          if($reg['date'] == $today){
            $data = "'".$reg['id']."|".$reg['company']."'";
      ?>
            <div class="row-order" onClick="showOrder(<?php echo $data; ?>)">
              <p id="order-company"> <?php echo $reg['company']; ?> </p>
              <p id="order-jobsite"> <?php echo $reg['jobsite']; ?> </p>
              <p id="order-date"> <?php echo "Due Date: ".$reg['date']; ?> </p>
            </div>
      <?php  
          }
        }
      ?>
    </div>
    <!-- PAST ORDERS -->
    <div>
      <p id="subheading"> Past's Orders </p>
      <?php
        $registros = mysqli_query($conexion, "select * from customers order by date DESC");                                    
        while ($reg = mysqli_fetch_array($registros)) {
          for ($x = 1; $x <= 30; $x++) {
            $date = date('Y-m-d',strtotime("-".$x." days"));
            if ($reg['date'] == $date) {
              $data = "'".$reg['id']."|".$reg['company']."'";
      ?>
            <div class="row-order" onClick="showOrder(<?php  echo $data; ?>)">
              <p id="order-company"> <?php echo $reg['company']; ?> </p>
              <p id="order-jobsite"> <?php echo $reg['jobsite']; ?> </p>
              <p id="order-date"> <?php echo "Due Date: ".$reg['date']; ?> </p>
            </div>
      <?php  
            }
          }
        }
      ?>
    </div>
    <!-- OVERLAY => SHOWS UP WHEN ORDER IS SELECTED -->
    <div class="box2" id="overlay2" ></div>
    <!-- POP-UP =>  SLIDES UP WHEN ORDER IS SELECTED -->
    <div class="order-elements" id="orderElements">
      <!-- iFrame in inserted here -->
      <div class="elementsTable" id="elementsTable"></div>
    </div>
  </div>
  <!-- TRUCKS SCREEN -->
  <div class="truckScreen" id="truckScreen" onscroll="scrolled()">
    <!-- TRUCKS TITLE BAR -->
    <div class="title">
      <h1> Trucks </h1>
      <button class="plusBtn" onClick="addNewTruck()"> <i class="bi bi-plus-lg"></i> </button>
    </div>
   
    <!-- LIST OF SUBMITTED TRUCKS -->
    <div class="truckList">
        <?php
          for ($i = 0; $i < 35; $i++){
              $previousDays = date('Y/m/d',strtotime("-".$i." days"));
              $db_host2 = "localhost";
              $db_user2 = "u969084943_trucks2";
              $db_pass2 = "Construction2020";
              $db_database2 = "u969084943_trucks2";
              $con2 = mysqli_connect($db_host2, $db_user2, $db_pass2, $db_database2);
              $query = "SELECT id, company, theLocation, theStatus, theDate, theTime FROM trucks WHERE theDate='$previousDays' order by theDate DESC";
              $res = mysqli_query($con2, $query);
              while ($row = mysqli_fetch_assoc($res)){?>
                  <div class="cell-truckList" onClick="showPictures(<?php echo $row['id']; ?>)"> 
                      <div class="<?php if($row['theStatus'] == 'shipping'){ echo 'st-shipping';} else { echo 'st-return';}?>"></div>
                      <div>
                        <p id="truck-company"> <?php echo strtoupper($row['company'])?> </p>
                        <p id="truck-jobsite"> <?php echo $row['theLocation']; ?> </p>
                      </div>
                      <div>
                          <p id="truck-dateTime"> <?php echo date("D M j", strtotime($row['theDate'])); ?> </p>
                          <p id="truck-dateTime"> <?php echo date("h:i a", strtotime($row['theTime'])); ?> </p>
                      </div>
                  </div>
                <?php
              } 
            } 
        ?>
    </div> 
    <div class="truckImages-popup" id="truckImages-popup">
      <iframe id="trucksImagesIframe"></iframe>
    </div>
     <!-- OVERLAY => SHOWS UP WHEN ORDER IS SELECTED -->
     <div class="box3" id="overlay3" ></div>
     <!-- POP-UP =>  SLIDES UP WHEN + IS CLICKED -->
    <div class="newTruck-popup" id="newTruckPopUp">
      <iframe id="trucksIframe" src="trucks/chooseCompany.php"></iframe>
    </div>
  </div>
  <!-- DAMAGE SCREEN -->
  <div class="damagesScreen" id="damagesScreen" onScroll="scrolled()">
    <!-- DAMAGES TITLE BAR -->
    <div class="title">
      <h1> Damages </h1>
      <button class="plusBtn" onClick="addNewDamage()"> <i class="bi bi-plus-lg"></i> </button>
    </div>    
    <!-- LIST OF SUBMITTED DAMAGES -->
    <div class="damagesList">
        <?php
            $registros = mysqli_query($conexion, "select id, company, theLocation, theDate from damages order by theDate DESC"); 
            while ($reg = mysqli_fetch_array($registros)) {?>
                <div class="cell-damagesList" onClick="showDamagePictures(<?php echo $reg['id']; ?>)"> 
                    <div>
                        <p id="damage-company"><?php echo strtoupper($reg['company']); ?> </p>
                        <p id="damage-jobsite"><?php echo $reg['theLocation']; ?> </p>
                    </div>
                    <p id="damage-dateTime"><?php echo date("D, M j", strtotime($reg['theDate'])); ?> </p>
                </div>
        <?php }?>        
    </div>
    <!-- OVERLAY => SHOWS UP WHEN ORDER IS SELECTED -->
    <div class="box4" id="overlay4" ></div>
    <!-- POP-UP => SLIDES UP WHEN A CELL IS CLICKED -->
    <div class="damageImages-popup" id="damageImages-popup">
      <iframe id="damageImagesIframe"></iframe>
    </div>
     <!-- POP-UP =>  SLIDES UP WHEN + IS CLICKED -->
     <div class="newDamage-popup" id="newDamagePopUp">
      <iframe id="damageIframe" src="damages/chooseCompany.php"></iframe>
    </div>
  </div>
  <!-- PROFILE SCREEN -->
  <div class="payrollScreen" id="profileScreen" onscroll="scrolled()">   
    <!-- PROFILE - MAIN SCREEN -->
    <div class="profile-main" id="profileMain">
        <div class="title">
            <h1> Profile </h1>
            <i id="profileIcon" class="bi bi-person-circle"></i>
        </div>
        <div class="profile-section">
        <div class="element-details">
            <p class="detail-desc"> Name </p>
            <p class="detail-info"> <?php echo $_COOKIE['currentName']; ?> </p>
        </div> 
        <div class="element-details">
            <p class="detail-desc"> Email </p>
            <p class="detail-info"> <?php echo $_COOKIE['currentEmail']; ?> </p>
        </div> 
        <div class="element-details">
            <p class="detail-desc"> Password </p>
            <p class="detail-info"> <button onClick="changePassword()"> <i class="bi bi-chevron-right"></i> </button> </p>
        </div> 
        <div id="last" class="element-details">
            <p class="detail-desc"> Code </p>
            <p class="detail-info"> <?php echo $_COOKIE['currentCode']; ?> </p>
        </div>
        </div>

        <div class="profile-section">
            <div class="element-details">
                <div class="detail-desc">
                    <p> Worked Hours </p>
                </div>
                <div class="detail-info">
                    <i class="bi bi-chevron-right" onClick="showWorkedHours()"></i>
                </div>
            </div>
            <div id="last" class="element-details">
                <div class="detail-desc">
                    <p> Payrolls </p>
                </div>
                <div class="detail-info">
                    <i class="bi bi-chevron-right" onClick="showPayrolls()"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- PASSWORD-SCREEN -->
    <div class="passwordScreen" id="passwordScreen">
        <div class="topButtons">
            <button id="btnBack" class="top-buttons" onClick="hidePassword()"> <i class="bi bi-chevron-left"></i>Profile </button>
            <p> Password </p>
        </div>
        <div class="form">
            <div class="row-form">
                <p> Current Password </p>
                <div class="pw-check">
                    <input type="password" id="currentPassword" placeholder="Current Pasword" onChange="checkCurrentPassword()">
                    <i id="check-current" class="check bi bi-check-lg"></i>
                </div>
            </div>
            <div class="row-form">
                <p> New Password </p>
                <div class="pw-check">
                    <input type="password" id="newPassword" placeholder="New Password" onChange="checkBothPassword()">
                    <i id="check-new" class="check bi bi-check-lg"></i>
                </div>
            </div>
            <div class="row-form" id="last">
                <p> Confirm Password </p>
                <div class="pw-check">
                    <input type="password"  id="newPasswordConfirmation" placeholder="Confirm Password" onChange="checkBothPassword()">
                    <i id="check-confirm" class="check bi bi-check-lg"></i>
                </div>
            </div>
        </div>
        <button onClick="updatePassword()" class="btn-UpdatePassword" id="btn-password"> Update Password </button>
        <iframe id="iframePassword" src="profile/updatePassword.php"></iframe>
    </div>
    <!-- WORKED HOURS -->
    <div class="workedHours" id="workedHours">
        <div class="filter">
            <div class="topButtons">
                <button id="btnBack" class="top-buttons" onClick="hideWorkedHours()"> <i class="bi bi-chevron-left"></i>Profile </button>
                <p> Worked Hours </p>
                <button id="btnReload" class="top-buttons" onClick="reloadIframe()"> <i class="bi bi-arrow-clockwise"></i> </button>
            </div>
    
            <div class="filter-workedHours">
                <div class="filterField">
                    <input type="date" id="startDate" placeholder="Start Date">
                </div>
                <div class="filterField">
                    <input type="date" id="endDate" placeholder="End Date">
                </div>
                <button onClick="showFilteredHours()"> Find </button>
            </div>
        </div>
        <div class="filteredHoursTable">
            <iframe id="filteredHours" src="profile/hours.php"></iframe>
        </div>

    </div>
    <!-- PAYROLLS -->
    <div class="payrolls" id="payrolls">
        <div class="topButtons">
            <button id="btnBack" class="top-buttons" onClick="hidePayrolls()"> <i class="bi bi-chevron-left"></i>Profile </button>
            <p> Payrolls </p>
        </div>
    
        <?php
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
            <div class="profile-section">
                <?php
                    $i = 0;
                    while ($reg = mysqli_fetch_array($registros)) { ?>
                    <div id="row-payrolls" class="element-details" id="<?php echo "preElement".$i; ?>" onClick="showHours(<?php echo "'".date("M j, Y", strtotime($reg['dateFrom']))." - ".date("M j, Y", strtotime($reg['dateTo'])) ."','".$currentCode."','".$reg['dateFrom']."','".$reg['dateTo']."','".$reg['regHours']."','".$reg['otHours']."'"?>)">
                        <p> <?php echo date("M j, Y", strtotime($reg['dateFrom']))." - ".date("M j, Y", strtotime($reg['dateTo'])); ?> </p>
                    </div>
                <?php $i ++; } ?>    
            </div>
            <div class="hours" id="hours">
            <h1> Hours </h1>
            <p id="hoursDates"></p>
            <p id="totHours"></p>
            <div class="hoursTable" id="hoursTable"></div>
            </div>
        </div>
    </div>   
  </div>

<!-- script for titleHandler -->
<script src="titleHandler.js"></script>
<!-- script for login screen    -->
<script src="loginScript.js"></script>
<!-- script for Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



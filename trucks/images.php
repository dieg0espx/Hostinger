<!DOCTYPE html>
<html lang="en">
    <head>
    <title>TTF SCAFFOLDING</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv="refresh" content="5"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" src="styles_newTruck.php"> -->
	</head>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-appearance: none;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            text-decoration:none;
        }
        .slides {
            margin-top:10px;
            display:grid;
            grid-auto-flow:column;
            gap:1rem;
            overflow-y:auto;
            overscroll-behavior-x:contain;
            scroll-snap-type: x mandatory;
            scrollbar-width:none;
        }
        .slides > .wrapper {
            scroll-snap-align: start;
        }
        .slides img {
            border-radius:10px;
            width: 100vw;
            object-fit:contain;
        }
        .slides::-webkit-scrollbar {
            display:none;
        }
        #company {
            color: gray;
            font-size: 23px;
            font-weight: bold;
        }
        #jobsite {
            color: gray;
            font-size: 18px;
            font-weight: bold;
        }
        #status {
            color: gray;
            font-size: 15px;
            font-weight: 400;
            margin-top: 5px;
        }
        #dateTime {
            color: gray;
            font-size: 15px;
            font-weight: 400;
            margin-top: 5px;
        }
        .btn-download {
            position:fixed;
            top:20px;
            right: 30px;
            font-size:30px;
            color:rgb(0, 122, 255);
        }
    </style>
  <body> 
	<?php 
		include "db_trucks.php";
   		$con = mysqli_connect($Host, $Username, $Password, $dbName);
		$query = "SELECT * FROM trucks WHERE id='$_REQUEST[id]'";
		$res = mysqli_query($con, $query);
   		while ($row = mysqli_fetch_assoc($res)) {?>

        <div class="details">
            <p id="company"> <?php echo strtoupper($row['company']); ?> </p>
            <p id="jobsite">  <?php echo $row['theLocation']; ?> </p>
            <p id="dateTime"> <?php echo date("D, M j", strtotime($row['theDate']))." | ".date("h:i a", strtotime($row['theTime'])); ?> </p>
        </div>

        <div class="slides">
            <div class="wrapper">
                <a class="btn-download" download="image.jpeg" href="data:image/png;base64,<?php echo base64_encode($row['image1']);?>"> <i class="bi bi-cloud-download"></i></a>
                <img src="data:<?php echo $row['jpg']; ?>;base64,<?php echo base64_encode($row['image1']);?>">
            </div>
            <div class="wrapper">
                <a class="btn-download" download="image.jpeg" href="data:image/png;base64,<?php echo base64_encode($row['image2']);?>"> <i class="bi bi-cloud-download"></i></a>
                <img src="data:<?php echo $row['jpg']; ?>;base64,<?php echo base64_encode($row['image2']);?>">
            </div>
            <div class="wrapper">
                <a class="btn-download" download="image.jpeg" href="data:image/png;base64,<?php echo base64_encode($row['image3']);?>"> <i class="bi bi-cloud-download"></i></a>
                <img src="data:<?php echo $row['jpg']; ?>;base64,<?php echo base64_encode($row['image3']);?>">
            </div>
        </div>
	<?php } ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>TTF SCAFFOLDING | FORKLIFT CHECKUP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles_order.css">
    <!-- <meta http-equiv="refresh" content="5"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  </head>
  <body> 
    <script src="order.js"></script>
  <?php
  function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}

    include '../connection.php';
    $conexion = mysqli_connect($servername, $username, $password, $dbname) or die("Problemas con la conexión");
    $registros = mysqli_query($conexion, "select * from customers where id=".$_REQUEST['id']);
    echo '<script type="text/javascript">','passingID('.$_REQUEST['id'].');','</script>';
    
    while ($reg = mysqli_fetch_array($registros)) {   
        

      $done = explode(",", $reg['done']);

      if($reg['af6x4']){ $af6x4 = $reg['af6x4'];}
      if($reg['af5x4']){ $af5x4 = $reg['af5x4'];}
      if($reg['af4x4']){ $af4x4 = $reg['af4x4'];}
      if($reg['sf6x4']){ $sf6x4 = $reg['sf6x4'];}
      if($reg['sf5x4']){ $sf5x4 = $reg['sf5x4'];}
      if($reg['sf4x4']){ $sf4x4 = $reg['sf4x4'];}
      if($reg['sf3x4']){ $sf3x4 = $reg['sf3x4'];}
      if($reg['cb10x4']){ $cb10x4 = $reg['cb10x4'];}
      if($reg['cb10x2']){ $cb10x2 = $reg['cb10x2'];}
      if($reg['cb7x4']){ $cb7x4 = $reg['cb7x4'];}
      if($reg['cb7x2']){ $cb7x2 = $reg['cb7x2'];}
      if($reg['cb5x4']){ $cb5x4 = $reg['cb5x4'];}
      if($reg['cb5x2']){ $cb5x2 = $reg['cb5x2'];}
      if($reg['cb4x4']){ $cb4x4 = $reg['cb4x4'];}
      if($reg['cb4x2']){ $cb4x2 = $reg['cb4x2'];}
      if($reg['auh']){ $auh = $reg['auh'];}
      if($reg['abp']){ $abp = $reg['abp'];}
      if($reg['suh']){ $suh = $reg['suh'];}
      if($reg['sbp']){ $sbp = $reg['sbp'];}
      if($reg['afc']){ $afc = $reg['afc'];}
      if($reg['sfc']){ $sfc = $reg['sfc'];}
      if($reg['bc']){ $bc  = $reg['bc'];}
      if($reg['ab20']){ $ab20 = $reg['ab20'];}
      if($reg['ab18']){ $ab18 = $reg['ab18'];}
      if($reg['ab16']){ $ab16 = $reg['ab16'];}
      if($reg['ab14']){ $ab14 = $reg['ab14'];}
      if($reg['ab13']){ $ab13 = $reg['ab13'];}
      if($reg['ab12']){ $ab12 = $reg['ab12'];}
      if($reg['ab106']){ $ab106 = $reg['ab106'];}
      if($reg['ab10']){ $ab10 = $reg['ab10'];}
      if($reg['ab9']){ $ab9 = $reg['ab9'];}
      if($reg['ab8']){ $ab8 = $reg['ab8'];}
      if($reg['ab7']){ $ab7 = $reg['ab7'];}
      if($reg['ab6']){ $ab6 = $reg['ab6'];}
      if($reg['ab5']){ $ab5 = $reg['ab5'];}
      if($reg['ab4']){ $ab4 = $reg['ab4'];}
      if($reg['sh1']){ $sh1 = $reg['sh1'];}
      if($reg['sh2']){ $sh2 = $reg['sh2'];}
      if($reg['sh3']){ $sh3 = $reg['sh3'];}
      if($reg['sh4']){ $sh4 = $reg['sh4'];}
      if($reg['wb12']){ $wb12 = $reg['wb12'];}
      if($reg['wb11']){ $wb11 = $reg['wb11'];}
      if($reg['wb10']){ $wb10 = $reg['wb10'];}
      if($reg['wb9']){ $wb9 = $reg['wb9'];}
      if($reg['wb8']){ $wb8 = $reg['wb8'];}
      if($reg['wb7']){ $wb7 = $reg['wb7'];}
      if($reg['wb6']){ $wb6 = $reg['wb6'];}
      if($reg['wb5']){ $wb5 = $reg['wb5'];}
      if($reg['wb4']){ $wb4 = $reg['wb4'];}
    ?>

      <div class="companyDetails">
        <div>
            <h1> <?php echo $reg['company']; ?> </h1>
            <h2> <?php echo $reg['jobsite']; ?> </h2>
            <p> <?php echo "Due date: ". $reg['date']; ?> </p>
        </div>
        <div>
            <button onClick="window.location.reload()"> <i class="bi bi-arrow-clockwise"></i> </button>
        </div>
      </div>
      <!-- <h1> Frames </h1>  -->
      <div class="elements">
      <?php if($af6x4 > 0) { ?>
        <div class="element">

        <?php if (in_array("af6x4", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="af6x4" onClick="markDone('af6x4')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

         <img src='../images/alumFrame.jpg'>
          <p> Alum. Frame 6'w X 4'h </p>
          <h1><?php echo $af6x4; ?> </h1>
        </div>
      <?php } ?>

      <?php if($af5x4 > 0) { ?>
        <div class="element">
        
        <?php if (in_array("af5x4", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="af5x4" onClick="markDone('af5x4')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/alumFrame.jpg'>
          <p> Alum. Frame 5'w X 4'h </p>
          <h1><?php echo $af5x4; ?> </h1>
        </div>
      <?php } ?>

      <?php if($af4x4 > 0) { ?>
        <div class="element">
       
        <?php if (in_array("af4x4", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="af4x4" onClick="markDone('af4x4')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/alumFrame.jpg'>
          <p> Alum. Frame 4'w X 4'h </p>
          <h1><?php echo $af4x4; ?> </h1>
        </div>
      <?php } ?>


      <?php if($sf6x4 > 0) { ?>
        <div class="element">
        
        <?php if (in_array("sf6x4", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="sf6x4" onClick="markDone('sf6x4')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/frame.jpg'>
          <p> Steel Frame 6'w X 4'h </p>
          <h1><?php echo $sf6x4; ?> </h1>
        </div>
      <?php } ?>

      <?php if($sf5x4 > 0) { ?>
        <div class="element">
        
        <?php if (in_array("sf5x4", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="sf5x4" onClick="markDone('sf5x4')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/frame.jpg'>
          <p> Steel Frame 5'w X 4'h </p>
          <h1><?php echo $sf5x4; ?> </h1>
        </div>
      <?php } ?>

      <?php if($sf4x4 > 0) { ?>
        <div class="element">
       
        <?php if (in_array("sf4x4", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="sf4x4" onClick="markDone('sf4x4')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/frame.jpg'>
          <p> Steel Frame 4'w X 4'h </p>
          <h1><?php echo $sf4x4; ?> </h1>
        </div>
      <?php } ?>

      <?php if($sf3x4 > 0) { ?>
        <div class="element">
        
        <?php if (in_array("sf3x4", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="sf3x4" onClick="markDone('sf3x4')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/frame.jpg'>
          <p> Steel Frame 3'w X 4'h </p>
          <h1><?php echo $sf3x4; ?> </h1>
        </div>
      <?php } ?>
    </div>

    <!-- <h1> Cross Bars </h1> -->
      <div class="elements">
        <?php if($cb10x4 > 0) { ?>
        <div class="element">
         
        <?php if (in_array("cb10x4", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="cb10x4" onClick="markDone('cb10x4')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/cb10x4.jpg'>
          <p> 10 x 4 Cross Bars</p>
          <h1><?php echo $cb10x4; ?> </h1>
        </div>
        <?php } ?>

        <?php if($cb10x2 > 0) { ?>
        <div class="element">
         
        <?php if (in_array("cb10x2", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="cb10x2" onClick="markDone('cb10x2')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/cb10x2.jpg'>
          <p> 10 x 2 Cross Bars</p>
          <h1><?php echo $cb10x2; ?> </h1>
        </div>
        <?php } ?>

        <?php if($cb7x4 > 0) { ?>
        <div class="element">
         
        <?php if (in_array("cb7x4", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="cb7x4" onClick="markDone('cb7x4')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/cb7x4.jpg'>
          <p> 7 x 4 Cross Bars</p>
          <h1><?php echo $cb7x4; ?> </h1>
        </div>
        <?php } ?>

        <?php if($cb7x2 > 0) { ?>
        <div class="element">
         
        <?php if (in_array("cb7x2", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="cb7x2" onClick="markDone('cb7x2')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/cb7x2.jpg'>
          <p> 7 x 2 Cross Bars</p>
          <h1><?php echo $cb7x2; ?> </h1>
        </div>
        <?php } ?>

        <?php if($cb5x4 > 0) { ?>
        <div class="element">
         
        <?php if (in_array("cb5x4", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="cb5x4" onClick="markDone('cb5x4')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/cb5x4.jpg'>
          <p> 5 x 4 Cross Bars</p>
          <h1><?php echo $cb5x4; ?> </h1>
        </div>
        <?php } ?>
        <?php if($cb5x2 > 0) { ?>

        <div class="element">
         
        <?php if (in_array("cb5x2", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="cb5x2" onClick="markDone('cb5x2')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/cb5x2.jpg'>
          <p> 5 x 2 Cross Bars</p>
          <h1><?php echo $cb5x2; ?> </h1>
        </div>
        <?php } ?>

        <?php if($cb4x4 > 0) { ?>
        <div class="element">

        <?php if (in_array("cb4x4", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="cb4x4" onClick="markDone('cb4x4')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/cb4x4.jpg'>
          <p> 4 x 4 Cross Bars</p>
          <h1><?php echo $cb4x4; ?> </h1>
        </div>
        <?php } ?>

        <?php if($cb4x2 > 0) { ?>
        <div class="element">
        
        <?php if (in_array("cb4x2", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="cb4x2" onClick="markDone('cb4x2')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/cb4x2.jpg'>
          <p> 4 x 2 Cross Bars</p>
          <h1><?php echo $cb4x2; ?> </h1>
        </div>
        <?php } ?>
      </div>

    <!-- <h1> Screew Jacks </h1> -->
      <div class="elements">
        <?php if($auh > 0) { ?>
        <div class="element">
                
        <?php if (in_array("auh", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="auh" onClick="markDone('auh')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/alumUhead.jpg'>
        <p> S.J Alum. U/Heads</p>
        <h1><?php echo $auh; ?> </h1>
        </div>
        <?php } ?>

        <?php if($abp > 0) { ?>
        <div class="element">
                
        <?php if (in_array("abp", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="abp" onClick="markDone('abp')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/alumUhead.jpg'>
        <p> S.J Alum. B/Plate</p>
        <h1><?php echo $abp; ?> </h1>
        </div>
        <?php } ?>

        <?php if($suh > 0) { ?>
        <div class="element">
        
        <?php if (in_array("suh", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="suh" onClick="markDone('suh')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/steelUhead.jpg'>
        <p> S.J Steel U/Head</p>
        <h1><?php echo $suh; ?> </h1>
        </div>
        <?php } ?>

        <?php if($sbp > 0) { ?>
        <div class="element">
                
        <?php if (in_array("sbp", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="sbp" onClick="markDone('sbp')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/steelUhead.jpg'>
        <p> S.J Steel B/Plate</p>
        <h1><?php echo $sbp; ?> </h1>
        </div>
        <?php } ?>
      </div>

    <!-- <h1> Pins & Clips </h1> -->
      <div class="elements">
        <?php if($afc > 0) { ?>
        <div class="element">
                
        <?php if (in_array("afc", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="afc" onClick="markDone('afc')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/alumCoupPin.jpg'>
          <p> Alum.Frame Coup Pins</p>
          <h1><?php echo $afc; ?> </h1>
        </div>
        <?php } ?>

        <?php if($sfc > 0) { ?>
        <div class="element">
                 
        <?php if (in_array("sfc", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="sfc" onClick="markDone('sfc')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/steelCoupPin.jpg'>
          <p> Steel Frame Coup Pins</p>
          <h1><?php echo $sfc; ?> </h1>
        </div>
        <?php } ?>

        <?php if($bc > 0) { ?>
        <div class="element">
                 
        <?php if (in_array("bc", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="bc" onClick="markDone('bc')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/beamClip.jpg'>
          <p> Beam Clips</p>
          <h1><?php echo $bc; ?> </h1>
        </div>
        <?php } ?>
        </div>

    <!-- <h1> Alum. Beams </h1> -->
      <div class="elements">
        <?php if($ab20 > 0) { ?>
        <div class="element">

        <?php if (in_array("ab20", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="ab20" onClick="markDone('ab20')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/beamPurple.jpg'>
          <p> 20' Alum.Beams </p>
          <h1><?php echo $ab20; ?> </h1>
        </div>
        <?php } ?>
        <?php if($ab18 > 0) { ?>
        <div class="element">
         
        <?php if (in_array("ab18", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="ab18" onClick="markDone('ab18')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/beamRed.jpg'>
          <p> 18' Alum.Beams </p>
          <h1><?php echo $ab18; ?> </h1>
        </div>
        <?php } ?>

        <?php if($ab16 > 0) { ?>
        <div class="element">
         
        <?php if (in_array("ab16", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="ab16" onClick="markDone('ab16')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/beamYellow.jpg'>
          <p> 16' Alum.Beams </p>
          <h1><?php echo $ab16; ?> </h1>
        </div>
        <?php } ?>

        <?php if($ab14 > 0) { ?>
        <div class="element">
                  
        <?php if (in_array("ab14", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="ab14" onClick="markDone('ab14')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/beamSilver.jpg'>
          <p> 14' Alum.Beams </p>
          <h1><?php echo $ab14; ?> </h1>
        </div>
        <?php } ?>

        <?php if($ab13 > 0) { ?>
        <div class="element">
                  
        <?php if (in_array("ab13", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="ab13" onClick="markDone('ab13')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/beamPink.jpg'>
          <p> 13' Alum.Beams </p>
          <h1><?php echo $ab13; ?> </h1>
        </div>
        <?php } ?>

        <?php if($ab12 > 0) { ?>
        <div class="element">
                  
        <?php if (in_array("ab12", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="ab12" onClick="markDone('ab12')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/beamBrown.jpg'>
          <p> 12' Alum.Beams </p>
          <h1><?php echo $ab12; ?> </h1>
        </div>
        <?php } ?>

        <?php if($ab106 > 0) { ?>
        <div class="element">
                  
        <?php if (in_array("ab106", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="ab106" onClick="markDone('ab106')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/beamBlue.jpg'>
          <p> 10.6' Alum.Beams </p>
          <h1><?php echo $ab106; ?> </h1>
        </div>
        <?php } ?>

        <?php if($ab10 > 0) { ?>
        <div class="element">
                  
        <?php if (in_array("ab10", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="ab10" onClick="markDone('ab10')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/beamBlack.jpg'>
          <p> 10' Alum.Beams </p>
          <h1><?php echo $ab10; ?> </h1>
        </div>
        <?php } ?>

        <?php if($ab9 > 0) { ?>
        <div class="element">
                  
        <?php if (in_array("ab9", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="ab9" onClick="markDone('ab9')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/beamOrange.jpg'>
          <p> 9' Alum.Beams </p>
          <h1><?php echo $ab9; ?> </h1>
        </div>
        <?php } ?>

        <?php if($ab8 > 0) { ?>
        <div class="element">
                           
        <?php if (in_array("ab8", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="ab8" onClick="markDone('ab8')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/beamRed.jpg'>
          <p> 8' Alum.Beams </p>
          <h1><?php echo $ab8; ?> </h1>
        </div>
        <?php } ?>

        <?php if($ab7 > 0) { ?>
        <div class="element">
                           
        <?php if (in_array("ab7", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="ab7" onClick="markDone('ab7')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/beamYellow.jpg'>
          <p> 7' Alum.Beams </p>
          <h1><?php echo $ab7; ?> </h1>
        </div>
        <?php } ?>

        <?php if($ab6 > 0) { ?>
        <div class="element">
                           
        <?php if (in_array("ab6", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="ab6" onClick="markDone('ab6')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/beamGreen.jpg'>
          <p> 6' Alum.Beams </p>
          <h1><?php echo $ab6; ?> </h1>
        </div>
        <?php } ?>

        <?php if($ab5 > 0) { ?>
        <div class="element">
                           
        <?php if (in_array("ab5", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="ab5" onClick="markDone('ab5')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/beamWhite.jpg'>
          <p> 5' Alum.Beams </p>
          <h1><?php echo $ab5; ?> </h1>
        </div>
        <?php } ?>

        <?php if($ab4 > 0) { ?>
        <div class="element">
                           
        <?php if (in_array("ab4", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="ab4" onClick="markDone('ab4')"><i class="bi bi-check-all"></i></button>
        <?php } ?>

        <img src='../images/beamLime.jpg'>
          <p> 4' Alum.Beams </p>
          <h1><?php echo $ab4; ?> </h1>
        </div>
        <?php } ?>
      </div>

    <!-- <h1> Post Shores </h1> -->
      <div class="elements">
        <?php if($sh1 > 0) { ?>
        <div class="element">

        <?php if (in_array("sh1", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="sh1" onClick="markDone('sh1')"><i class="bi bi-check-all"></i></button>
        <?php } ?>
        
        <img src='../images/postShore.jpg'>
          <p> Post Shore No.1 </p>
          <h1><?php echo $sh1; ?> </h1>
        </div>
        <?php } ?>
        <?php if($sh2 > 0) { ?>
        <div class="element">
         
        <?php if (in_array("sh2", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="sh2" onClick="markDone('sh2')"><i class="bi bi-check-all"></i></button>
        <?php } ?>
        
        <img src='../images/postShore.jpg'>
          <p> Post Shore No.2 </p>
          <h1><?php echo $sh2; ?> </h1>
        </div>
        <?php } ?>

        <?php if($sh3 > 0) { ?>
        <div class="element">
         
        <?php if (in_array("sh3", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="sh3" onClick="markDone('sh3')"><i class="bi bi-check-all"></i></button>
        <?php } ?>
        
        <img src='../images/postShore.jpg'>
          <p> Post Shore No.3 </p>
          <h1><?php echo $sh3; ?> </h1>
        </div>
        <?php } ?>

        <?php if($sh4 > 0) { ?>
        <div class="element">
         
        <?php if (in_array("sh4", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="sh4" onClick="markDone('sh4')"><i class="bi bi-check-all"></i></button>
        <?php } ?>
        
        <img src='../images/postShore.jpg'>
          <p> Post Shore No.4 </p>
          <h1><?php echo $sh4; ?> </h1>
        </div>
        <?php } ?>
      </div>

    <!-- <h1> Wood Beams </h1> -->
      <div class="elements">
        <?php if($wb12 > 0) { ?>
        <div class="element">
         
        <?php if (in_array("wb12", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="wb12" onClick="markDone('wb12')"><i class="bi bi-check-all"></i></button>
        <?php } ?>
        
        <img src='../images/woodBeam.jpg'>
          <p> Wood Beams 12' </p>
          <h1><?php echo $wb12; ?> </h1>
        </div>
        <?php } ?>

        <?php if($wb11 > 0) { ?>
        <div class="element">
                  
        <?php if (in_array("wb11", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="wb11" onClick="markDone('wb11')"><i class="bi bi-check-all"></i></button>
        <?php } ?>
        
        <img src='../images/woodBeam.jpg'>
          <p> Wood Beams 11' </p>
          <h1><?php echo $wb11; ?> </h1>
        </div>
        <?php } ?>
        <?php if($wb10 > 0) { ?>
        <div class="element">
                  
        <?php if (in_array("wb10", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="wb10" onClick="markDone('wb10')"><i class="bi bi-check-all"></i></button>
        <?php } ?>
        
        <img src='../images/woodBeam.jpg'>
          <p> Wood Beams 10' </p>
          <h1><?php echo $wb10; ?> </h1>
        </div>
        <?php } ?>
        <?php if($wb9 > 0) { ?>
        <div class="element">
                  
        <?php if (in_array("wb9", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="wb9" onClick="markDone('wb9')"><i class="bi bi-check-all"></i></button>
        <?php } ?>
        
        <img src='../images/woodBeam.jpg'>
          <p> Wood Beams 9 </p>
          <h1><?php echo $wb9; ?> </h1>
        </div>
        <?php } ?>
        <?php if($wb8 > 0) { ?>
        <div class="element">
                  
        <?php if (in_array("wb8", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="wb8" onClick="markDone('wb8')"><i class="bi bi-check-all"></i></button>
        <?php } ?>
        
        <img src='../images/woodBeam.jpg'>
          <p> Wood Beams 8' </p>
          <h1><?php echo $wb8; ?> </h1>
        </div>
        <?php } ?>
        <?php if($wb7 > 0) { ?>
        <div class="element">
                  
        <?php if (in_array("wb7", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="wb7" onClick="markDone('wb7')"><i class="bi bi-check-all"></i></button>
        <?php } ?>
        
        <img src='../images/woodBeam.jpg'>
          <p> Wood Beams 7' </p>
          <h1><?php echo $wb7; ?> </h1>
        </div>
        <?php } ?>
        <?php if($wb6 > 0) { ?>
        <div class="element">
                  
        <?php if (in_array("wb6", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="wb6" onClick="markDone('wb6')"><i class="bi bi-check-all"></i></button>
        <?php } ?>
        
        <img src='../images/woodBeam.jpg'>
          <p> Wood Beams 6' </p>
          <h1><?php echo $wb6; ?> </h1>
        </div>
        <?php } ?>
        <?php if($wb5 > 0) { ?>
        <div class="element">
                  
        <?php if (in_array("wb5", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="wb5" onClick="markDone('wb5')"><i class="bi bi-check-all"></i></button>
        <?php } ?>
        
        <img src='../images/woodBeam.jpg'>
          <p> Wood Beams 5' </p>
          <h1><?php echo $wb5; ?> </h1>
        </div>
        <?php } ?>
        <?php if($wb4 > 0) { ?>
        <div class="element">
                  
        <?php if (in_array("wb4", $done)){ ?>
            <button class="markDone checked" disabled><i class="bi bi-check-all"></i></button>
        <?php }else { ?> 
            <button class="markDone" id="wb4" onClick="markDone('wb4')"><i class="bi bi-check-all"></i></button>
        <?php } ?>
        
        <img src='../images/woodBeam.jpg'>
          <p> Wood Beams 4' </p>
          <h1><?php echo $wb4; ?> </h1>
        </div>
        <?php } ?>
      </div>
    <?php
    }
    echo "<br><br><br>";
  ?>

<div class="buttonSave" id="buttonSave">
    <button id="btn-save" onClick="saveDoneElements()"> Save </button>
</div>

<iframe id="iframeDoneElements" src="orders/updateDoneElements.php"></iframe>

  <br><br><br>
</body>
</html> 
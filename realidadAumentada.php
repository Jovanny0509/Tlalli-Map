<?php
if(isset($_SESSION['idSesion'])){
	header("Location: index.php?a=1");
	exit();
}

$idUsuario  = $_GET['idUsuario'];
$idLugar    = $_GET['idLugar'];
$recurso    = $_GET['recurso'];
$marcador   = $_GET['marcador'];
$audio      = $_GET['audio'];
$texto      = $_GET['texto'];
session_start();
$link = mysqli_connect("localhost","root","password","tlallimap") or die(mysqli_connect_error());
?>
<!-- CSS -->
<style type="text/css">
  div{
    display: none;
  }
</style>
<!-- JS -->
<script src="https://cdn.rawgit.com/jeromeetienne/AR.js/1.5.0/aframe/examples/vendor/aframe/build/aframe.min.js"></script>
<script src="https://cdn.rawgit.com/jeromeetienne/AR.js/1.5.0/aframe/build/aframe-ar.js"></script>

<body style='margin : 0px; overflow: hidden;'>
  <a-scene embedded arjs='sourceType: webcam;'>

  <?if($idLugar == 1){?>
    <a-box src="<?=$recurso?>"></a-box>
  <?}?>

  <?if($idLugar == 2){?>
    <a-box src="<?=$recurso?>"></a-box>
    <a-sound src="src: url(<?=$audio?>)" autoplay="true" position="0 2 5"></a-sound>
  <?}?>

  <?if($idLugar == 3){?>
    <a-box src="<?=$recurso?>"></a-box>
  <?}?>

  <?if($idLugar == 4){?>
    <a-box src="<?=$recurso?>"></a-box>
  <?}?>
    <a-marker-camera type='pattern' url='https://metaline.it/pattern-marker.patt'></a-marker-camera>
  </a-scene>
</body>
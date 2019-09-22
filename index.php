<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Reservas</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body class="bg-primary">
<div class="container">

<?php
include_once 'topo.php';
?>

<?php
require 'config.php';
require 'class/reservas.class.php';

$user = new Reservas($pdo);
?>

<form method="GET">
<div class="form-group">

<select name="ano" class="form-control-sm">
<?php for($q= date('Y'); $q>=2015 ;$q--): ?>
<option><?php echo $q; ?></option>
<?php endfor; ?>
</select>

<select name="mes" class="form-control-sm">
<?php for($m= 1; $m<= 12; $m++): ?>
<option><?php echo $m ;?></option>
<?php endfor; ?>

</select>
<input type="submit" class="btn btn-warning" value="Filtrar">

</div>
</form>



<br/>

<?php 
if (empty($_GET['ano'])) {
	exit;
}

$data = $_GET['ano'].'-'.$_GET['mes'];
$dia1 = date('w', strtotime($data));
$dias = date('t', strtotime($data));
$linhas= ceil(($dia1+$dias) / 7) ;
$dia1= -$dia1;
$data_consulta= date('Y-m-d', strtotime($dia1.' days', strtotime($data)));
$horas= '';

$lista= $user->getReservas($data_consulta, $horas);
?>

<?php
require 'calendario.php';
?>



</div>

  <script type="text/javascript" src="assets/js/loading.js"></script>  
  <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>


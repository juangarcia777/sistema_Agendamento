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

<?php
include_once 'topo.php';
?>

<div class="container ">

<div id="loading" style="display: block">
    <img src="https://media.giphy.com/media/TvLuZ00OIADoQ/giphy.gif" style="width:150px;height:150px;" />
</div>

<div id="conteudo" style="display: none">

<?php
require 'config.php';
require 'class/reservas.class.php';
require 'class/doutores.class.php';

$user= new Doutores($pdo);
$paciente= new Reservas($pdo);
?>


<h2 class="text-">AGENDAR</h2>

<form method="POST">
<div class="form-group bg-secondary" style="padding:20px;">

<strong>Doutor:</strong><br/>
<select name="consulta" class="form-control">

<?php 
$lista=$user->getDoutores();
foreach($lista as $item):
?>
<option><?php echo $item['nome']; ?></option>
<?php endforeach; ?>

</select> <br/><br/>

<strong>Paciente:</strong> <br/>
<input type="text" name="paciente" class="form-control form-control-block"><br/><br/>
<strong>Data da Consulta:</strong><br/>
<input type="text" name="data_consulta" placeholder="aaaa-mm-dd" class="form-control"><br/><br/>
<strong>Horário:</strong><br/>
<input type="text" name="horas" placeholder="??:00:00" class="form-control"><br/><br/>
<input type="submit" class="btn btn-primary btn-block" value="Agendar">

</div>
</form>


<?php 
 if(!empty($_POST['paciente'])) {

    $nome_doutor= $_POST['consulta'];
    $pessoa= $_POST['paciente'];
    $data_consulta=$_POST['data_consulta'];
    $horas=$_POST['horas'];
    
    if ($paciente->verificaReserva($nome_doutor, $data_consulta, $horas)) {
        $paciente->reservar($nome_doutor, $data_consulta, $horas, $pessoa);

        header("Location:index.php");
        exit;
    } else {
      echo "Data ou Horario indisponivel";
    }
 }
?>

</div>

</div>
  <script type="text/javascript" src="assets/js/loading.js"></script>    
  <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

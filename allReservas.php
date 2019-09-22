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

<div class="container">

<div id="loading" style="display: block">
    <img src="https://media.giphy.com/media/TvLuZ00OIADoQ/giphy.gif" style="width:150px;height:150px;" />
</div>

<div id="conteudo" style="display: none">


<?php
require 'config.php';
require 'class/reservas.class.php';
date_default_timezone_set('America/Sao_Paulo');


$user= new Reservas($pdo);

$hoje = date('Y-m-d');

?>

<table border="1" class="table-hover bg-light text-center" width="100%">
<tr>
  <th>Doutor</th>
  <th>Data da Consulta</th>
  <th>Horario da Consulta</th>
  <th>Paciente</th>
</tr>

<?php
$lista= $user->allReservas($hoje);
foreach ($lista as $item):
    ?>
<tr>
  <td><?php echo $item['nome_doutor']  ?></td>
  <td><?php echo $item['data_consulta']  ?></td>
  <td><?php echo $item['horas']  ?></td>
  <td><?php echo $item['pessoa']  ?></td>
</tr>
<?php endforeach; ?>
</table>

</div>

</div>

  <script type="text/javascript" src="assets/js/loading.js"></script>      
  <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
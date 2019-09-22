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
require_once 'topo.php';
?>

<div class="container">

<div id="loading" style="display: block">
    <img src="https://media.giphy.com/media/TvLuZ00OIADoQ/giphy.gif" style="width:150px;height:150px;" />
</div>

<div id="conteudo" style="display: none">


<?php
require 'config.php';
require 'class/pacientes.class.php';

$user= new Paciente($pdo);

?>




<h2 class="text-dark">Cadastrar Novo Paciente</h2>
<form  method="POST">
<div class="form-group">

<strong>Paciente:</strong><br/>
<input type="text" name="paciente" class="form-control"><br/><br/>
<strong>Telefone:</strong> <br/>
<input type="text" name="telefone" class="form-control" placeholder="(00) 9????-????"><br/><br/>
<strong>E-mail:</strong> <br/>
<input type="email" name="email" class="form-control" placeholder="fulano@gmail.com"><br/>
<input type="submit" class="btn btn-primary" value="Enviar">

</div>
</form>
<hr/>

<?php
if (!empty($_POST['paciente'])) {
    $paciente= $_POST['paciente'];
    $telefone= $_POST['telefone'];
    $email= $_POST['email'];

    $user->addPaciente($paciente, $telefone, $email);
    header("location:index.php");
}
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Paciente</th>
            <th>Telefone</th>
            <th>Email</th>
        </tr>
    </thead>

         <?php
          $lista= $user->viewPaciente(); 
          foreach($lista as $item):
          ?>

        <tr>
            <td><?php echo $item['paciente'] ?></td>
            <td><?php echo $item['telefone'] ?></td>
            <td><?php echo $item['email'] ?></td>
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
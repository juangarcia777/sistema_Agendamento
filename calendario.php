<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Reservas</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<?php
require_once 'topo.php';
?>


<table border="2" class="table table-info" width="100%">
	<tr class="bg-primary">
		<th>DOM</th>
		<th>SEG</th>
		<th>TER</th>
		<th>QUA</th>
		<th>QUI</th>
		<th>SEX</th>
		<th>SAB</th>
	</tr>
	<?php for ($l=0; $l <$linhas ; $l++):?>

       <tr>
       	<?php for($q=0;$q<7;$q++):?>
       	<?php $t = strtotime(($q+($l*7)).' days', strtotime($data_consulta));
       	     $w= date('Y-m-d', $t); ?>	
          
         <td class="text-center"><?php echo $w."<br><br>";

           foreach ($lista as $item) { 

          $dr_consulta= $item['data_consulta'];  
          

           if($w == $dr_consulta) {
               echo "<span style='font-size:02px;'>".$item['pessoa']."<br/>".
               "(".$item['nome_doutor'].")"."<br/>";
               echo $item['horas']."</span>"."<br/>";
               echo "<hr/>";
          
           }

            }
          ?></td>

       	<?php endfor; ?>	
       </tr>

	<?php endfor; ?>	
</table>
</div>

  <script type="text/javascript" src="assets/js/loading.js"></script> 
  <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
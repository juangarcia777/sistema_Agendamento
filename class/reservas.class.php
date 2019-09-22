<?php

  class Reservas {
      
    private $pdo;

    public function __construct($pdo) {
     $this->pdo = $pdo;
    }

    public function getReservas($data_consulta, $horas) {
      $array = array();

      $sql= "SELECT * FROM reservas";
      $sql= $this->pdo->query($sql);
      if($sql->rowCount() > 0) {
        $array = $sql->fetchAll();
      }
      return $array;
    }

    public function verificaReserva($nome_doutor, $data_consulta, $horas) {
     $sql= "SELECT * FROM reservas WHERE nome_doutor = :nome_doutor AND
     data_consulta= :data_consulta AND
     horas= :horas";
     $sql= $this->pdo->prepare($sql);
     $sql->bindValue(":nome_doutor", $nome_doutor);
     $sql->bindValue(":data_consulta", $data_consulta);
     $sql->bindValue(":horas", $horas);
     $sql->execute();

     if ($sql->rowCount()>0) {
         return false;
     } else {
         return true;
     }
    }

    public function reservar($nome_doutor, $data_consulta, $horas, $pessoa) {
		
		$sql= "INSERT INTO reservas (nome_doutor, data_consulta, horas, pessoa)
         VALUES (:nome_doutor, :data_consulta, :horas, :pessoa)";

        $sql= $this->pdo->prepare($sql);
        $sql->bindValue(":nome_doutor", $nome_doutor);
        $sql->bindValue(":data_consulta", $data_consulta);
        $sql->bindValue(":horas", $horas);
        $sql->bindValue(":pessoa", $pessoa);
        $sql->execute();
  }
  
  public function allReservas($hoje) {
    $array = array();

    $sql= "SELECT * FROM reservas WHERE data_consulta = '$hoje'";
    $sql= $this->pdo->query($sql);
    if ($sql->rowCount() > 0) {
      $array= $sql->fetchAll();
    }
    return $array;
    }

     
  }
?>
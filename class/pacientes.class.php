<?php

  class Paciente {
      
    private $pdo;

    public function __construct($pdo) {
     $this->pdo = $pdo;
    }

    public function addPaciente($paciente, $telefone, $email) {

        $sql = "INSERT INTO pacientes (paciente, telefone, email)
        VALUES (:paciente, :telefone, :email)";

        $sql= $this->pdo->prepare($sql);
        $sql->bindValue(":paciente", $paciente);
        $sql->bindValue(":telefone", $telefone);
        $sql->bindValue(":email", $email);
        $sql->execute();

    }

    public function viewPaciente() {
        $array= array();

        $sql= "SELECT * FROM pacientes";
        $sql= $this->pdo->query($sql);
        
        if ($sql->rowCount() > 0) {
        $array= $sql->fetchAll();
        }
        return $array;
    }
  }
?>
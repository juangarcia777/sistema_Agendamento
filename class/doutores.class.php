<?php

  class Doutores {
      
    private $pdo;

    public function __construct($pdo) {
     $this->pdo = $pdo;
    }

    public function getDoutores() {
		$array = array();

		$sql= "SELECT * FROM medicos";
		$sql= $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {

			$array= $sql->fetchAll();
		}
			return $array;
	}
  }
?>
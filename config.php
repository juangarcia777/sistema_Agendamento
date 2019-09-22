<?php
try {
    $pdo= new PDO("mysql:dbname=sistema_reservas;host=localhost","root","");
} catch (PDOException $e) {
    echo "Erro de Conexão".$e->getMesssage();
    exit;
}
?>
<?php
require 'config.php';
$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome'); //$nome = $_POST['nome']; funciona do dois jeitos
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($nome && $email){
    $sql = $pdo->prepare("UPDATE clientes SET nome=:nome, email=:email WHERE id=:id");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':id', $id);
    $sql->execute();
    header("Location: index.php");


}else{
    header("Location: adicionar.php");
    exit;
}

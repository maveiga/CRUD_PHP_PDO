<?php
require 'config.php';
// pego as informações vindas do post e salvo em uma variavel
$nome = filter_input(INPUT_POST, 'nome'); //$nome = $_POST['nome']; funciona do dois jeitos
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($nome && $email){
//verificacao sem existe algum email já cadastrado
    $sql = $pdo->prepare("SELECT * FROM clientes WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount()===0){ // se não tiver email cadastrado ele executa
        $sql = $pdo->prepare("INSERT INTO clientes(nome, email) VALUES(:nome, :email)");
        $sql->bindValue(':nome', $nome); // valor
        $sql->bindParam(':email', $email); //parametro, associa coma variavel
    
        $sql->execute();
    
        header("Location: index.php");
        exit;
    

    }else{
        header("Location: adicionar.php");
        exit;

    }

}else{
    header("Location: adicionar.php");
    exit;
}

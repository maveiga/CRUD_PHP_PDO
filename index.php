<?php


require 'config.php';
$lista = [];
$sql = $pdo->query("SELECT * FROM clientes");
if($sql->rowCount()>0){
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>

<a href="adicionar.php">Adicionar</a>
<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Açoes</th>
        
    </tr>
    <?php
    foreach ($lista as $usuario):?>
    <tr>
        </tr>
        <td><?=$usuario['id'];?></td>
        <td><?=$usuario['nome'];?></td>
        <td><?=$usuario['email'];?></td>
        <td>
            <a href="editar.php?id=<?=$usuario['id'];?>">[editar]</a>
            <a href="excluir.php?id=<?=$usuario['id'];?>" onclick="return confirm('Tem certeza que deseja excluir')">[excluir]</a>
        </td>

    <?php endforeach;?>
</table>
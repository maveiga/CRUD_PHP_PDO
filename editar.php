
<?php
require 'config.php';
$info = [];
$id = filter_input(INPUT_GET, 'id');
if($id){
    $sql = $pdo->prepare("SELECT * FROM clientes WHERE id=:id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount()>0){
        $info = $sql->fetch(PDO::FETCH_ASSOC);
            


    }else{
        header("Location: index.php");
        exit;
    }

}else{

    header("Location: index.php");
    exit;

}

?>

<h1>Editar usuario</h1>
<form method="POST" action="editar_action.php">
    <input type="hidden" name="id" value="<?=$info['id']?>"/>
    <label>
        Nome:<br/>
    <input type="text" name="nome" value ="<?=$info['nome']?>"placeholder="digite seu nome">

    </label><br/><br/>

    <label>
        Email:<br/>
    <input type="email" name="email"value ="<?=$info['email']?>" placeholder="digite seu nome">

    </label><br/><br/>

    <input type="submit" values="Salvar"/>

  
</form>
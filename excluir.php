
<?php
require 'config.php';

$id = filter_input(INPUT_GET, 'id');
if($id){
    $sql = $pdo->prepare("DELETE FROM clientes WHERE id=:id");
    $sql->bindParam(':id', $id);
    $sql->execute();
    
   

} header("Location: index.php");
    exit;



?>
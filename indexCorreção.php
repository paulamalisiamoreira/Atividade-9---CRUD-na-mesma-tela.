<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "gerenciamento";

$conn = new mysqli($servername,$username,$password,$dbName);

if ($conn->connect_error){
     die("Conexão falhou". $conn->connect_error);
}

if(isset($_POST['create'])) { // pegar os dados quando dei um submit no form create


} 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <H2>Adicionar Pedido</H2>
    <form method="POST">
        Nome do Cliente: <input type="text" name=nome_cliente>  <br>
        Produto:  <input type="text" name="produto"> require <br>
        Quantidade: <input type="number" name="quantidade"> require <br>
        Data de Entrega: <input type="text" name="data_pedido"> require <br>
        <input type="submit" name="create" value="Adicionar Pedido">
    </form>
</body>
</html>
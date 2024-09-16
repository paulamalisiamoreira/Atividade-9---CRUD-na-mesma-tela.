<?php

// conexão com o banco
$servername = "localhost";
$username = "root";
$password = "root";
$dbName = "gerenciamento";

$conn = new mysqli($servername,$username,$password,$dbName);

if ($conn->connect_error){
     die("Conexão falhou". $conn->connect_error);
}


// CREATE
if(isset($_POST['create'])) { // pegar os dados quando dei um submit no form create
    $name = $_POST['nome'];
    $nome_produto = $_POST['nome_produto'];
    $quantidade_produto = $_POST['quantidade'];
    $data_entrega = $_POST['data_entrega'];

$sql = "INSERT INTO pedidos(nome_cliente, quantidade, nome_produto, data_entrega) VALUE ('$name', '$nome_produto', '$quantidade_produt', '$data_entrega')";

if ($conn -> QUERY($sql) === TRUE){
    echo "Novo registro criado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

} 

// READ
$sql = "SELECT * from pedidos";
$result = $conn -> query($sql);

$sql = "SELECT * from pedidos  WHERE id=$id";
$result = $conn-> query($sql);
$row = $result -> fetch_assoc();




// // UPDATE

// // pega os dados baseado no id
// $id = $_GET['id'];

// // recebe os dados do html pelo post
// if ($_SERVER['REQUEST_METHOD'] == 'POST'){

//     $name = $_POST['nome'];
//     $nome_produto = $_POST['nome_produto'];
//     $quantidade_produto = $_POST['quantidade'];
//     $data_entrega = $_POST['data_entrega'];

//     $sql = "UPDATE pedidos SET '$nome'=nome_cliente, '$nome_produto' = nome_produto, '$quantidade_produto' = quantidade, '$data_entrega' = data_entrega WHERE id = '$id'";

//     if ($conn-> query($sql) === TRUE) {
//         echo('Pedido atualizado com sucesso!');
//     } else{
//         echo "Erro: " . $sql . "</br>" . $conn -> connect_error;
//     }

//     $conn-> close();
//     exit();
// }





?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

        <H2>Adicionar Pedido</H2>
        <form method="POST">
            Nome do Cliente: <input type="text" name=nome>  <br>
            Produto:  <input type="text" name="nome_produto"> require <br>
            Quantidade: <input type="number" name="quantidade"> require <br>
            Data de Entrega: <input type="text" name="data_entrega"> require <br>
            <input type="submit" name="create" value="Adicionar Pedido">
        </form>

        <h2>Ver pedidos</h2>
        <table border='1'>
        <tr>
            <th> ID </th>
            <th> Nome Cliente </th>
            <th> Nome Produto </th>
            <th> Data Produto </th>
            <th> Quantidade </th>
            <th> Ações </th>
        </tr>";
       <tr>
            <td> <?$row['id']?> </td>
            <td> <?$row['nome_cliente']?> </td>
            <td> <?$row['nome_produto']?> </td>
            <td> <?$row['quantidade']?> </td>
            <td> <?$row['date_entrega']?> </td>
            <td>
                <a href=>Editar</a> |
                <a href=>Excluir</a>
            </td>
        </tr>

        <h2>Update Pedido</h2>
        <form method="POST" action="index.php?id=<?php echo $row['id'];?>" >
            <label for="nome">Nome Cliente </br></label> 
            <input type="text" name="nome" value=<?php echo $row['id']?>>
            <label for="nome_produto">Nome do Produto </br></label>
            <input type="text" name="nome_produto" value=<?php echo $row['nome']?>>
            <label for="quantidade">Quantidade Produto </br></label>
            <input type="number" name="quantidade" value=<?php echo $row['quantidade']?>>
            <label for="data_entrega"> Data de entrega:<input type="date"> </br></label>
        </form>


</body>
</html>

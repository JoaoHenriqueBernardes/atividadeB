<?php

include "conexao.php";
$busca = isset($_GET['busca']) ? $_GET['busca'] : '';

$sql = "SELECT * FROM clientes WHERE nome LIKE '%$busca%'";
$result = $conn->query($sql);


if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $datanasc = $_POST['datanascimento'];
    $email = $_POST['email'];
    $conn->query("INSERT INTO tbcliente (nome, cpf, datanascimento, email) VALUES ('$nome', '$cpf', '$datanasc', '$email')");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM tbcliente WHERE cod = $id");
}

$clientes = $conn->query("SELECT * FROM tbcliente");
?>
<!DOCTYPE html>
<html>
<head>
  
    
    
    <title>Clientes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form method="post">
    <h2>Cadastro de Cliente</h2>
    <input type="text" name="nome" placeholder="Nome">
    <input type="text" name="cpf" placeholder="CPF">
    <input type="date" name="datanascimento">
    <input type="email" name="email" placeholder="Email">
    <input type="submit" value="Cadastrar">
</form>

<h2>Clientes</h2>
<table>
<tr><th>Cód</th><th>Nome</th><th>CPF</th><th>Data Nasc</th><th>Email</th><th>Ações</th></tr>

<?php while($row = $clientes->fetch_assoc()): ?>
<tr>
    <td><?= $row['cod'] ?></td>
    <td><?= $row['nome'] ?></td>
    <td><?= $row['cpf'] ?></td>
    <td><?= $row['datanascimento'] ?></td>
    <td><?= $row['email'] ?></td>
    <td>
        <a href="editar.php?cod=<?= $row['cod'] ?>">Editar</a>
        <a href="?delete=<?= $row['cod'] ?>">Excluir</a>
    </td>
</tr>


<?php endwhile; ?>
</table>
<a href="index.php">Sair</a>
</body>
</html>
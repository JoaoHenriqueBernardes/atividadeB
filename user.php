<?php


include "conexao.php";
$busca = isset($_GET['busca']) ? $_GET['busca'] : '';

$sql = "SELECT * FROM usuarios WHERE nome LIKE '%$busca%'";
$result = $conn->query($sql);


if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['login'];
    $datanasc = $_POST['senha'];
   
    $conn->query("INSERT INTO tbuser (nome, login, senha) VALUES ('$nome', '$login', '$senha')");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM tbuser WHERE cod = $id");
}

$usuarios = $conn->query("SELECT * FROM tbuser");
?>
<!DOCTYPE html>
<html>
<head>
  
    
    
    <title>usuarios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form method="post">
    <h2>Cadastro de usuario</h2>
    <input type="text" name="nome" placeholder="Nome">
    <input type="text" name="login" placeholder="login">
    <input type="password" name="senha" placeholder="Senha">
    
    <input type="submit" value="Cadastrar">
</form>

<h2>Clientes</h2>
<table>
<tr><th>Cód</th><th>Nome</th><th>login</th><th>senha </th></tr>

<?php while($row = $usuarios->fetch_assoc()): ?>
<tr>
    <td><?= $row['cod'] ?></td>
    <td><?= $row['nome'] ?></td>
    <td><?= $row['login'] ?></td>
    <td><?= $row['senha'] ?></td>
    
    <td>
        <a href="editar2.php?cod=<?= $row['cod'] ?>">Editar</a>
        <a href="?delete=<?= $row['cod'] ?>">Excluir</a>
    </td>
</tr>


<?php endwhile; ?>
</table>
<a href="index.php">Sair</a>
</body>
</html>
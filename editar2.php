<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include ("conexao.php");

if (isset($_GET['cod'])) {
    $cod = $_GET['cod'];
    $result = $conn->query("SELECT * FROM tbuser WHERE cod = $cod");
    $cliente = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cod = $_POST['cod'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $conn->query("UPDATE tbuser SET nome='$nome', senha='$senha' WHERE cod=$cod");
    header("Location: clientes.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Cliente</title>
</head>
<body>
<form method="post">
    <input type="hidden" name="cod" value="<?= $cliente['cod'] ?>">
    Nome: <input type="text" name="nome" value="<?= $cliente['nome'] ?>"><br>
    senha: <input type="text" name="senha" value="<?= $cliente['senha'] ?>"><br>
    <input type="submit" value="Atualizar">
</form>
</body>
</html>
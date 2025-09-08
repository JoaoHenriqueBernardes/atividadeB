<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include "conexao.php";

if (isset($_GET['cod'])) {
    $cod = $_GET['cod'];
    $result = $conn->query("SELECT * FROM tbcliente WHERE cod = $cod");
    $cliente = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cod = $_POST['cod'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $datanasc = $_POST['datanascimento'];
    $email = $_POST['email'];
    $conn->query("UPDATE tbcliente SET nome='$nome', cpf='$cpf', datanascimento='$datanasc', email='$email' WHERE cod=$cod");
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
    CPF: <input type="text" name="cpf" value="<?= $cliente['cpf'] ?>"><br>
    Data Nasc.: <input type="date" name="datanascimento" value="<?= $cliente['datanascimento'] ?>"><br>
    Email: <input type="email" name="email" value="<?= $cliente['email'] ?>"><br>
    <input type="submit" value="Atualizar">
</form>
</body>
</html>
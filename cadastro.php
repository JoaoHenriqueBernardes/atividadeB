<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $conn->query("INSERT INTO tbuser (nome, login, senha) VALUES ('$nome', '$login', '$senha')");
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form method="post">
    <h2>Cadastrar Usuário</h2>
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="text" name="login" placeholder="Login" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <input type="submit" value="Cadastrar">
</form>
</body>
</html>
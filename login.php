<?php
session_start();
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM tbuser WHERE login = '$login' AND senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['login'] = $login;
        header("Location: home.php");
    } else {
        echo "Login ou senha inválidos.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form method="post">
    <h2>Login</h2>
    <input type="text" name="login" placeholder="Login">
    <input type="password" name="senha" placeholder="Senha">
    <input type="submit" value="Entrar">
</form>
</body>
</html>
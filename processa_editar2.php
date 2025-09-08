<?php
include_once("conexao.php");

$cod = $_POST['cod'];
$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];

$result_usuario = "UPDATE tbuser SET nome='$nome', login='$login', senha='$senha' WHERE cod=$cod";
$resultado_usuario = mysqli_query($conexao, $result_usuario);

if(mysqli_affected_rows($conexao)) {
    echo "Usuário editado com sucesso.<br>";
    echo "<a href='clientes.php'>Voltar</a>";
} else {
    echo "Erro ao editar usuário.<br>";
    echo "<a href='clientes.php'>Voltar</a>";
}

<?php
include_once("conexao.php");

if(isset($_GET['cod'])) {
    $cod = $_GET['cod'];
    $query = "DELETE FROM tbuser WHERE cod = $cod";
    $result = mysqli_query($conexao, $query);

    if(mysqli_affected_rows($conexao)) {
        echo "Usuário excluído com sucesso.<br>";
    } else {
        echo "Erro ao excluir usuário.<br>";
    }
}
echo "<a href='clientes.php'>Voltar</a>";

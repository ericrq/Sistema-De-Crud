<?php
// conexao com o banco mysql
require_once '../php/conexao.php';

// se existir o post
if (isset($_GET['id'])) {
    //pega o campo id
    $id = $_GET['id'];

    //comando sql para deletar ele do banco
    $sql = "DELETE FROM clientes WHERE id_cliente = '$id'";

    //executa o comando sql
    if (mysqli_query($connection, $sql)) {
        //volta para a tabela se n houver erro
        header("Location:../index.php");
    } else {
        echo 'error ao deletar';
    }
}

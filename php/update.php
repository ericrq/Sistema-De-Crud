<?php
// conexao com o banco mysql
require_once '../php/conexao.php';

// se existir o post
if (isset($_POST['btn-editar'])) {
    //pega os campos
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $defeito = $_POST['defeito'];
    $id = $_POST['id'];
    $tipo_produto = $_POST['id_produto'];
    // pega a data atual e inserindo no banco de dados
    $dh_atual = date('Y-m-d,h:m:s');

    //comando sql de update para o id expecifico
    $sql = "UPDATE clientes set nome = '$nome', telefone = '$telefone', endereço = '$endereco', cpf = '$cpf', email = '$email', defeito = '$defeito', id_produto = '$tipo_produto', dh_registro = '$dh_atual' where id_cliente = '$id'";

    //executa o comando sql
    if (mysqli_query($connection, $sql)) {
        echo 'resgistrado';
        //volta para a tabela
        header('location:../index.php');
    } else {
        echo 'error';
    }
}

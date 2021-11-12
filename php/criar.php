<?php
// conexao com o banco mysql
require_once '../php/conexao.php';

// se existir o post
if (isset($_POST['btn-cadastrar'])) {
    // pega tds os campos do formulario
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $defeito = $_POST['defeito'];
    $id_produto = $_POST['id_produto'];
    // pega a data e hora do momento do cadastro
    $dh_atual = date('Y-m-d,h:m:s');
    
    if ($id_produto != '') {
        //insere na tabela do banco mysql
        $sql = "INSERT INTO clientes (nome, telefone, endereço, cpf, email, defeito, id_produto, dh_registro)
        values('$nome', '$telefone', '$endereco', '$cpf', '$email', '$defeito', '$id_produto', '$dh_atual')";

        //executa o comando 
        if (mysqli_query($connection, $sql)) {
            echo 'resgistrado';
            //se n houver erro volta para a tabela
            header('location:../index.php');
        } else {
            echo 'error';
        }
    }
}
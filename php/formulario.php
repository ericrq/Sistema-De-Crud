<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link css -->
    <link rel="stylesheet" href="../css/estilo.css">
    <!-- link fontawesome "icones" -->
    <script src="https://kit.fontawesome.com/19e27bbf66.js" crossorigin="anonymous"></script>
    <title>Formulario de cadastramento</title>
</head>

<body>
    <!-- formulario para registro de dados -->
    <h1>Formulario</h1>
    <form action="criar.php" method="post">
        <!-- label e inputs abaixos com os campos necessarios para o registro -->
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Digite Seu Nome" required><br>

        <label for="telefone">Telefone:</label>
        <input type="tel" name="telefone" id="telefone" placeholder="Digite Seu Telefone"><br>

        <label for="endereço">Endereço:</label>
        <input type="text" name="endereco" id="endereco" placeholder="Digite Seu Endereço"><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" placeholder="Digite Seu Cpf"><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Digite Seu Email"><br>

        <label for="defeito">Defeito:</label>
        <textarea name="defeito" id="defeito" cols="30" rows="10" placeholder="Descreva o Defeito Do Equipamento"></textarea><br>
        <?php
        // conexao mysql
        require_once '../php/conexao.php';
        // comando select sql
        $sql = "SELECT * FROM produto";
        $resultado = mysqli_query($connection, $sql);
        ?>

        <label for="defeito">Tipo Do Produto</label>
        <select required name="id_produto">
            <option value>Selecione um Tipo</option>
            <?php
            while ($produtos = mysqli_fetch_array($resultado)) {
            ?>
                <!-- campos responsivos dependendo do banco mysql -->
                <option required value="<?php echo $produtos['id_produto']; ?>"><?php echo $produtos['tipo_produto']; ?> </option>
            <?php
            }
            ?>
        </select>
        <input type="submit" name="btn-cadastrar" value="Cadastrar"><br>
        <!-- link indo para a tabela de clientes ja registrados -->
        <a href="../index.php">Lista de Clientes</a>
        <!-- ad -->
        <footer>
            <a target="_black" href="https://github.com/ericrq">Desenvolvido Por Eric On<i class="fa fa-github"></i></a>
        </footer>
</body>

</html>
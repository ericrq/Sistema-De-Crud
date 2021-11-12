<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link css -->
    <link rel="stylesheet" href="css/estilo.css">
    <!-- link fontawesome "icones" -->
    <script src="https://kit.fontawesome.com/19e27bbf66.js" crossorigin="anonymous"></script>
    <!-- link icone -->
    <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon">
    <title>Tabela De Clientes</title>
</head>

<body>
    <!-- tabela clientes -->
    <h1>Clientes</h1>
    <table border="1">
        <tr>
            <!-- campos fixos -->
            <td>Nome</td>
            <td>Telefone</td>
            <td>Endereço</td>
            <td>CPF</td>
            <td>Email</td>
            <td>Defeito</td>
            <td>Tipo Do Produto</td>
            <!-- campo fixo para deleta e editar -->
            <td colspan="2">Açoes</td>
        </tr>

        <?php
        //conexeçao com o banco mysql
        require_once 'php/conexao.php';

        //seleçao e execuçao da tabela clientes no sql
        $sql = "SELECT * FROM clientes
        JOIN produto ON clientes.id_produto = produto.id_produto";
        $resultado = mysqli_query($connection, $sql);

        //while para mostrar oq for selecionado no sql
        while ($clientes = mysqli_fetch_array($resultado)) {
        ?>
            <tr>
                <!-- campos responsivos dependendo do banco mysql -->
                <td><?php echo $clientes['nome']; ?></td>
                <td><?php echo $clientes['telefone']; ?></td>
                <td><?php echo $clientes['endereço']; ?></td>
                <td><?php echo $clientes['cpf']; ?></td>
                <td><?php echo $clientes['email']; ?></td>
                <td><?php echo $clientes['defeito']; ?></td>
                <td><?php echo $clientes['tipo_produto']; ?></td>

                <!-- links para editar e deletar registro -->
                <td><a href="php/editar.php?id=<?php echo $clientes['id_cliente']; ?>"><abbr title="editar registro"><i class="fas fa-edit"></abbr></i></a></td>
                <td><a href="php/deletar.php?id=<?php echo $clientes['id_cliente']; ?>"><abbr title="excluir registro"><i class="fas fa-trash"></abbr></i></a></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <!-- link para o formulario -->
    <a class="voltar_form" href="php/formulario.php">Adicionar Cliente</a>
    <!-- ad -->
    <footer>
        <a target="_black" href="https://github.com/ericrq">Desenvolvido Por Eric On<i class="fa fa-github"></i></a>
    </footer>

</body>

</html>
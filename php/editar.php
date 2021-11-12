<?php
// conexao com o banco mysql
require_once 'conexao.php';

// se existir o post
if (isset($_GET['id'])) {
    //pega o campo id
    $id = $_GET['id'];

    //comnando sql para a seleçao dos clientes com o id vindo do campo acima
    $sql = "SELECT * FROM clientes WHERE id_cliente = '$id'";
    $resultado = mysqli_query($connection, $sql);
    $clientes = mysqli_fetch_array($resultado);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link icone -->
    <link rel="stylesheet" href="../css/estilo.css">
    <!-- link fontawesome "icones" -->
    <script src="https://kit.fontawesome.com/19e27bbf66.js" crossorigin="anonymous"></script>
    <title>Editar Registro</title>
</head>

<body>
    <!-- formulario para editar registros -->
    <h1>Editar Registro</h1>
    <form action="update.php" method="post">

        <!-- campo para pegar o id vindo da url, na url ele vem do a href -->
        <input type="hidden" name="id" value="<?php echo $clientes['id_cliente']; ?>">

        <!-- no campo value um trecho php para pegar oq estiver no "nome" por ex, vindo do sql -->
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Digite Seu Nome" value="<?php echo $clientes['nome']; ?>"><br>

        <label for="telefone">Telefone:</label>
        <input type="tel" name="telefone" id="telefone" placeholder="Digite Seu Telefone" value="<?php echo $clientes['telefone']; ?>"><br>

        <label for="endereço">Endereço:</label>
        <input type="text" name="endereco" id="endereco" placeholder="Digite Seu Endereço" value="<?php echo $clientes['endereço']; ?>"><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" placeholder="Digite Seu Cpf" value="<?php echo $clientes['cpf']; ?>"><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Digite Seu Email" value="<?php echo $clientes['email']; ?>"><br>

        <label for="defeito">Defeito:</label>
        <textarea name="defeito" id="defeito" cols="30" rows="10" placeholder="Descreva o Defeito Do Equipamento"><?php echo $clientes['defeito']; ?></textarea><br>

        <!-- select responsivo dependendo que campos tem no banco sql -->
        <select name="id_produto">
            <?php
            //comando sql para selecionar os campos
            $sql = "SELECT * FROM produto";
            $resultado = mysqli_query($connection, $sql);
            //enquanto existir registros dentro da tabela
            while ($produtos = mysqli_fetch_array($resultado)) {

                if ($produtos['id_produto'] == $clientes['id_produto']) {
            ?>
                    <!-- campos responsivos dependendo do banco mysql -->
                    <option selected value="<?php echo $produtos['id_produto']; ?>"><?php echo $produtos['tipo_produto']; ?> </option>
                <?php
                } else {
                ?>
                    <option value="<?php echo $produtos['id_produto']; ?>"><?php echo $produtos['tipo_produto']; ?> </option>
            <?php
                }
            }
            ?>
        </select>
        <input type="submit" name="btn-editar" value="editar"><br>

        <!-- tabela de clientes -->
        <a href="../index.php">Lista de Clientes</a>
        <!-- ad -->
        <footer>
            <a target="_black" href="https://github.com/ericrq">Desenvolvido Por Eric On<i class="fa fa-github"></i></a>
        </footer>
</body>

</html>
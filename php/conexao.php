<?php

//conexao com o banco mysql
$connection = mysqli_connect('localhost', 'root', '', 'crud');

//executa a conexao
if (mysqli_connect_errno()) {
    // se houver erro 
    echo "Error connecting to database";
}

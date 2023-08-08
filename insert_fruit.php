<?php
// insert_fruit.php

// Inclua a classe DevilFruit e a conexão com o banco de dados aqui
include 'onepiece_db.php';

// Verifique se a requisição foi feita via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha os valores enviados do formulário
    $name = $_POST["name"];
    $meaning = $_POST["meaning"];
    $currentUser = $_POST["user"];
    $picture = $_POST["picture"];
    $categoria = $_POST["categoria"]; // Novo parâmetro adicionado

    // Crie uma instância da classe DevilFruit com o novo parâmetro categoria
    $devilFruit = new DevilFruit($name, $meaning, $currentUser, $picture, $categoria);

    // Insira a DevilFruit no banco de dados
    insertDevilFruit($devilFruit, $conn); // Passando a conexão como parâmetro
}
?>

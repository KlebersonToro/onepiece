<?php

// Dados de conexão com o banco de dados
$servername = "klebinho-avell"; // Nome do servidor
$username = "root"; // Usuário do banco de dados
$password = ""; // Senha do banco de dados
$db = "onepiece_db"; // Nome do banco de dados

// Conecte ao banco de dados
$conn = new mysqli($servername, $username, $password, $db);

// Verifique a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Lê o conteúdo do arquivo JSON
$jsonData = file_get_contents('devil_fruits.json');

// Decodifica o JSON para um array associativo
$fruits = json_decode($jsonData, true);

// Itera sobre as frutas e insere no banco de dados
foreach ($fruits as $fruit) {
    $name = $fruit["name"];
    $meaning = $fruit["meaning"];
    $categoria = $fruit["categoria"];

    // Verifica se a fruta já existe no banco de dados
    $existingFruitQuery = "SELECT * FROM devil_fruits WHERE name = '$name'";
    $existingFruitResult = $conn->query($existingFruitQuery);

    if ($existingFruitResult->num_rows > 0) {
        echo "Fruta '$name' já existe no banco de dados. Não foi inserida novamente.<br>";
    } else {
        $sql = "INSERT INTO devil_fruits (name, meaning, currentUser, picture, categoria) 
                VALUES ('$name', '$meaning', '', '', '$categoria')";

        if ($conn->query($sql) !== true) {
            echo "Erro ao inserir a fruta '$name': " . $conn->error . "<br>";
        } else {
            echo "Fruta '$name' inserida com sucesso!<br>";
        }
    }
}

// Feche a conexão com o banco de dados
$conn->close();

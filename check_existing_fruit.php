<?php
include "onepiece_db.php"; // Inclua o arquivo de conexão com o banco de dados

// Receba o nome da fruta por parâmetro GET
$name = $_POST["name"];

// Consulta para verificar se já existe uma fruta com o mesmo nome
$sql = "SELECT * FROM devil_fruits WHERE name = '$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "exists"; // Já existe uma fruta com esse nome
} else {
    echo "not_exists"; // Não existe fruta com esse nome
}

$conn->close();
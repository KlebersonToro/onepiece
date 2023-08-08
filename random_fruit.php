<?php
include "onepiece_db.php"; // Inclua o arquivo de conexão com o banco de dados

// Obtenha as categorias selecionadas do parâmetro GET
$selectedCategories = $_GET["categories"];

// Crie a parte da consulta SQL para as categorias selecionadas
$categoryConditions = array();
foreach ($selectedCategories as $category) {
    $categoryConditions[] = "categoria='$category'";
}
$categoryCondition = implode(" OR ", $categoryConditions);

// Construa a consulta SQL completa
$sql = "SELECT * FROM devil_fruits WHERE $categoryCondition ORDER BY RAND() LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fruitName = $row["name"];
    echo $fruitName;
} else {
    echo "Nenhuma fruta encontrada com as categorias selecionadas.";
}

// Feche a conexão com o banco de dados
$conn->close();

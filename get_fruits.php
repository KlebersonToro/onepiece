<?php
include "onepiece_db.php"; // Inclua o arquivo de conexão com o banco de dados

// Consulta SQL para obter as frutas do banco de dados
$sql = "SELECT * FROM devil_fruits ORDER BY name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Crie um card para cada fruta
        echo '<div class="col-md-4 mb-3">
                <div class="card akuma-card">
                    <img src="' . $row["picture"] . '" class="card-img-top" alt="Imagem da Fruta">
                    <div class="card-body">
                        <h5 class="card-title">' . $row["name"] . '</h5>
                        <p class="card-text">' . $row["meaning"] . '</p>
                        <p class="akuma-type">Categoria: ' . $row["categoria"] . '</p>
                        <p class="akuma-type">Usuário Atual: ' . $row["currentUser"] . '</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="edit_fruit.php?id=' . $row["id"] . '" class="btn btn-primary">Editar</a>
                            <button class="btn btn-danger delete-button" data-id="' . $row["id"] . '">Excluir</button>
                        </div>
                    </div>
                </div>
            </div>';
    }
} else {
    echo '<p>Nenhuma fruta encontrada no banco de dados.</p>';
}

$conn->close(); // Feche a conexão com o banco de dados

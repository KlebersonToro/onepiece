<?php
include "onepiece_db.php"; // Inclua o arquivo de conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receba os dados do formulário
    $id = $_POST["id"];
    $name = $_POST["name"];
    $meaning = $_POST["meaning"];
    $categoria = $_POST["categoria"];
    $user = $_POST["user"];

    // Verifique se uma nova imagem foi enviada
    if ($_FILES["picture"]["name"] !== "") {
        $picture = "images/" . $_FILES["picture"]["name"];
        move_uploaded_file($_FILES["picture"]["tmp_name"], $picture);
    } else {
        // Mantenha a imagem atual se nenhuma nova imagem for enviada
        $sql_select_image = "SELECT picture FROM devil_fruits WHERE id = '$id'";
        $result_select_image = $conn->query($sql_select_image);

        if ($result_select_image->num_rows > 0) {
            $row = $result_select_image->fetch_assoc();
            $picture = $row["picture"];
        }
    }

    // Atualize as informações da fruta no banco de dados
    $sql_update = "UPDATE devil_fruits SET name = '$name', meaning = '$meaning', categoria = '$categoria', currentUser = '$user', picture = '$picture' WHERE id = '$id'";

    if ($conn->query($sql_update) === TRUE) {
        header("Location: list.html"); // Redirecione de volta à lista de frutas após a atualização
    } else {
        echo "Erro ao atualizar a fruta: " . $conn->error;
    }

    $conn->close(); // Feche a conexão com o banco de dados
} else {
    echo "Acesso não autorizado.";
}

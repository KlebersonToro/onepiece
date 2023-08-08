<?php

include "devil_fruit.php";

// Defina as informações do banco de dados
$servername = "klebinho-avell"; // Nome do servidor
$username = "root"; // Usuário do banco de dados
$password = ""; // Senha do banco de dados
$db = "onepiece_db"; // Nome do banco de dados

// Conecte ao banco de dados
$conn = new mysqli($servername, $username, $password, $db);

// Verifique se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Exemplo de método para inserir uma nova DevilFruit no banco de dados
function insertDevilFruit($devilFruit, $conn)
{
    // Execute a inserção na tabela do banco de dados
    $name = $devilFruit->getName();
    $meaning = $devilFruit->getMeaning();
    $currentUser = $devilFruit->getCurrentUser();
    $picture = $devilFruit->getPicture();
    $categoria = $devilFruit->getCategoria(); // Novo parâmetro

    $sql = "INSERT INTO devil_fruits (name, meaning, currentUser, picture, categoria) VALUES ('$name', '$meaning', '$currentUser', '$picture', '$categoria')";

    if ($conn->query($sql) === TRUE) {
        echo "Nova Devil Fruit adicionada com sucesso!";
    } else {
        echo "Erro ao adicionar Devil Fruit: " . $conn->error;
    }

    $conn->close();
}


// Exemplo de método para buscar uma DevilFruit do banco de dados por nome
function getDevilFruitByName($name)
{
    global $conn;

    $sql = "SELECT * FROM devil_fruits WHERE name='$name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Encontrou a DevilFruit no banco de dados
        $row = $result->fetch_assoc();
        $devilFruit = new DevilFruit($row["name"], $row["meaning"], $row["currentUser"], $row["picture"], $row["categoria"]); // Inclui o novo parâmetro categoria
        return $devilFruit;
    } else {
        // Não encontrou a DevilFruit no banco de dados
        return null;
    }

    $conn->close();
}

// Exemplo de método para atualizar um usuário atual de uma DevilFruit no banco de dados
function updateDevilFruitCurrentUser($devilFruit, $newUser)
{
    global $conn;

    $name = $devilFruit->getName();

    $sql = "UPDATE devil_fruits SET currentUser='$newUser' WHERE name='$name'";

    if ($conn->query($sql) === true) {
        echo "Usuário atual da Devil Fruit atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar usuário atual da Devil Fruit: " . $conn->error;
    }

    $conn->close();
}

// Exemplo de método para excluir uma DevilFruit do banco de dados por nome
function deleteDevilFruitByName($name)
{
    global $conn;

    $sql = "DELETE FROM devil_fruits WHERE name='$name'";

    if ($conn->query($sql) === true) {
        echo "Devil Fruit excluída com sucesso!";
    } else {
        echo "Erro ao excluir Devil Fruit: " . $conn->error;
    }

    $conn->close();
}

// Exemplo de uso dos métodos

// Crie uma instância da classe DevilFruit
// $devilFruit = new DevilFruit("Nome da Fruta", "Significado da Fruta", "Usuário Atual", "imagem.jpg", "Logia");

// Insira a DevilFruit no banco de dados
// insertDevilFruit($devilFruit);

// Busque a DevilFruit no banco de dados pelo nome
// $devilFruitByName = getDevilFruitByName("Nome da Fruta");
// echo "Devil Fruit encontrada: " . $devilFruitByName->getName() . " - " . $devilFruitByName->getMeaning() . "<br>";

// Atualize o usuário atual da DevilFruit
// updateDevilFruitCurrentUser($devilFruitByName, "Novo Usuário");

// Exclua a DevilFruit do banco de dados
// deleteDevilFruitByName("Nome da Fruta");
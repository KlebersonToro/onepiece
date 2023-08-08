<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Fruta do Diabo</title>
</head>

<body>
    <?php
    // Incluir a classe DevilFruit e outras configurações
    require_once 'devil_fruit.php';

    // Função para carregar os dados da fruta do diabo
    function loadDevilFruit($name)
    {
        // Aqui você pode implementar a lógica para carregar os dados da fruta do banco de dados
        // e retornar um objeto DevilFruit com esses dados
    }

    // Função para salvar os dados editados da fruta do diabo
    function saveDevilFruit($devilFruit)
    {
        // Aqui você pode implementar a lógica para salvar os dados editados da fruta no banco de dados
    }

    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $devilFruit = loadDevilFruit($name);

        if ($devilFruit) {
            $devilFruit->setName($_POST["newName"]);
            $devilFruit->setMeaning($_POST["meaning"]);
            $devilFruit->setCurrentUser($_POST["currentUser"]);
            $devilFruit->setPicture($_POST["picture"]);
            $devilFruit->setCategoria($_POST["categoria"]); // Novo campo para a categoria

            saveDevilFruit($devilFruit);
            echo "Fruta do Diabo editada com sucesso!";
        }
    } else {
        // Obtém o nome da fruta do diabo a ser editada
        $name = $_GET["name"];
        $devilFruit = loadDevilFruit($name);
    }
    ?>

    <h1>Editar Fruta do Diabo</h1>
    <form method="POST" action="">
        <input type="hidden" name="name" value="<?php echo $devilFruit->getName(); ?>">
        <label for="newName">Novo Nome:</label>
        <input type="text" name="newName" value="<?php echo $devilFruit->getName(); ?>"><br>
        <label for="meaning">Significado:</label>
        <input type="text" name="meaning" value="<?php echo $devilFruit->getMeaning(); ?>"><br>
        <label for="currentUser">Usuário Atual:</label>
        <input type="text" name="currentUser" value="<?php echo $devilFruit->getCurrentUser(); ?>"><br>
        <label for="picture">Imagem:</label>
        <input type="text" name="picture" value="<?php echo $devilFruit->getPicture(); ?>"><br>
        <label for="categoria">Categoria:</label>
        <input type="text" name="categoria" value="<?php echo $devilFruit->getCategoria(); ?>"><br>
        <!-- Novo campo para a categoria -->
        <input type="submit" value="Salvar">
    </form>
</body>

</html>
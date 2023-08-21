<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Fruta do Diabo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <?php
        include "onepiece_db.php"; // Inclua o arquivo de conexão com o banco de dados
        
        // Verifique se o ID da fruta foi passado na URL
        if (isset($_GET["id"])) {
            $fruit_id = $_GET["id"];

            // Consulta SQL para obter informações da fruta pelo ID
            $sql = "SELECT * FROM devil_fruits WHERE id = '$fruit_id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <h2>Editar Informações da Fruta</h2>
                <form action="update_fruit.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome da Akuma No Mi:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="meaning" class="form-label">Significado da Fruta:</label>
                        <input type="text" class="form-control" id="meaning" name="meaning"
                            value="<?php echo $row['meaning']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoria:</label>
                        <input type="text" class="form-control" id="categoria" name="categoria"
                            value="<?php echo $row['categoria']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="user" class="form-label">Usuário Atual:</label>
                        <input type="text" class="form-control" id="user" name="user"
                            value="<?php echo $row['currentUser']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="picture" class="form-label">Imagem:</label>
                        <input type="file" class="form-control" id="picture" name="picture">
                        <img src="<?php echo $row['picture']; ?>" alt="Imagem Atual" class="mt-2" width="150">
                    </div>

                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </form>
                <?php
            } else {
                echo '<p>Fruta não encontrada.</p>';
            }
        } else {
            echo '<p>ID da fruta não fornecido.</p>';
        }

        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
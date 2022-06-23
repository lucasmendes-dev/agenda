<?php
    include_once("templates/header.php");
?>

    <div class="container">
    <?php include_once("templates/backbtn.html"); ?>
        <h1 id="main-title">Editar contato</h1>
        <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
            <input type="hidden" name="type" value="edit">
            <input type="hidden" name="id" value="<?= $contact['id'] ?>">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input class="form-control" type="text" name="name" id="name" value="<?= $contact['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefone:</label>
                <input class="form-control" type="text" name="phone" id="phone" value="<?= $contact['phone'] ?>" required>
            </div>
            <div class="form-group">
                <label for="observations">Observações:</label>
                <textarea rows="3" class="form-control" type="text" name="observations" id="observations" ><?= $contact['observations'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>

<?php
    include_once("templates/footer.php");
?>

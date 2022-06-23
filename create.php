<?php
    include_once("templates/header.php");
?>

    <div class="container">
    <?php include_once("templates/backbtn.html"); ?>
        <h1 id="main-title">Criar contato</h1>
        <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
            <input type="hidden" name="type" value="create">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Digite o nome" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefone:</label>
                <input class="form-control" type="text" name="phone" id="phone" placeholder="(00)00000-0000" required>
            </div>
            <div class="form-group">
                <label for="observations">Observações:</label>
                <textarea rows="3" class="form-control" type="text" name="observations" id="observations" placeholder="Observações"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

<?php
    include_once("templates/footer.php");
?>

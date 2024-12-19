<?php if (!empty($_SESSION)) { ?>
    <div class="content">
        <h1>Mes locations</h1>
        <div class="myRentals">
            <?php if (empty($myRentals)) {
                echo "<p>Aucun logement n'est publié</p>";
            } else {
                echo "<p>Logement trouvé</p>";
            } ?>
        </div>
        <a href="/onightroof/myRentals/basicInfo" class="formSubmit">Ajouter une offre</a>
    </div>
<?php } ?>
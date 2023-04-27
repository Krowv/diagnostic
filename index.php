<?php
$title = "Page d'accueil";
include("component/header.php");
include("entity/DatabaseConnexion.php");
require ("entity/Grid.php");
$grid = new Grid;

$lastGridNumber = $grid->searchLastGridNumber();


?>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <body>
    <div class="d-flex justify-content-center align-items-center">
        <h1 class="my-4">Innovatek</h1>
    </div>

    <div class="row">
        <div class="text-center">
            <button class="btn btn-primary mb-2"><a href="create_grid.php?grid_number=<?= $lastGridNumber ?>" style="color:white; text-decoration: none">Créer une nouvelle grille</a></button>
        </div>
    </div>
    <main class="container">
        <table class="table">
            <thead>
            <tr>
                <th>Nom de l'entreprise</th>
                <th>Voir la fiche</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($grid->getAllGrid() as $grid) {
                ?>
                <tr>
                    <td><?= $grid['companie_name'] ?></td>
                    <td><a href="./recap_grille.php?id=<?= $grid['id']?>">Voir la grille</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </main>
    </body>
<?php
include("component/footer.php");
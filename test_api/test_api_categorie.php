<?php
$title = "Test api catégorie";
include("component/header.php");
include("config.php");

if (isset($_POST['send'])) {
    // Création de la ressource cURL
    $curl = curl_init();

    // Configuration de l'URL et des options
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_URL => "http://localhost:8890/projet_semaine_transverse/api/category_by_axis_name.php?axis=$_POST[name_axis]", // Remplacer par l'URL de votre API REST
    ]);

    // Exécution de la requête et récupération de la réponse
    $response = curl_exec($curl);

    // Fermeture de la ressource cURL
    curl_close($curl);

    // Traitement de la réponse
    $data = json_decode($response, true);

    // Affichage des données
    foreach ($data as $question) {
        echo $question['category_name'] . '<br>';
    }
}
?>

<form action="" method="POST">
    <div class="form-group row">
        <label for="name_axis" class="col-sm-2 col-form-label">Nom de l'axe:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name_axis" name="name_axis">
        </div>
    </div>
    <br>
    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary" name="send">Envoyer</button>
        </div>
    </div>
</form>
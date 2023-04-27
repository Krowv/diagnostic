<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "diagnostic";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupération des questions depuis la base de données
$sql = "SELECT * FROM questions";
$result = $conn->query($sql);

// Création du tableau des questions
$questions = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $question = array(
            'id' => $row['id'],
            'question_content' => $row['question_content'],
            'id_category' => $row['id_category'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at']
        );

        // Ajout de la question au tableau des questions
        array_push($questions, $question);
    }
}

// Envoi de la réponse au format JSON
header('Content-Type: application/json');
echo json_encode($questions);

// Fermeture de la connexion à la base de données
$conn->close();


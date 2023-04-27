<?php
require("../entity/DatabaseConnexion.php");
require ("../entity/Answers.php");
$answers = new Answers;

$answers_array = [];

if (isset($_GET['category']) && !empty($_GET['category'])){
    foreach ($answers->getAnswerForCategoryName($_GET['category']) as $answers_item) {
        $list_of_this_array = [
            'id' => $answers_item['id'],
            'content_answer' => $answers_item['content_answer'],
            'note' => $answers_item['note'],
            'created_at' => $answers_item['created_at'],
            'updated_at' => $answers_item['updated_at'],
            'id_question' => $answers_item['id_question']
        ];

        array_push($answers_array, $list_of_this_array);
    }

    var_dump($answers_array);
    /*header('Content-Type: application/json');
    echo json_encode($answers_array);*/
}



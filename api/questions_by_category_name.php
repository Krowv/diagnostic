<?php
require("../entity/Database.php");
require ("../entity/Questions.php");
$questions = new Questions;

$questions_array = [];

if (isset($_GET['category']) && !empty($_GET['category'])){
    foreach ($questions->getQuestionsFromCategory($_GET['category']) as $questions_item) {
        $list_of_this_array = [
            'id' => $questions_item['id'],
            'question_content' => $questions_item['question_content'],
            'created_at' => $questions_item['created_at'],
            'updated_at' => $questions_item['updated_at'],
            'id_category' => $questions_item['id_category']
        ];

        array_push($questions_array, $list_of_this_array);
    }

    header('Content-Type: application/json');
    echo json_encode($questions_array);
}



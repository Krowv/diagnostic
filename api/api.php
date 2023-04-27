<?php
require("../entity/DatabaseConnexion.php");
require("../entity/Grid.php");
require("../entity/Axis.php");
require("../entity/Category.php");
require("../entity/Questions.php");
require("../entity/Answers.php");
$grid = new Grid;
$axis = new Axis;
$category = new Category;
$questions = new Questions;
$answer = new Answers;

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['PATH_INFO'] == "/grid") {

    $grid_array = [];

    foreach ($grid->getAllGrid() as $grids) {
        $list_of_this_array = [
            'id' => $grids['id'],
            'grid_number' => $grids['grid_number'],
            'created_at' => $grids['created_at'],
            'updated_at' => $grids['updated_at']
        ];

        array_push($grid_array, $list_of_this_array);
    }

    header('Content-Type: application/json');
    echo json_encode($grid_array);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['PATH_INFO'] == "/axis") {
    $axis_array = [];

    foreach ($axis->getAllAxis() as $axis_item) {
        $list_of_this_array = [
            'id' => $axis_item['id'],
            'axis_name' => $axis_item['axis_name'],
            'created_at' => $axis_item['created_at'],
            'updated_at' => $axis_item['updated_at']
        ];

        array_push($axis_array, $list_of_this_array);
    }
    header('Content-Type: application/json');
    echo json_encode($axis_array);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['PATH_INFO'] == "/questions") {
    $questions_array = [];

    foreach ($questions->getQuestionsFromCategory($_GET['category']) as $questions_item) {
        $list_of_this_array = [
            'id' => $questions_item['id'],
            'axis_name' => $questions_item['question_content'],
            'id_category' => $questions_item['id_category'],
            'created_at' => $questions_item['created_at'],
            'updated_at' => $questions_item['updated_at']
        ];

        array_push($questions_array, $list_of_this_array);
    }
    header('Content-Type: application/json');
    echo json_encode($questions_array);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['PATH_INFO'] == "/answer") {
    $answer_array = [];

    if (isset($_GET['category'])){
        foreach ($answer->getAnswerForCategoryName($_GET['category']) as $answer_item) {
            $list_of_this_array = [
                'id' => $answer_item['id'],
                'content_answer' => $answer_item['content_answer'],
                'note' => $answer_item['note'],
                'created_at' => $answer_item['created_at'],
                'updated_at' => $answer_item['updated_at'],
                'id_question' => $answer_item['id_question']
            ];

            array_push($answer_array, $list_of_this_array);
        }
    }
    header('Content-Type: application/json');
    echo json_encode($answer_array);
}

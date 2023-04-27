<?php
require("../entity/DatabaseConnexion.php");
require ("../entity/Axis.php");
$axis = new Axis;

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


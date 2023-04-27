<?php
require("../entity/Database.php");
require ("../entity/Grid.php");
$grid = new Grid;

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


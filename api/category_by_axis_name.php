<?php
require("../entity/DatabaseConnexion.php");
require ("../entity/Category.php");
$category = new Category;

$category_array = [];

if (isset($_GET['axis']) && !empty($_GET['axis'])){
    foreach ($category->getCategoryByAxisName($_GET['axis']) as $category_item) {
        $list_of_this_array = [
            'id' => $category_item['id'],
            'category_name' => $category_item['category_name'],
            'created_at' => $category_item['created_at'],
            'updated_at' => $category_item['updated_at'],
            'id_axis' => $category_item['id_axis']
        ];

        array_push($category_array, $list_of_this_array);
    }

    header('Content-Type: application/json');
    echo json_encode($category_array);
}



<?php
include "data.php";
include "functions.php";

$category = null;
$tasks_chosen = [];
$counter = 0;
if (isset($_GET["category"])) {
    $category = $_GET["category"];

    if (isset($categories[$category])) {
        if ($category == 0) {                           //если категория "Все"
            $tasks_chosen = $tasks;
        }
        else {
            foreach ($tasks as $task) {
                if ($categories[$category] == $task["cat"]) {
                    array_push($tasks_chosen,$task);
                }
                else {
                    $counter++;
                    if ($counter == count($categories)) {  //если в выбранной категории 0 проектов
                        $tasks_chosen = $tasks;
                    }
                }
            }
        }
    }
}

if (!$category) {
http_response_code (404);
}

$page_content = render_page("templates/index.php", ["tasks" => $tasks, "sct" => $show_complete_tasks]);
$layout_content = render_page("templates/layout.php", ["title" => $title, "categories" => $categories, "content" => $page_content, "tasks" => $tasks]);

echo $layout_content;

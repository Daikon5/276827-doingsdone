<?php
include "data.php";
include "functions.php";

$category = null;
$tasks_chosen = $tasks;
if (isset($_GET["category"])) {
    $category = $_GET["category"];

    if (isset($categories[$category])) {
        foreach ($tasks_chosen as $i => $task) {
            if ($categories[$category] != $task["cat"]) {
                unset($tasks_chosen[$i]);
            }
        }
        if ($categories[$category] == "Все") {
            $tasks_chosen = $tasks;
        }
    }
}

if (!$category) {
http_response_code (404);
}

$page_content = render_page("templates/index.php", ["tasks" => $tasks, "sct" => $show_complete_tasks]);
$layout_content = render_page("templates/layout.php", ["title" => $title, "categories" => $categories, "content" => $page_content, "tasks" => $tasks]);

echo $layout_content;

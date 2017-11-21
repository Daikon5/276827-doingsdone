<?php
include "data.php";
include "functions.php";

$page_content = render_page("templates/index.php", ["tasks" => $tasks, "sct" => $show_complete_tasks]);
$layout_content = render_page("templates/layout.php", ["title" => $title, "categories" => $categories, "content" => $page_content, "tasks" => $tasks]);

echo $layout_content;
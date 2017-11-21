<?
function count_projects ($array, $arg) {
  $count = 0;
  if ($arg == "Все") {
    $count = count($array);
    return $count;
  }
  foreach ($array as $task) {
    if ($task["cat"] == $arg){
      $count++;
    }
  }
  return $count;
}

function render_page ($path,$array) {
  if (file_exists($path)) {
    ob_start();
    extract ($array);
    include $path;
    return ob_get_clean();
  }
  else {
   return " " . "\n";
  }
}
?>

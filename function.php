<?php

// Add task
function add($task,$date) {
  $x=array($task,$date);
  // Initialize
  $tasklist = array();
  // Check if the session variable exist
  if (isset($_SESSION['tasks'])) {
    // Set our array to session variable
    $tasklist = $_SESSION['tasks'];
  }
  // Add our task to our array
  array_push($tasklist, $x);
  // Save our array back to our session
  $_SESSION['tasks'] = $tasklist;
}

// Delete task
function delete($task,$date) {
  $x=array($task,$date);
  // Initialize our list
  $tasklist = $_SESSION['tasks'];
  // Check if the list is set
  if (isset($tasklist)) {
    // Find task in tasklist return position
    $position = array_search($x, $tasklist);
    // If the position is found = > 0
    if ($position >= 0) {
      // delete task
      unset($tasklist[$position]);
    }
    // Save back to session
    $_SESSION['tasks'] = $tasklist;
  }
}

function edit($task,$newtask){
  $tasklist = $_SESSION['tasks'];
  if (isset($tasklist)){
  $position = array_search($task, $tasklist);
  if ($position>=0){
    $tasklist[$position] = $newtask;
  }
  
  $_SESSION['tasks']= $tasklist;
 }

}

?>


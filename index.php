<?php
session_start();

require 'function.php';

 /*echo '$_GET: ';
 print_r($_GET);
 echo '$_POST: ';
print_r($_POST);*/

//print_r($_SESSION['tasks']);
// [0] => array('name' => 'reagan', 'duedate' => '1 Jan 1994')

// check if the delete and task is set in the GET / URL
if (isset($_GET['delete']) && isset($_GET['task'])) {
  // Call delete function with task
  delete($_GET['task'],$_GET['duedate']);
  // session_unset();
}

// check if the form has been submitted
if (isset($_POST['submit'])) {
  // Call add function with task
  add($_POST['task'],$_POST['duedate']);
}


// echo $_GET['task'];

$taskname = '';
if (isset($_GET['task'])) {
  $taskname = $_GET['task'];
} 
?>
​
<!DOCTYPE html>
<html>
<head>
 <title></title>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="todoform">
<form action="index.php" method="POST" class='form' id="form">
    <h1>TODO APP</h1>
<div class="inp">
    <div>
    <label>Add Task:</label> <input type="text" name="task" value="<?php echo  $taskname; ?>">
    </div>
    <div>
    <label>Due Date:</label><input type="date" name="duedate" required>
    </div>
    <div>
    <input type="submit" name="submit" id="submit"/>
    </div>
 </div>
</form>

<ul>
 <?php
 if (isset($_SESSION['tasks'])) {
  echo 'No of tasks: ' . count($_SESSION['tasks']);
  foreach ($_SESSION['tasks'] as $task) {
 ?>
   <li><?php echo $task[0] . "  /  ".$task[1]; ?> <a href="index.php?delete=1&task=<?php echo $task[0]; ?>&duedate=<?php echo $task[1] ?>">delete</a> <a href="index.php?edit=1&task=<?php echo $task[0]; ?>">edit</a></li>
 <?php
  }
 } ?>
</ul>
</body>
</html>









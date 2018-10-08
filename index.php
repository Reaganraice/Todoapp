<?php
session_start();

require 'function.php';

// [0] => array('name' => 'reagan', 'duedate' => '1 Jan 1994')

// check if the delete and task is set in the GET / URL
if (isset($_GET['delete']) && isset($_GET['task'])) {
  // Call delete function with task
  delete($_GET['task']);
}

// check if the form has been submitted
if (isset($_POST['submit'])) {
  // Call add function with task
  add($_POST['task']);
}


//echo $_GET['task'];

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
  <div class="inp">
    <div>

      <label>Add Task:</label> <input type="text" name="task" value="<?php echo  $taskname; ?>">
    </div>
    <div>

      <label>Due Date: </label><input type="date" name="duedate" requied >
    </div>
    <div>

      <input type="submit" name="submit" id="submit"/>
    </div>
  </div>
  <div>
  
    <ul>
     <?php
     if (isset($_SESSION['tasks'])) {
      echo 'No of tasks: ' . count($_SESSION['tasks']);
      foreach ($_SESSION['tasks'] as $task) {
     ?>
       <li><?php echo $task; ?> <a href="index.php?delete=1&task=<?php echo $task; ?>">delete</a> <a href="index.php?edit=0&task=<?php echo $task; ?>">edit</a><a href="<?php echo $date;?>"></a></li>
     <?php
      }
     } ?>
    </ul>
  </div>
</form>
</div>
</body>
</html>






<?php
    require_once '../init.php';
      $id = $_GET['id'];
      $ids = $_GET['ids'];
         
        $sql1 = "UPDATE status SET status = '1' WHERE id = '$id'";
        $query1 = $conn->query($sql1);

?>
<h1>Approval successful</h1>
<button class="btn btn-success btn-lg"><a href="index.php?add=<?=$ids;?>"> click me to go back</a></button>
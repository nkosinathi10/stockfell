<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bootstrap/css/styles.css">
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link src="../bootstrap/css/bootstrap-treeview.min.css">
    <script src="../bootstrap/css/bootstrap-treeview.min.js"></script>
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <title>M.A Investment</title>
</head>
<body>
<?php
$id = $_GET['add'];

  
   require_once '../init.php';
   $sql3 = "SELECT * FROM commission Where id = '$id'";
     $query3 = $conn->query($sql3);
     $user3 = mysqli_fetch_assoc($query3);

?>
<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="#">M.A Investment</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li ><a href="#">Home</a></li>
              <li ><a href="#">R <?=$user3['amount'];?></a></li>
              <li ><a href="#">Stage <?=$user3['stage'];?></a></li>
              <li ><a href="withdraw.php?id=<?=$id?>">Withdraw</a></li>
            <ul class="nav navbar-nav navbar-right">
              
              <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
            </ul>
          </div>
        </div>
      </nav>
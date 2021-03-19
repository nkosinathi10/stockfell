<?php 
$id = $_GET['add'];
   include 'includes/head.php';
  
   require_once 'init.php';
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
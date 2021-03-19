<?php
   require_once '../init.php';
    $id = $_GET['id'];

   $sql3 = "SELECT * FROM commission Where id = '$id'";
   $query3 = $conn->query($sql3);
   $user3 = mysqli_fetch_assoc($query3);
   
   $mydate = date("Y/m/d");

   $amount = $user3['amount'];

    if($amount > 199){
        $amountsql = "UPDATE commission SET amount ='0' WHERE id = '$id'";
        $conn->query($amountsql);
        
        $winsertsql = "INSERT INTO withdrawal (user_id, amount, date) VALUES ('$id','$amount','$mydate')";
        $conn->query($winsertsql);
    }
 
?>

<h1>Withdrawal successful</h1>
<h1>Make sure you have provided correct bank details</h1>
<button class="btn btn-success btn-lg"><a href="index.php?add=<?=$id?>"> click me to go back</a></button>
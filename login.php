<?php 

   include 'includes/head.php';
   require_once 'init.php';
   if(isset($_POST['add'])){
       
           $email = $_POST['email'];
           $pass = $_POST['password'];
           $query = $conn->query("SELECT * FROM user WHERE email = '$email'");
           
       $user = mysqli_fetch_assoc($query);
       $id = $user['id'];
       $userCount = mysqli_num_rows($query);
       
       if(!password_verify($pass,$user['password']))
	   {
		   $errors [] ="wrong password.";
       }
    else{
 if($userCount > 0){
    $checkq = $conn->query("SELECT * FROM progress WHERE id = '$id'");
    $checkData = mysqli_fetch_assoc($checkq);
    
    $checkq1 = $conn->query("SELECT * FROM commission WHERE id = '$id'");
    $checkData1 = mysqli_fetch_assoc($checkq1);
     $nump = $checkData['numP'];
     $nump1 = $checkData1['prvNum'];
    if($nump = 5 ){
        
           if($nump1 < $nump){
           
            $conn->query("UPDATE commission SET amount='200',stage='2',prvNum='$nump' WHERE id = '$id'");

           }
       } 
       else 
       if($nump = 30){
        if($nump1 < $nump){
            $conn->query("UPDATE commission SET amount='500',stage='3',prvNum='$nump' WHERE id = '$id'");
        }
       }
       else 
       if($nump = 156){
        if($nump1 < $nump){
            $conn->query("UPDATE commission SET amount='2500',stage='4',prvNum='$nump' WHERE id = '$id'");
        }
       }
       else 
       if($nump = 3906){
        if($nump1 < $nump){
            $conn->query("UPDATE commission SET amount='40000',stage='5',prvNum='$nump' WHERE id = '$id'");
        }
       }
       else 
       if($nump = 19551){
        if($nump1 < $nump){
            $conn->query("UPDATE commission SET amount='80000',stage='6',prvNum='$nump' WHERE id = '$id'");
        }
       }
     if($user['permission'] == 'admin')
     header('Location:admin/index.php?add='.$id.'');
     else
     header('Location:home.php?add='.$id.'');
    
 }
   }
}
   
?>

<div class="login-card"><img src="img/avatar_2x.png" class="profile-img-card">
        <p class="profile-name-card"> </p>
        <form class="form-signin" action="login.php" method="post"><span class="reauth-email"> </span>
            <input class="form-control" type="email" name="email" required="" placeholder="Email address" autofocus="" id="inputEmail" required>
            
            <input class="form-control" type="password" name="password" required="" placeholder="Password" id="inputPassword" required>
            <input type="hidden" name="add">
            <div class="checkbox">
                <div class="checkbox">
                    <label>
                        
                        <a href="index.php"><span class="glyphicon glyphicon-arrow-left">Back</span></a>
                </div>
            </div>
            <button class="btn btn-primary btn-block btn-lg btn-signin" name="add" type="submit">Sign in</button>
       
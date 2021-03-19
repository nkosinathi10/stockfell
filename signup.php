<?php 
   include 'includes/head.php';
   require_once 'init.php';

   global $num;
   global $data;
  
    if(isset($_POST['add'])){
        
        $name = $_POST['name'];
        $lname = $_POST['lname'];
        $acc = $_POST['account'];
        $bacc = $_POST['bname'];
        $address = $_POST['address'];
        $cell = $_POST['cell'];
        $pass = $_POST['password'];
        $email = $_POST['email'];
        $userID = $_POST['userid'];
        $hashed = password_hash($pass,PASSWORD_DEFAULT);
        

      $query = "INSERT INTO user (name,lname,email,address,password,account,bank,cell) VALUES ('$name','$lname','$email','$address','$hashed','$acc','$bacc','$cell')";
        mysqli_query($conn, $query); 

         
        
        $query8 = $conn->query("SELECT * FROM user WHERE email = '$email'");
            $user8 = mysqli_fetch_assoc($query8);
            $id = $user8['id'];
            $query9 = "INSERT INTO status (id)" 
            ."VALUES ('$id')";
            mysqli_query($conn, $query9);

            $query10 = "INSERT INTO commission (id,amount,stage,prvNum)" 
            ."VALUES ('$id','0','1','0')";
            mysqli_query($conn, $query10);

        if($userID !== null){
            
            $query6 = "INSERT INTO descendants(id, name, lname, email)" 
            ."VALUES ('$userID','$name','$lname','$email')";
            mysqli_query($conn, $query6); 



            $query12 = "SELECT * FROM progress WHERE user_id ='$userID'";
               $qresult  =  mysqli_query($conn, $query12); 
               $rows = mysqli_num_rows($qresult);
               $data = mysqli_fetch_assoc($qresult);
            if($rows>0)
            {
               $numP = $data['numP'];
               
               $numP++;
               
               $query10 = "UPDATE progress SET numP='$numP' WHERE user_id = '$userID'";
               mysqli_query($conn, $query10);
               
               $numpudate = "SELECT * FROM mydesc WHERE id = '$userID'";
               $datareturn=mysqli_query($conn, $numpudate);
               $num = mysqli_num_rows($datareturn);
               $data = mysqli_fetch_assoc($datareturn);
               $parentID = $data['parent_id'];
               while($num > 0){
                
                
                

                $query12 = "SELECT * FROM progress WHERE user_id ='$parentID'";
               $qresult  =  mysqli_query($conn, $query12); 
               
               $data = mysqli_fetch_assoc($qresult);

               $numP = $data['numP'];
               
               $numP++;


               $return = mysqli_fetch_assoc($datareturn);
               
               $query15 = "UPDATE progress SET numP='$numP' WHERE user_id = '$parentID'";
               mysqli_query($conn, $query15);

               $numpudate = "SELECT * FROM mydesc WHERE id = '$parentID'";
               $datareturn=mysqli_query($conn, $numpudate);
               $num = mysqli_num_rows($datareturn);
               $data = mysqli_fetch_assoc($datareturn);
               $parentID = $data['parent_id'];
               }
            

            }
            else
            {
                $query11 = "INSERT INTO progress (user_id, numP) VALUES ('$userID','1')";
                mysqli_query($conn, $query11);
            }


            
            if($userCount8 > 0){
                $query7 = "INSERT INTO mydesc (id,name,parent_id)" 
                ."VALUES ('$id','$name','$userID')";
                mysqli_query($conn, $query7); 
                $query11 = "INSERT INTO progress (user_id, numP) VALUES ('$userID','1')";
                mysqli_query($conn, $query11);
            }

            
            
        }
        else{
            $userID = 0;

            $query7 = "INSERT INTO mydesc (id,name,parent_id)" 
                ."VALUES ('$id','$name','$userID')";
                mysqli_query($conn, $query7); 
                
                $query11 = "INSERT INTO progress (user_id, numP) VALUES ('$userID','1')";
                mysqli_query($conn, $query11);
        }
        header('Location:home.php?add='.$id.'');
    }
     
    //-------------------------------------------------------------------
             
    


    //-------------------------------------------------------------------

?>

<div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal custom-form" method="post">
                <p></p>
                <h1>Register Form</h1>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Name </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="name" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="lname-input-field">Last Name </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="lname" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Master User ID </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="userid" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="account-input-field">Account Number </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="account" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="bname-input-field">Bank Name </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="bname" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="address-input-field">Address </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="address" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="email-input-field">Email </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="cell-input-field">cell Number </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="cell" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="password-input-field">Password </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="password" name="password" required>
                    </div>
                </div>
                <a href="index.php"><span class="glyphicon glyphicon-arrow-left">Back</span></a>
                <button class="btn btn-default submit-button" name="add" type="submit">Submit Form</button>
            </form>
        </div>
    </div>
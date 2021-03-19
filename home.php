<?php 
   
   include 'includes/nav.php';
   require_once 'init.php';


  

   if(isset($_POST['btnfeed'])){
   $id = $_GET['add'];
      $feed = $_POST['feed'];
      $sql4 = "INSERT INTO feedback (id, message) VALUES ('$id','$feed')";
      $query4 = $conn->query($sql4);
   }
   global $id5;
    $id5 = $_GET['add'];
     $sql5 = "SELECT * FROM user Where id = '$id5'";
     $query5 = $conn->query($sql5);
     $user5 = mysqli_fetch_assoc($query5);
     

?>
<div class="container">
<div class="row">
<div class="col-md-6">
   <div class="space" style="padding-top:80px;"></div>
   
    <h4 class="heading">User Name : <?=$user5['name'];?></h4>
    <h4 class="heading">User ID : <?=$user5['id'];?></h4>
    <h4>Members Under Me</h4>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Lastname</th>
        <th>Email</th>
        
      </tr>
    </thead>
    
    <tbody>
   
    <?php
    global $id;
    $id = $_GET['add'];
     $sql2 = "SELECT * FROM descendants Where id = '$id'";
     $query2 = $conn->query($sql2);
     $numRec = mysqli_num_rows($query2);
    
  while($user2 = mysqli_fetch_assoc($query2)):
    
    ?>
        <tr>
          <td><?= $user2['name'];?></td>
          <td><?= $user2['lname'];?></td>
          <td><?= $user2['email'];?></td>
        
        </tr>
        <?php
           endwhile;
        ?>
        
    </tbody>
    </table>
    </div>
    <form class="example" action="action_page.php">
  <input type="text" placeholder="Search.." name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
    <br /><br />
  <div class="container">
   <h2 align="center">Organisation members progress</h2>
   <br /><br />
   <div id="treeview"></div>
  </div>
    <div class="col-md-6">
       <form action="home.php?add=<?=$id;?>" method="post">
          <div class="space" style="padding-top:80px;"></div>
             <label for="feed">Feedback / Suggestion</label><br>

              <textarea id="feed" name="feed" rows="4" cols="50"></textarea>
              <br>
      
           <button name="btnfeed"class="btn btn-success">Send Feedback</button>
    </form>
    </div>
    </div>

</div>

 </body>
</html>

<script>
$(document).ready(function(){
 $.ajax({ 
   url: "fetch.php",
   method:"POST",
   dataType: "json",       
   success: function(data)  
   {
      
      $('#treeview').treeview({data: data});
      
   }   
 });
 
});




</script>

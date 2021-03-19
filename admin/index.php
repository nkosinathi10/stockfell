<?php
    include 'includes/nav.php';
    require_once '../init.php';
    $id = $_GET['add'];
    $sql9 = "SELECT * FROM user Where id = '$id'";
    $query9 = $conn->query($sql9);
    $user9 = mysqli_fetch_assoc($query9);
    
?>
<div class="container">
<div class="space" style="padding-top:80px;"></div>
     <div class="row">
           <div class="col-md-6">
           
    <h4 class="heading">User Name : <?=$user9['name'];?></h4>
    <h4 class="heading">User ID : <?=$user9['id'];?></h4>
    <h4>Members Under Me</h4>
    
    <table class="table table-striped" style="background-color:lightgray;">
    <thead>
      <tr>
        <th>Name</th>
        <th>Lastname</th>
        <th>Email</th>
        
      </tr>
    </thead>
    <tbody>
    <?php
   
   $sql2 = "SELECT * FROM descendants Where id = '$id'";
   $query2 = $conn->query($sql2);

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
    <div class="col-md-6">

                <h1>Members with pending approval</h1>
                
              <table class="table table-striped " >
              <thead>
     <tr>
        <th>Name</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>

    <?php 
           $sql = "SELECT * FROM user INNER JOIN status ON user.id = status.id and status = 0";
           $query = $conn->query($sql);
              

        while($user = mysqli_fetch_assoc($query)):
        
    ?>  
   
    
        <tr>
          <td><?= $user['name'];?></td>
          <td><?= $user['lname'];?></td>
          <td><?= $user['email'];?></td>
          
          <td><a href="approve.php?id=<?=$user['id'];?>&ids=<?=$id;?>" name="add" data-id="<?=$user['id'];?>">approve<span class="glyphicon glyphicon-ok"></span></a></td>
        </tr>
        <?php
            endwhile;
                ?>
       
    </tbody>
    </table>
           </div>
           <div class="col-md-6">
    <h2>Withdrawal Request</h2>
    <table class="table table-striped" style="background-color:lightblue;">
    <thead>
      <tr>
        <th>Name & Lastname</th>
        <th>Bank Details</th>
        <th>Cell number</th>
        <th>Amount</th>
        <th>Date</th>
        <th>ID</th>
        <th>payed</th>
      </tr>
    </thead>
    <tbody>
    <?php
       $sql = "SELECT * FROM user INNER JOIN withdrawal ON user.id = withdrawal.user_id where payed = 0";
       $query = $conn->query($sql);

       $sql13 = "SELECT * FROM withdrawal where payed = 0";
       $query13 = $conn->query($sql13);
       while($userdata = mysqli_fetch_assoc($query)):
    ?>
        <tr>
          <td><?=$userdata['name'];?> - <?=$userdata['lname'];?></td>
          <td><?=$userdata['bank'];?> - Account - <?=$userdata['account'];?></td>
          <td><?=$userdata['cell'];?></td>
          <?php
             $sql13 = "SELECT * FROM withdrawal ";
             $query13 = $conn->query($sql13);
             while($userdata13 = mysqli_fetch_assoc($query13)):
          ?>
          <td><?=$userdata13['amount'];?></td>
          <td><?=$userdata13['date'];?></td>
          <td><?=$userdata13['user_id'];?></td>
          <td><a href="payed.php?id=<?=$userdata13['user_id'];?>&ids=<?=$id;?>" name="add" data-id="<?=$user['id'];?>">payed<span class="glyphicon glyphicon-ok"></span></a></td>
          <?php
       endwhile;
      ?>    
        </tr>
      <?php
       endwhile;
      ?>
    </tbody>
    </table>
           </div>
		   <div class="col-md-6">
		       <br /><br />
  <div class="container">
   <h2 align="center">Organisation members progress</h2>
   <br /><br />
   <div id="treeview"></div>
  </div>
  <form action="home.php?add=<?=$id;?>" method="post">
          <div class="space" style="padding-top:80px;"></div>
             <label for="feed">Feedback / Suggestion</label><br>

              <textarea id="feed" name="feed" rows="4" cols="50">
                <?php
                    $sql14 = "SELECT * FROM feedback";
                    $query14 = $conn->query($sql14);
                    while($userdata14 = mysqli_fetch_assoc($query14)):
                ?>
               ID : <?=$userdata14['id'];?> Message : <?=$userdata14['message'];?>
              <?php
                    endwhile;
                ?>
              </textarea>
              <br>
      
           
    </form>
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
		   </div>
     </div>

</div>

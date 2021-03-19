<?php 
  function login($user_id){
    $_SESSION['SBuser'] = $user_id;
    if(!password_verify($pass,$user['password']))
	   {
		   $errors [] ="wrong password.";
       }
    else{
 if($userCount > 0){
   
    
     if($user['permission'] == 'admin')
     header('Location:admin/index.php?add='.$id.'');
     else
     header('Location:home.php?add='.$id.'');
    
 }
   }
	
}
function is_logged_in()
{
	if(isset($_SESSION['SBuser']) && $_SESSION['SBuser'] > 0)
	{
		return true;
	}
	else 
		return true;
}
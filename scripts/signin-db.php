<?php
 
if(isset($_POST["Submit"]))
{
   require "database.php";

   $email    = $_POST["email"];
   $password = $_POST["password"];
   $password = password_hash($password,PASSWORD_DEFAULT);

   if(empty($email) || empty($password))
   {
   	header("Location:signin.php?error=emptyfields");
	   exit();
   }
   else 
   {
   	$sql = "SELECT * FROM users WHERE email = ?";
   	$stmt = mysqli_stmt_init($conn);
   	if(!mysqli_stmt_prepare($stmt,$sql))
   	{
   		header("Location:signin.php?error=sqlerror");
	    exit();
   	}




      
   	else 
   	{

   		mysqli_stmt_bind_param($stmt,"s",$email);
   		mysqli_stmt_execute($stmt);
   		$result = mysqli_stmt_get_result($stmt);

   		//CheckPass
        

   		
   		if($row = mysqli_fetch_assoc($result))
   		{
           $passCheck = password_verify($password,$row["password"]);
   			
   			if ($passCheck == false)
   			{
               header("Location:signin.php?error=WrongPass");
               exit();
   	   	}
   			elseif ($passCheck == true)
   			{
   				session_start();
               $_SESSION["sessionID"] = $row["user_id"];
               $_SESSION["sessionEmail"] = $row["email"];
               header("Location:signin.php?success=loggedin");
               
               exit();
   			}
            else 
            {
                header("Location:signin.php?error=WrongPass");
               exit();
   
            }
            
            
   		}
         
         
         
        

  
  		else
   		{
   			header("Location:signin.php?error=nouser");
	        exit();
   		}

         
      }  
   	

   }
}


else
{
	header("Location:signin.php?error=accessforbidden");
	exit();
}











?>
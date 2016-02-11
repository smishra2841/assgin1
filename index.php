
<?php include 'dbconnect.php' ?>
<?php
   ob_start();
   session_start();
?>

<html>
   
   <head>
      <title>Tutorialspoint.com</title>
      
      
   </head>
	
   <body>
      
      <h2>Enter Username and Password</h2> 
      <div>
         
         <?php
         ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password']))
                {
                    $username1 = $_POST['username'];
                    $password1 = $_POST['password'];





                    $sql= "SELECT * FROM users WHERE username='$username1' AND password='$password1'";
                    if($query_run = mysqli_query($conn, $sql))
                    {
                          $query_num_rows = mysqli_num_rows($query_run);
                          $stmt =mysqli_prepare($conn, $sql);
                           mysqli_stmt_execute($stmt);
                           mysqli_stmt_store_result($stmt);
                          
                          if($query_num_rows==1)
                          {
                                $row = mysqli_fetch_assoc($query_run);
                                $user_id =  $row['id'];
                                $name=$row['name'];
                                $_SESSION['valid'] = true;
                                $_SESSION['timeout'] = time();
                                $_SESSION['userid'] = $user_id;
                                $_SESSION['name'] = $name;
                                header("Location:calander2.php");

                                  echo 'logedd in';
                           }
				
               }
               else 
               {
                  $msg = 'Wrong username or password';
               }
            }
         ?>
      </div> <!-- /container -->
      
      <div>
      
         <form method = "post">
            <h4 ><?php echo $msg; ?></h4>
            <input type = "text" name = "username" placeholder = "username......." 
               required autofocus></br>
            <input type = "password" name = "password" placeholder = "password......" required>
            <button type = "submit" name = "login">Login</button>
         </form>
			
         Click here to <a href = "logout.php" tite = "Logout"><u>logout</u>.
         
      </div> 
      
   </body>
</html>
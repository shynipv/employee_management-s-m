<?php
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = 'root';
  $db = mysqli_connect('localhost', 'root', 'root', 'myDB');
  $error="";

   if($_SERVER["REQUEST_METHOD"] == "POST")
   {

      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT * FROM admin WHERE username ='$username' and password ='$password'";
      $retval = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($retval);

      $row = mysqli_fetch_array($retval,MYSQLI_ASSOC);

      if($count == 1)
      {
         header("location:show.php");
      }
      else
      {/*
         echo "{$row['username']}<br/>";
         echo "{$row['passcode']}<br/>";*/
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>

   <head>
      <title>Login Page</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">


      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>

   </head>

   <body bgcolor = "#F0F0F0">
	<iframe src="header.html" style="border:2px solid black;" height="160" width="100% "></iframe>

      <div align = "center" style="margin-top:50px">
         <h1>Administrator Login</h1>
         <div style = "margin: 20px; width:450px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:10px;"><b>Login</b></div>

            <div style = "margin:40px">

               <form action = "" method = "POST">
                  <label>Username </label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password </label><input type = "password" name = "password" class = "box" /><br/><br />

                  <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit</button></td>
               </form>

               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

            </div>

         </div>

      </div>

   </body>
</html>

<?php
include "db.php";
if(!isset($_SESSION)) 
    session_start();

if (isset($_SESSION['user_id'])){
  header("location: index.php");
}

$msg = "";
if(isset($_POST['login']))
{
  $email = $_POST['email'];
  $password = $_POST['password'];

  $user = mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '$email' and `password` = '$password'");
  $user = mysqli_fetch_assoc($user);
  if(isset($user['id']))
  {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        header("location: index.php");
  }
  else
  {
    $msg = "Invalid Email or Password";
  }
}
?>
<html>
<head>
<title>HOD Login</title>
      <link rel="stylesheet" type="text/css" href="style1.css">
<head position: relative>
    <section class="bck">
    <img src=https://img.techpowerup.org/201118/logo535.jpg style="border-radius: 50%;"> 
    <span class="tle">
      <h1>B.M.S. College of Engineering </h1>
    </span>
    <span class="tle2">
      <pre style="font-family: Kumbh Sans, sans-serif"> 
      
        (Affiliated to VTU, Belgaum)</pre>
    </span>
  </section>
  </head>
<body>
  <div class="bg">
      <div class="loginbox">
      <img src="avatar.jpeg" class="avatar">
        <h1 id="tt">PROFESSOR LOGIN</h1>
          <form name="form1" action="" method="POST">
            <p>E-mail ID</p>
            <input id="email" name="email" type="text" placeholder="Enter E-mail ID" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="submit" class="sub" name="login" value="Login"
              style= "display: block;
                      width: 90%;
                      margin: 15px 0 0 5%;
                      font-size: 16px;
                      height: 40px;
                      background-color: #084679;
                      border: 1px solid rgb(17, 67, 107);
                      color: #fff;
                      border-radius:10px;"    
            ><br>
            <a href="signup.php">Don't have an account?</a>
          </form>
        <?php
          if($msg != "")
          {
        ?>
        <label id="lbltxt" style="color: red; margin-left: auto"><?php echo $msg ?></label>
        <?php } ?>
      </div>
   </div>
</body>
</head>
</html>
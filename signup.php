<html>
<head>
<title>SIGNUP</title>
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
     <div class="loginbox">
     <img src="avatar.jpeg" class="avatar">
        <h1 id="tt">HOD Login</h1>
        <form name="signup" action="signup-check.php" method="post">
            <p>Enter your email</p>
            <input id="email" name="email" type="text" placeholder="Enter E-mail ID" required>
            <p>Enter your new Password</p>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="submit" name="login" value="Login">
         </form>
         <?php
         if($msg != "")
         {
         ?>
         <label id="lbltxt" style="color: red; margin-left: auto"><?php echo $msg ?></label>
         <?php } ?>
     </div>
</body>
</head>
</html>
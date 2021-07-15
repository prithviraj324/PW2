<?php
include "db.php";

if(!isset($_SESSION)) 
    session_start();

if (!isset($_SESSION['user_id'])){
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html style="margin:0; padding:0;">
  <title>Home page</title>
  <link rel="stylesheet" href="styles2.css">
  <head position: relative>
    <section class="bck">
    <img src=https://img.techpowerup.org/201118/logo535.jpg> 
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
        <div class="layer">
        <div class="dropdown">
          <button class="dropbtn">Logged in as: <?php echo $_SESSION['email']; ?> </button>
          <div class="dropdown-content">
            <a style="color:black; text-decoration: none;" href="page0.html">Change account</a>
            <a style="color:black; text-decoration: none;" href="logout.php">Log out</a>
          </div>
        </div>
        <pre>



        </pre>
        <div>
        <img style="width:150px; margin-right: 50px; float: right;" src="https://img.techpowerup.org/201117/img-avatar.png" alt="Avatar" style="width:150px">
        <table id="t1">
          <tr><th style="font-size: 2.0rem" class="list_item">Notifications</th></tr>
          <tr class="list_item"><td><ul>
            <li class="list_item">HOD's can now view forms</li>
            <li class="list_item">Added Hod login with new functionalities</li>
            <li class="list_item">Added Faculty login for form submissions</li>
            <li class="list_item">Linked all the webpages</li>
            <li class="list_item">Fixed small bugs</li>
          </ul></td></tr>
        </table>
        <pre>



        </pre>
        <table id="t2">
          <tr class="list_item">
            <th>FORM</th>
            <th>SUBMISSIONS</th>
            <th>HELP</th>
          </tr>
          <tr class="list_item">
            <td><ul>
              <li class="listitem"><a href="form1.php">Add Form</a></li>
              <li class="listitem"><a href="form1.php">Edit Form</a></li>
              <li class="listitem"><a href="#">Delete Form</a></li>
              <li class="listitem"><a href="proctor.php">Student-Proctor Information</a></li>
            </ul></td>
            <td style="width: 430px;">Cannot view other colleagues' forms</td>
            <td><ul>
              <li class="listitem"><a href="#">Contact Us</a></li>
              <li class="listitem"><a href="#">About</a></li>
            </ul></td>
            </tr>
        </table>
        </div>
    </div>
      </div>      
  </body>
</html> 
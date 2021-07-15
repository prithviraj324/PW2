<?php
include "db.php";

if(!isset($_SESSION)) 
    session_start();

if (!isset($_SESSION['user_id'])){
  header("location: login.php");
}
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'appraisal';
    $conn = mysqli_connect($host,$user,$pass,$db);
    if(!isset($conn)) {
        echo '<p>Conn failed</p>';
    }
    else {
    if(isset($_POST['save'])) {
        $usn=$_POST['usn'];
        $name=$_POST['name'];
        $sem=$_POST['sem'];
        $email=$_POST['email'];
        $ap=$_POST['ap'];
        $query="INSERT INTO stud_proc (id,stud_name,sem,email,usn,ac_points) VALUES ('$user_id','$name','$sem','$email','$usn','$ap')";
        $result=mysqli_query($conn,$query);
        if(!$result) {
            echo '<p>did not insert</p>'.mysqli_errno($conn).mysqli_error($conn);
        }
        else {
            echo '<script type="text/javascript"> alert("Inserted"); </script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Student Details</title>
        <link href="proctor.css" rel="stylesheet">
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
    <div class="warpper fl">
        <h2 style="margin-left: 38%; font-weight: bold;">Proctor Student Details</h2>
        <div class="main">
            <div class="head"><p>BMSCE</p></div><br>
            <div class="form fl" style="height:00px;">
                <form action="" method="POST">
                    <div style="margin-left:30px; margin-right:30px;">
                        <div>
                            <b>USN:</b><input style="width: 300px; height: 30px; display:block;" name="usn"  placeholder="" class="name-inp">
                        </div><br>
                        <div>
                            <b>Name:</b><input style="width: 300px; height: 30px; display:block;" name="name"  placeholder="" class="name-inp">
                        </div><br>
                        <div>
                            <b>Semester:</b><input style="width: 300px; height: 30px; display:block;" name="sem"  placeholder="" class="name-inp">
                        </div><br>
                        <div>
                            <b>E-mail:</b><input style="width: 300px; height: 30px; display:block;" name="email"  placeholder="" class="name-inp">
                        </div><br>
                        <div>
                            <b>Activity Points:</b><input style="width: 300px; height: 30px; display:block;" name="ap"  placeholder="" class="name-inp">
                        </div>
                        <div style="text-align:center;">
                        <input type="submit" name="save" value="ADD" class="sub" style="width: 100px;">
                        </div>
                    </div>
                </form><br>
                    <table class="center" id="display">
                        <tr>
                            <th>USN</th>
                            <th>NAME</th>
                            <th>SEMESTER</th>
                            <th>E-MAIL</th>
                            <th>ACTIVITY POINTS</th>
                        </tr>
                <?php
                    if(!isset($conn)) {
                        echo '<p>Conn fail<\p>'.mysqli_errno($conn).mysqli_error($conn);
                    }
                    else {
                        $selectQ="SELECT * FROM stud_proc where id='user_id'";
                        if(!($selectRes=mysqli_query($conn,$selectQ))) {
                            echo '<script type="text/javascript"> alert("Retrieval failed"); </script>';
                        }
                        else{
                            if(mysqli_num_rows($selectRes)==0) {
                                echo '<p>No students being proctored</p>';
                            }
                            else {
                                while($row = mysqli_fetch_assoc($selectRes)) {
                                    echo '<tr>';
                                    echo '<td><p style="height: 50px;" type="text" name="fg" placeholder="" class="name-inp">'.$row["usn"].'</p></td>';
                                    echo '<td><p style="height: 50px;" type="text" name="fg" placeholder="" class="name-inp">'.$row["stud_name"].'</p></td>';
                                    echo '<td><p style="height: 50px;" type="text" name="fg" placeholder="" class="name-inp">'.$row["sem"].'</p></td>';
                                    echo '<td><p style="height: 50px;" type="text" name="fg" placeholder="" class="name-inp">'.$row["email"].'</p></td>';
                                    echo '<td><p style="height: 50px;" type="text" name="fg" placeholder="" class="name-inp">'.$row["ac_points"].'</p></td>';
                                    echo '</tr>';
                                }
                            }
                        }
                    }
                ?>
                    </table><br>
                    <div style="text-align:center">
                    <input type="button" id="sb" name="back" value="BACK" class="sub" style="width: 100px;" onclick="index.php">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
include "db.php";
if(!isset($_GET['faculty_id']))
{
  header("location: form1.php");
}

if(isset($_POST['save']))
{
  $faculty_id = $_GET['faculty_id'];
  $department_level = $_POST['department_level'];
  $institute_level = $_POST['institute_level'];
  $awards_honours_patents = $_POST['awards_honours_patents'];
  $other_contributions = $_POST['other_contributions'];
  $future_goals = $_POST['future_goals'];
  $other_comments = $_POST['other_comments'];

  mysqli_query($conn, "INSERT INTO `achievement`(`faculty_id`, `department_level`, `institute_level`, `awards_honours_patents`, 
                        `other_contributions`, `future_goals`, `other_comments`) VALUES ('$faculty_id', '$department_level', 
                        '$institute_level', '$awards_honours_patents', '$other_contributions', '$future_goals', '$other_comments')");

  echo "<font color='gred'> Process Complete </font>";
  header("location: form1.php");
  return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Form-page3</title>
    <link href="Form-page3.css" rel="stylesheet">
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
        <div class="main">
            <div class="head"><p>BMSCE</p></div>
            <div class="form fl">
                <form action="" method="POST">
                    <p class="name">DEPARTMENT LEVEL :</p>
                    <p><input type="text" name="department_level" placeholder="" class="name-inp"></p>
                    <p class="name">INSTITUTE LEVEL :</p>
                    <p><input type="text" name="institute_level" placeholder="" class="name-inp"></P>
                    <p class="name">AWARDS/HONOURS/PATENTS :</p>
                    <p><input type="text" name="awards_honours_patents" placeholder="" class="name-inp"></p>
                    <p class="name">ANY OTHER INFORMATION/CONTRIBUTUION :</P>
                    <p><input type="text" name="other_contributions" placeholder="" class="name-inp"></p>
                    <p class="name">FUTURE GOALS :</P>
                    <p><input type="text" name="future_goals" placeholder="" class="name-inp"></p>
                    <p class="name">ANY OTHER COMMENTS (IF ANY) :</p>
                    <p>
                    <input type="text" input style=height:80px name="other_comments" placeholder="comments" class="name-inp">
                    </p>
                    <pre>

                    </pre>
                    <input type="submit" name="save" value="SAVE" class="sub">
                </form>
            </div>
          </div>
          </div>
          </div>
</body>
</html>

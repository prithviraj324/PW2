<?php
include "db.php";

if(!isset($_SESSION)) 
    session_start();

if (!isset($_SESSION['user_id'])){
  header("location: login.php");
}

if(!isset($_GET['faculty_id']))
{
  header("location: form1.php");
}

$faculty_id = $_GET['faculty_id'];

if(isset($_POST['save']))
{
  $faculty_id = $_GET['faculty_id'];
  $department_level = $_POST['department_level'];
  $institute_level = $_POST['institute_level'];
  $awards_honours_patents = $_POST['awards_honours_patents'];
  $other_contributions = $_POST['other_contributions'];
  $future_goals = $_POST['future_goals'];
  $other_comments = $_POST['other_comments'];


  $achiev_id = $_POST['achiev_id'];
  if($achiev_id)
  {
    mysqli_query($conn, "UPDATE `achievement` SET `department_level`='$department_level',`institute_level`='$institute_level',
                        `awards_honours_patents`='$awards_honours_patents',`other_contributions`='$other_contributions',`future_goals`='$future_goals',
                        `other_comments`='$other_comments' WHERE id='$achiev_id'");
  }
  else
  {
    mysqli_query($conn, "INSERT INTO `achievement`(`faculty_id`, `department_level`, `institute_level`, `awards_honours_patents`, 
                        `other_contributions`, `future_goals`, `other_comments`) VALUES ('$faculty_id', '$department_level', 
                        '$institute_level', '$awards_honours_patents', '$other_contributions', '$future_goals', '$other_comments')");
  }

  echo "<font color='gred'> Process Complete </font>";
  header("location: index.php");
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
                    <?php
                    $achiev = mysqli_query($conn, "SELECT * FROM `achievement` WHERE `faculty_id` = '$faculty_id'");
                    $achiev = mysqli_fetch_assoc($achiev);                    
                    ?>
                    <input type="hidden" name="achiev_id" value="<?php echo isset($achiev['id']) ? $achiev['id'] : "" ?>">

                    <p class="name">DEPARTMENT LEVEL :</p>
                    <p><input type="text" name="department_level" value="<?php echo isset($achiev['department_level']) ? $achiev['department_level'] : "" ?>" placeholder="" class="name-inp"></p>
                    <p class="name">INSTITUTE LEVEL :</p>
                    <p><input type="text" name="institute_level" value="<?php echo isset($achiev['institute_level']) ? $achiev['institute_level'] : "" ?>" placeholder="" class="name-inp"></P>
                    <p class="name">AWARDS/HONOURS/PATENTS :</p>
                    <p><input type="text" name="awards_honours_patents" value="<?php echo isset($achiev['awards_honours_patents']) ? $achiev['awards_honours_patents'] : "" ?>" placeholder="" class="name-inp"></p>
                    <p class="name">ANY OTHER INFORMATION/CONTRIBUTUION :</P>
                    <p><input type="text" name="other_contributions" value="<?php echo isset($achiev['other_contributions']) ? $achiev['other_contributions'] : "" ?>" placeholder="" class="name-inp"></p>
                    <p class="name">FUTURE GOALS :</P>
                    <p><input type="text" name="future_goals" value="<?php echo isset($achiev['future_goals']) ? $achiev['future_goals'] : "" ?>" placeholder="" class="name-inp"></p>
                    <p class="name">ANY OTHER COMMENTS (IF ANY) :</p>
                    <p>
                    <input type="text" input style=height:80px name="other_comments" value="<?php echo isset($achiev['other_comments']) ? $achiev['other_comments'] : "" ?>" placeholder="comments" class="name-inp">
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

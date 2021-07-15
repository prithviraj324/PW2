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
  $event = $_POST['event'];
  $level = $_POST['level'];

  mysqli_query($conn, "DELETE FROM `event` WHERE `faculty_id` = '$faculty_id'");

  $i = -1;
  foreach($event as $ev)
  {
    $i++;
    mysqli_query($conn, "INSERT INTO `event`(`faculty_id`, `event`, `level`) 
                        VALUES ('$faculty_id', '$event[$i]', '$level[$i]')");
  }


  $papers_presented = $_POST['papers_presented'];
  $expert_lectures = $_POST['expert_lectures'];
  $pg_exam = $_POST['pg_exam'];
  $pl_id = $_POST['pl_id'];

  if($pl_id)
  {
    mysqli_query($conn, "UPDATE `paper_lecture` SET `papers_presented`='$papers_presented',`expert_lectures`='$expert_lectures',`pg_exam`='$pg_exam' WHERE id = '$pl_id'");
  }
  else
  { 
    mysqli_query($conn, "INSERT INTO `paper_lecture`(`faculty_id`, `papers_presented`, `expert_lectures`, `pg_exam`) 
                      VALUES ('$faculty_id', '$papers_presented', '$expert_lectures', '$pg_exam')");
  }
  
  header("location: form3.php?faculty_id=$faculty_id");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Form-page2</title>
    <link href="Form-page2.css" rel="stylesheet">
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
                    <p class="name">TRAINING PROGRAMS/SUMMER OR WINTER SCHOOLS/EXPERT LECTURES AT BMSCE PARTICIPATED/ORGANISED :</p>
                    <?php
                    $events = mysqli_query($conn, "SELECT * FROM `event` WHERE `faculty_id` = '$faculty_id' and `level` = 'BMSCE'");
                    $event = mysqli_fetch_assoc($events);                    
                    ?>

                    <input type="hidden" name="level[]" value="BMSCE">
                    <input type="hidden" name="level[]" value="BMSCE">
                    <input type="hidden" name="level[]" value="BMSCE">
                    <p><pre> 1. <input type="text" name="event[]" placeholder="" value="<?php echo isset($event['event']) ? $event['event'] : "" ?>" class="name-inp"></p></pre>
                    <?php
                    $event = mysqli_fetch_assoc($events);
                    ?>
                    <p><pre> 2. <input type="text" name="event[]" placeholder="" value="<?php echo isset($event['event']) ? $event['event'] : "" ?>" class="name-inp"></p></pre>
                    <?php
                    $event = mysqli_fetch_assoc($events);
                    ?>
                    <p><pre> 3. <input type="text" name="event[]" placeholder="" value="<?php echo isset($event['event']) ? $event['event'] : "" ?>" class="name-inp"></p></pre>
                    <p class="name">AT OTHER INSTITUTES PARTICIPATED/ORGANISED :</p>
                    <?php
                    $events = mysqli_query($conn, "SELECT * FROM `event` WHERE `faculty_id` = '$faculty_id' and `level` = 'Other Institutes'");
                    $event = mysqli_fetch_assoc($events);                    
                    ?>
                    <input type="hidden" name="level[]" value="Other Institutes">
                    <input type="hidden" name="level[]" value="Other Institutes">
                    <input type="hidden" name="level[]" value="Other Institutes">
                    <p><pre> 1. <input type="text" name="event[]" value="<?php echo isset($event['event']) ? $event['event'] : "" ?>" placeholder="" class="name-inp"></P></pre>
                    <?php
                    $event = mysqli_fetch_assoc($events);
                    ?>
                    <p><pre> 2. <input type="text" name="event[]" value="<?php echo isset($event['event']) ? $event['event'] : "" ?>" placeholder="" class="name-inp"></P></pre>
                    <?php
                    $event = mysqli_fetch_assoc($events);
                    ?>
                    <p><pre> 3. <input type="text" name="event[]" value="<?php echo isset($event['event']) ? $event['event'] : "" ?>" placeholder="" class="name-inp"></P></pre>
                    <p class="name">PRESENTATION OF PAPERS/EXPERT LECTURES :</p>
                    <p class="name"></p>
                    <?php
                    $pl = mysqli_query($conn, "SELECT * FROM `paper_lecture` WHERE `faculty_id` = '$faculty_id'");
                    $pl = mysqli_fetch_assoc($pl);                    
                    ?>
                    <input type="hidden" name="pl_id" value="<?php echo isset($pl['id']) ? $pl['id'] : "" ?>">
                    <p class="name">PAPERS PRESENTED :</p>
                    <p><pre>    <input type="text" name="papers_presented" value="<?php echo isset($pl['papers_presented']) ? $pl['papers_presented'] : "" ?>" placeholder="" class="name-inp"></p></pre>
                    <p class="name"></p>
                    <p class="name">EXPERT LECTURES :</p>
                    <p><pre>    <input type="text" name="expert_lectures" value="<?php echo isset($pl['expert_lectures']) ? $pl['expert_lectures'] : "" ?>" placeholder="" class="name-inp"></p></pre>
                    <p class="name"></p>
                    <p class="name">PG RESEARCH EXAMINERSHIP :</p>
                    <p><pre>    <input type="text" name="pg_exam" placeholder="" value="<?php echo isset($pl['pg_exam']) ? $pl['pg_exam'] : "" ?>" class="name-inp"></p></pre>
                    <p class="name"></p>
                    <p class="name"></p>
                    <p class="name">ORGANISING DEPT LEVEL/INSTITUTE LEVEL EVENTS:</P>
                    <p class="name"><pre>       DEPARTMENT LEVEL :                  INSTITUTE LEVEL : </p></pre>

                    <?php
                    $dls = mysqli_query($conn, "SELECT * FROM `event` WHERE `faculty_id` = '$faculty_id' and `level` = 'Department Level'");
                    $dl = mysqli_fetch_assoc($dls);
                    
                    $ils = mysqli_query($conn, "SELECT * FROM `event` WHERE `faculty_id` = '$faculty_id' and `level` = 'Institute Level'");
                    $il = mysqli_fetch_assoc($ils);
                    ?>
                    <input type="hidden" name="level[]" value="Department Level">
                    <input type="hidden" name="level[]" value="Institute Level">
                    <p><pre> 1.<input style="width: 200px;" type="text" name="event[]" value="<?php echo isset($dl['event']) ? $dl['event'] : "" ?>" placeholder="" class="name-inp">&nbsp;&nbsp;&nbsp;&nbsp;1.<input style="width: 200px;" type="text" name="event[]" value="<?php echo isset($il['event']) ? $il['event'] : "" ?>" placeholder="" class="name-inp"></p></pre>
                    <p class="name"></p>
                    <?php
                    $dl = mysqli_fetch_assoc($dls);
                    $il = mysqli_fetch_assoc($ils);
                    ?>
                    <input type="hidden" name="level[]" value="Department Level">
                    <input type="hidden" name="level[]" value="Institute Level">
                    <p><pre> 2.<input style="width: 200px;" type="text" name="event[]" value="<?php echo isset($dl['event']) ? $dl['event'] : "" ?>" placeholder="" class="name-inp">&nbsp;&nbsp;&nbsp;&nbsp;2.<input style="width: 200px;" type="text" name="event[]" value="<?php echo isset($il['event']) ? $il['event'] : "" ?>" placeholder="" class="name-inp"></p></pre>
                    <input type="submit" name="save" value="NEXT" class="sub">
</form>
</div>
</div>
</div>
</div>
</body>
</html>

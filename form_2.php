<?php
include "db.php";
if(!isset($_GET['faculty_id']))
{
  header("location: form1.php");
}

if(isset($_POST['save']))
{
  $faculty_id = $_GET['faculty_id'];
  $event = $_POST['event'];
  $level = $_POST['level'];

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

  mysqli_query($conn, "INSERT INTO `paper_lecture`(`faculty_id`, `papers_presented`, `expert_lectures`, `pg_exam`) 
                      VALUES ('$faculty_id', '$papers_presented', '$expert_lectures', '$pg_exam')");
  
  header("location: form_3.php?faculty_id=$faculty_id");

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
                    <input type="hidden" name="level[]" value="BMSCE">
                    <input type="hidden" name="level[]" value="BMSCE">
                    <input type="hidden" name="level[]" value="BMSCE">
                    <p><pre> 1. <input type="text" name="event[]" placeholder="" class="name-inp"></p></pre>
                    <p><pre> 2. <input type="text" name="event[]" placeholder="" class="name-inp"></p></pre>
                    <p><pre> 3. <input type="text" name="event[]" placeholder="" class="name-inp"></p></pre>
                    <p class="name">AT OTHER INSTITUTES PARTICIPATED/ORGANISED :</p>
                    <input type="hidden" name="level[]" value="Other Institutes">
                    <input type="hidden" name="level[]" value="Other Institutes">
                    <input type="hidden" name="level[]" value="Other Institutes">
                    <p><pre> 1. <input type="text" name="event[]" placeholder="" class="name-inp"></P></pre>
                    <p><pre> 2. <input type="text" name="event[]" placeholder="" class="name-inp"></P></pre>
                    <p><pre> 3. <input type="text" name="event[]" placeholder="" class="name-inp"></P></pre>
                    <p class="name">PRESENTATION OF PAPERS/EXPERT LECTURES :</p>
                    <p class="name"></p>
                    <p class="name">PAPERS PRESENTED :</p>
                    <p><pre>    <input type="text" name="papers_presented" placeholder="" class="name-inp"></p></pre>
                    <p class="name"></p>
                    <p class="name">EXPERT LECTURES :</p>
                    <p><pre>    <input type="text" name="expert_lectures" placeholder="" class="name-inp"></p></pre>
                    <p class="name"></p>
                    <p class="name">PG RESEARCH EXAMINERSHIP :</p>
                    <p><pre>    <input type="text" name="pg_exam" placeholder="" class="name-inp"></p></pre>
                    <p class="name"></p>
                    <p class="name"></p>
                    <p class="name">ORGANISING DEPT LEVEL/INSTITUTE LEVEL EVENTS:</P>
                    <p class="name"><pre>       DEPARTMENT LEVEL :                  INSTITUTE LEVEL : </p></pre>
                    <input type="hidden" name="level[]" value="Department Level">
                    <input type="hidden" name="level[]" value="Institute Level">
                    <p><pre> 1.<input style="width: 200px;" type="text" name="event[]" placeholder="" class="name-inp">&nbsp;&nbsp;&nbsp;&nbsp;1.<input style="width: 200px;" type="text" name="event[]" placeholder="" class="name-inp"></p></pre>
                    <p class="name"></p>
                    <input type="hidden" name="level[]" value="Department Level">
                    <input type="hidden" name="level[]" value="Institute Level">
                    <p><pre> 2.<input style="width: 200px;" type="text" name="event[]" placeholder="" class="name-inp">&nbsp;&nbsp;&nbsp;&nbsp;2.<input style="width: 200px;" type="text" name="event[]" placeholder="" class="name-inp"></p></pre>
                    <input type="submit" name="save" value="NEXT" class="sub">
</form>
</div>
</div>
</div>
</div>
</body>
</html>

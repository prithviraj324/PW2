<?php
include "db.php";

<?php
include "db.php";

if(!isset($_SESSION)) 
    session_start();

if (!isset($_SESSION['user_id'])){
  header("location: login.php");
}

$user_id = $_SESSION['user_id'];


if(isset($_POST['save']))
{
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $department = $_POST['department'];

    mysqli_query($conn, "INSERT INTO `faculty`(`name`, `designation`, `department`) 
                                    VALUES ('$name', '$designation', '$department')");
    $faculty_id = mysqli_insert_id($conn);

    $course = $_POST['course'];
    $subject = $_POST['subject'];
    $electives = $_POST['electives'];
    $project_discussion = $_POST['project_discussion'];
    $seminar = $_POST['seminar'];
    $other = $_POST['other'];

    $i = -1;
    foreach($course as $co)
    {
        $i++;
        mysqli_query($conn, "INSERT INTO `supervision`(`faculty_id`, `course`, `subject`, `electives`, `project_discussion`, `seminar`, `other`) 
            VALUES ('$faculty_id', '$course[$i]', '$subject[$i]', '$electives[$i]', '$project_discussion[$i]', '$seminar[$i]', '$other[$i]')");
    }

    $innovation_in_teaching = $_POST['innovation_in_teaching'];
    $academic_contribution = $_POST['academic_contribution'];
    $research_contribution = $_POST['research_contribution'];
    $research_supervision = $_POST['research_supervision'];
    $research_project = $_POST['research_project'];
    $national_publication = $_POST['national_publication'];
    $international_publication = $_POST['international_publication'];
    
    mysqli_query($conn, "INSERT INTO `contribution`(`faculty_id`, `innovation_in_teaching`, `academic_contribution`, `research_contribution`, 
                        `research_supervision`, `research_project`, `national_publication`, `international_publication`) 
                        VALUES ('$faculty_id', '$innovation_in_teaching', '$academic_contribution', '$research_contribution', 
                        '$research_supervision', '$research_project', '$national_publication', '$international_publication')");
    
    header("location: form_2.php?faculty_id=$faculty_id");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Form-page1</title>
        <link href="Form-page1.css" rel="stylesheet">
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
                    <p><pre>    NAME:       <input style="width: 200px;" type="text" name="name" placeholder="" class="name-inp">    DESIGNATION: <input style="width: 200px;" type="text" name="designation" placeholder="" class="name-inp"></p></pre>
                    <p class="name"> </p>
                    <p><pre>    DEPARTMENT: <input style="width: 200px;" type="text" name="department" placeholder="" class="name-inp"></p></pre>
                    <p class="name"><pre>                                     UG/PG TEACHING/RESEARCH SUPERVISION</p></pre>
                    <p class="name"> </p>
                    <table class="center">
                        <tr>
                            <th>COURSE</th>
                            <th>SUBJECT</th>
                            <th>ELECTIVES</th>
                            <th>PROJECT/DISCUSSION</th>
                            <th>SEMINAR</th>
                            <th>OTHER</th>
                        </tr>
                        <tr>
                            <th>U.G</th>
                            <input type="hidden" name="course[]" value="U.G">
                            <td><p><input style="height: 50px;" type="text" name="subject[]" placeholder="" class="name-inp"></p></td>
                            <td><p><input style="height: 50px;" type="text" name="electives[]" placeholder="" class="name-inp"></p></td>
                            <td><p><pre> <input style="height: 50px;" type="text" name="project_discussion[]" placeholder="" class="name-inp"></p></td></pre>
                            <td><p><input style="height: 50px;" type="text" name="seminar[]" placeholder="" class="name-inp"></p></td>
                            <td><p><input style="height: 50px;" type="text" name="other[]" placeholder="" class="name-inp"></p></td>
                        </tr>
                        <tr>
                            <th>P.G</th>
                            <input type="hidden" name="course[]" value="P.G">
                            <td><p><input style="height: 50px;" type="text" name="subject[]" placeholder="" class="name-inp"></p></td>
                            <td><p><input style="height: 50px;" type="text" name="electives[]" placeholder="" class="name-inp"></p></td>
                            <td><p><pre> <input style="height: 50px;" type="text" name="project_discussion[]" placeholder="" class="name-inp"></p></td></pre>
                            <td><p><input style="height: 50px;" type="text" name="seminar[]" placeholder="" class="name-inp"></p></td>
                            <td><p><input style="height: 50px;" type="text" name="other[]" placeholder="" class="name-inp"></p></td>

                        </tr>
                        <tr>
                            <th>RESEARCH</th>
                            <input type="hidden" name="course[]" value="Research">
                            <td><p><input style="height: 50px;" type="text" name="subject[]" placeholder="" class="name-inp"></p></td>
                            <td><p><input style="height: 50px;" type="text" name="electives[]" placeholder="" class="name-inp"></p></td>
                            <td><p><pre> <input style="height: 50px;" type="text" name="project_discussion[]" placeholder="" class="name-inp"></p></td></pre>
                            <td><p><input style="height: 50px;" type="text" name="seminar[]" placeholder="" class="name-inp"></p></td>
                            <td><p><input style="height: 50px;" type="text" name="other[]" placeholder="" class="name-inp"></p></td>

                        </tr>
                    </table>
                    <p class="name"> </p>
                    <p><pre>   ANY INNOVATION IN TEACHING          : <input style="width: 400px;" type="text" name="innovation_in_teaching" placeholder="" class="name-inp"></p></pre>
                    <p><pre>   ACADEMIC CONTRIBUTION/UPGRADATION   : <input style="width: 400px;" type="text" name="academic_contribution" placeholder="" class="name-inp"></p></pre>
                    <p><pre>   RESEARCH CONTRIBUTION               : <input style="width: 400px;" type="text" name="research_contribution" placeholder="" class="name-inp"></p></pre>
                    <p><pre>   RESEARCH SUPERVISION                : <input style="width: 400px;" type="text" name="research_supervision" placeholder="" class="name-inp"></p></pre>
                    <p><pre>   RESEARCH PROJECT                    : <input style="width: 400px;" type="text" name="research_project" placeholder="" class="name-inp"></p></pre>
                    <p><pre>   RESEARCH PUBLICATON (NATIONAL)      : <input style="width: 400px;" type="text" name="national_publication" placeholder="" class="name-inp"></p></pre>
                    <p><pre>   RESEARCH PUBLICATON (INTER NATIONAL): <input style="width: 400px;" type="text" name="international_publication" placeholder="" class="name-inp"></p></pre>

                    <pre>
                        
                    </pre>
                    <input type="submit" name="save" value="NEXT" class="sub">
</form>
</div>
</div>
</div>
</div>
</body>
</html>

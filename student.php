<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student</title>
    <style>
      #abc{ position: relative;
            width: 100%;
            max-width: 600px;
            padding: 50px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, .1);
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 10px;}
        
            #myTable{ position: relative;
            width: 100%;
            max-width: 600px;
            padding: 50px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, .1);
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 10px;}
      </style>
</head>
<body style="background-image: url('b.jpg');">
<h2 align="center" style="color:white"><u>STUDENT PAGE</u></h2>
<form method="POST" action="index.php">
    <input class="button"  type="submit" value="HOME" style="height:40px; width:90px"/>
  </form>
<br/>
<div id="abc" style="color:white;border:2px solid white">
<input placeholder="Search" type="search" id="searchbox" style="width:170px; border: 2px solid white;">
<br/>
<br/>
<?php
  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $databasename = "370_project";
  
  // CREATE CONNECTION
  $conn = new mysqli($servername,
    $username, $password, $databasename);
  
  // GET CONNECTION ERRORS
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // SQL QUERY
  $query = "SELECT course_name,section FROM course;";
  
  // FETCHING DATA FROM DATABASE
  $result = $conn->query($query);
  
    if ($result->num_rows > 0) 
    {
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    } 
    ?>
<form id="countries" style="overflow: visible" method="get">
  <select id="countries" name="options" size="16" style="height:282px;width:167px;" onchange="setTextField(this)">
  <?php 
  foreach ($options as $option) {
  ?>
    <option  value="<?php echo $option['course_name']."__".$option['section']?>" name="ok" ><?php echo $option['course_name']."-sec:".$option['section']; ?> </option>
    <?php 
    }
    global $output7;
   ?>
</select>
<br/>
<br/>
<div>
<input type="submit" value="select" />
  </div>
</form>
  </div>
  <br/>
<div id="abc" style="height:300px; width:700px; border:2px solid white;color:white">
<?php
if (isset($_GET["options"])) {
    $enroll= $_GET['options'];
    $a=explode("__",$enroll); 
    $sql ="select course_name,section,dept,pre_req,credit from course where course_name='$a[0]' and section='$a[1]';";
    $result = $conn->query($sql);
    $output= mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    $sql2 ="select seat_status.course_name,seat_status.section,seat_status.remaining_seat,seat_status.total_seat,timing.date,timing.time,timing.building,faculty.name_initial from 
    ((faculty inner join seat_status on faculty.name_initial=seat_status.name_initial) 
    inner join timing on timing.course_name=seat_status.course_name and timing.section=seat_status.section) 
    where seat_status.course_name='$a[0]' and seat_status.section='$a[1]'";
    $result2 = $conn->query($sql2);
    $output2= mysqli_fetch_all($result2, MYSQLI_ASSOC);
    foreach ($output as $o){
     echo  nl2br($o['course_name']."....... Sec:".$o['section']."....... Dept:".$o['dept']."....... Credit:".$o['credit']."\n");
     foreach ($output2 as $o){
      echo  nl2br("Total seat:".$o['total_seat']."....... Remaining seat:".$o['remaining_seat']."....... DATE:".$o['date']."....... Time:".$o['time']."....... Building:".$o['building']."\n");
      foreach ($output2 as $o){
        echo  nl2br("faculty:".$o['name_initial']."\n");

      }
     }

    
    }
    
    if(isset($_POST['button1']) ) { 
      $sql3="SELECT course1 from temp;";
      $result3 = $conn->query($sql3);
      $output3= mysqli_fetch_all($result3, MYSQLI_ASSOC);
      $arrLength = count($output3);
      if($arrLength===4){
      $b=$output3[0]['course1'];
      $b1=$output3[1]['course1'];
      $b2=$output3[2]['course1'];
      $b3=$output3[3]['course1'];
      $sql5 ="UPDATE students SET Course1 = '$b',Course2 = '$b1',Course3 = '$b2',Course4 = '$b3' WHERE Id=$_SESSION[username];";
      
      $result5 = $conn->query($sql5);
			

    $sql6="SELECT Course1,Course2,Course3,Course4 FROM students WHERE Id=$_SESSION[username];";
    $result6 = $conn->query($sql6);
    $output6= mysqli_fetch_all($result6, MYSQLI_ASSOC);
    $course_var1=explode("__",$output6[0]['Course1']);
    $course_var2=explode("__",$output6[0]['Course2']);
    $course_var3=explode("__",$output6[0]['Course3']);
		$course_var4=explode("__",$output6[0]['Course4']);
  
    $sql7="SELECT course_name,section,date,time,building from timing
    where (course_name='$course_var1[0]' and section='$course_var1[1]') 
    or (course_name='$course_var2[0]' and section='$course_var2[1]')
    or (course_name='$course_var3[0]' and section='$course_var3[1]')
    or (course_name='$course_var4[0]' and section='$course_var4[1]')";
    $result7 = $conn->query($sql7);
    $output7= mysqli_fetch_all($result7, MYSQLI_ASSOC);
    print json_encode($output7);
    $sql4="DELETE FROM temp;";
    $result4 = $conn->query($sql4);
  }else{echo '<p style="color: red;">'."YOU HAVE TO ADD 4 COURSES".'</p>';} }
    
    
 

  
  
  
  }
  
    ?>

</div>
<div style = "position:relative; left:290px; top:-812px; height:282px;width:167px; ">
<form style="overflow: visible" method="post" style="position:relative; left:40px; top:-594px;" >
  <select  name="enrolled" size="16" style="height:282px;width:167px;" onchange="setTextField(this)">
  <?php
  
   if (isset($_GET["options"])) {
    $enroll= $_GET['options'];

    $sql = "INSERT IGNORE INTO temp (course1)
VALUES ('$enroll')";

if ($conn->query($sql) === TRUE) {
$sql ="SELECT course1 from temp";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
  {
    $option= mysqli_fetch_all($result, MYSQLI_ASSOC);
  } 
    }
else{echo ".";}
  }

   
  foreach ($option as $option) {
  ?>

    <option  value="<?php echo $option['course1'] ?>"> <?php echo $option['course1']; ?> </option>

    <?php 
    
    }
   ?>
  </select>
  <div style = "position:relative; left:-66px; top:-200px; ">
  <input type="submit" value="remove" />
  </div>

  <?php
if(isset($_POST['enrolled']))
{
  $removed=$_POST['enrolled'];
$sql="DELETE FROM temp WHERE course1='$removed'";

if ($conn->query($sql) === TRUE) {
  echo ".";
} else {
  echo ".";
}
}
?>

  </form>
</div>
<form method="post"> 
<input type="submit" name="button1"
				value="Confirm Advising" style="position:relative;left: 300px;top: -793px;"/> 
</form>
<?php if (is_array($output7) || is_object($output7)){ ?>
<table id="myTable" cellspacing="2" cellpadding="10" border="1" style="position:relative; left:720px;top: -1240px; color:white; border:2px solid white">
                    <tbody><tr>
                        <th>Time/Day</th>
                        <th>Sunday</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                    </tr>
                    
                    <tr id="row1">
                        <td><b>08:00 AM-09:20 AM</b></td>
                        <td id="1-1"> <?php $i=0; foreach ($output7 as $o1){if($o1['time']==="08:00-09:20" AND $o1['date']==='SU'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($o1['course_name']."\nsec:".$o1['section']).'</p>';}else{echo nl2br($o1['course_name']."\nsec:".$o1['section']);}}}?></td>
                        <td id="1-2"><?php  $i=0; foreach ($output7 as $o2){if($o2['time']==="08:00-09:20" AND $o2['date']==='MO'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($o2['course_name']."\nsec:".$o2['section']).'</p>';}else{echo nl2br($o2['course_name']."\nsec:".$o2['section']);}}}?></td>
                        <td id="1-3"><?php $i=0; foreach ($output7 as $o3){if($o3['time']==="08:00-09:20" AND $o3['date']==='SU'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($o3['course_name']."\nsec:".$o3['section']).'</p>';}else{echo nl2br($o3['course_name']."\nsec:".$o3['section']);}}}?></td>
                        <td id="1-4"><?php $i=0; foreach ($output7 as $o4){if($o4['time']==="08:00-09:20" AND $o4['date']==='MO'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($o4['course_name']."\nsec:".$o4['section']).'</p>';}else{echo nl2br($o4['course_name']."\nsec:".$o4['section']);}}}?></td>
                        <td id="1-5"><?php  $i=0;foreach ($output7 as $o5){if($o5['time']==="08:00-09:20" AND $o5['date']==='SA'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($o5['course_name']."\nsec:".$o5['section']).'</p>';}else{echo nl2br($o5['course_name']."\nsec:".$o5['section']);}}}?></td>
                        <td id="1-6"></td>
                        <td id="1-7"><?php $i=0; foreach ($output7 as $o6){if($o6['time']==="08:00-09:20" AND $o6['date']==='SA'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($o6['course_name']."\nsec:".$o6['section']).'</p>';}else{echo nl2br($o6['course_name']."\nsec:".$o6['section']);}}}?></td>
                    </tr><tr>

                    </tr><tr id="row2">
                        <td><b>09:30 AM-10:50 AM</b></td>
                        <td id="2-1"><?php $i=0; foreach ($output7 as $q1){if($q1['time']==="09:30-10:50" AND $q1['date']==='SU'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($q1['course_name']."\nsec:".$q1['section']).'</p>';}else{echo nl2br($q1['course_name']."\nsec:".$q1['section']);}}}?></td>
                        <td id="2-2"><?php $i=0; foreach ($output7 as $q2){if($q2['time']==="09:30-10:50" AND $q2['date']==='MO'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($q2['course_name']."\nsec:".$q2['section']).'</p>';}else{echo nl2br($q2['course_name']."\nsec:".$q2['section']);}}}?></td>
                        <td id="2-3"><?php $i=0; foreach ($output7 as $q3){if($q3['time']==="09:30-10:50" AND $q3['date']==='SU'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($q3['course_name']."\nsec:".$q3['section']).'</p>';}else{echo nl2br($q3['course_name']."\nsec:".$q3['section']);}}}?></td>
                        <td id="2-4"><?php $i=0; foreach ($output7 as $q4){if($q4['time']==="09:30-10:50" AND $q4['date']==='MO'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($q4['course_name']."\nsec:".$q4['section']).'</p>';}else{echo nl2br($q4['course_name']."\nsec:".$q4['section']);}}}?></td>
                        <td id="2-5"><?php  $i=0;foreach ($output7 as $q5){if($q5['time']==="09:30-10:50" AND $q5['date']==='SA'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($q5['course_name']."\nsec:".$q5['section']).'</p>';}else{echo nl2br($q5['course_name']."\nsec:".$q5['section']);}}}?></td>
                        <td id="2-6"></td>
                        <td id="2-7"><?php $i=0; foreach ($output7 as $q6){if($q6['time']==="09:30-10:50" AND $q6['date']==='SA'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($q6['course_name']."\nsec:".$q6['section']).'</p>';}else{echo nl2br($q6['course_name']."\nsec:".$q6['section']);}}}?></td>
                    </tr>

                    <tr id="row3">
                        <td><b>11:00 AM-12:20 PM</b></td>
                        <td id="3-1"><?php $i=0; foreach ($output7 as $e1){if($e1['time']==="11:00-12:20" AND $e1['date']==='SU'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($e1['course_name']."\nsec:".$e1['section']).'</p>';}else{echo nl2br($e1['course_name']."\nsec:".$e1['section']);}}}?></td>
                        <td id="3-2"><?php $i=0; foreach ($output7 as $e2){if($e2['time']==="11:00-12:20" AND $e2['date']==='MO'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($e2['course_name']."\nsec:".$e2['section']).'</p>';}else{echo nl2br($e2['course_name']."\nsec:".$e2['section']);}}}?></td>
                        <td id="3-3"><?php $i=0; foreach ($output7 as $e3){if($e3['time']==="11:00-12:20" AND $e3['date']==='SU'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($e3['course_name']."\nsec:".$e3['section']).'</p>';}else{echo nl2br($e3['course_name']."\nsec:".$e3['section']);}}}?></td>
                        <td id="3-4"><?php $i=0; foreach ($output7 as $e4){if($e4['time']==="11:00-12:20" AND $e4['date']==='MO'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($e4['course_name']."\nsec:".$e4['section']).'</p>';}else{echo nl2br($e4['course_name']."\nsec:".$e4['section']);}}}?></td>
                        <td id="3-5"><?php $i=0; foreach ($output7 as $e5){if($e5['time']==="11:00-12:20" AND $e5['date']==='SA'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($e5['course_name']."\nsec:".$e5['section']).'</p>';}else{echo nl2br($e5['course_name']."\nsec:".$e5['section']);}}}?></td>
                        <td id="3-6"></td>
                        <td id="3-7"><?php $i=0; foreach ($output7 as $e6){if($e6['time']==="11:00-12:20" AND $e6['date']==='SA'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($e6['course_name']."\nsec:".$e6['section']).'</p>';}else{echo nl2br($e6['course_name']."\nsec:".$e6['section']);}}}?></td>
                    </tr>

                    <tr id="row4">
                        <td><b>12:30 PM-01:50 PM</b></td>
                        <td id="4-1"><?php $i=0; foreach ($output7 as $z1){if($z1['time']==="12:30-01:50" AND $z1['date']==='SU'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($z1['course_name']."\nsec:".$z1['section']).'</p>';}else{echo nl2br($z1['course_name']."\nsec:".$z1['section']);}}}?></td>
                        <td id="4-2"><?php $i=0; foreach ($output7 as $z2){if($z2['time']==="12:30-01:50" AND $z2['date']==='MO'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($z2['course_name']."\nsec:".$z2['section']).'</p>';}else{echo nl2br($z2['course_name']."\nsec:".$z2['section']);}}}?></td>
                        <td id="4-3"><?php $i=0; foreach ($output7 as $z3){if($z3['time']==="12:30-01:50" AND $z3['date']==='SU'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($z3['course_name']."\nsec:".$z3['section']).'</p>';}else{echo nl2br($z3['course_name']."\nsec:".$z3['section']);}}}?></td>
                        <td id="4-4"><?php $i=0; foreach ($output7 as $z4){if($z4['time']==="12:30-01:50" AND $z4['date']==='MO'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($z4['course_name']."\nsec:".$z4['section']).'</p>';}else{echo nl2br($z4['course_name']."\nsec:".$z4['section']);}}}?></td>
                        <td id="4-5"><?php $i=0; foreach ($output7 as $z5){if($z5['time']==="12:30-01:50" AND $z5['date']==='SA'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($z5['course_name']."\nsec:".$z5['section']).'</p>';}else{echo nl2br($z5['course_name']."\nsec:".$z5['section']);}}}?></td>
                        <td id="4-6"></td>
                        <td id="4-7"><?php $i=0; foreach ($output7 as $z6){if($z6['time']==="12:30-01:50" AND $z6['date']==='SA'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($z6['course_name']."\nsec:".$z6['section']).'</p>';}else{echo nl2br($z6['course_name']."\nsec:".$z6['section']);}}}?></td>
                    </tr>

                    <tr id="row5">
                        <td><b>02:00 PM-03:20 PM</b></td>
                        <td id="5-1"><?php $i=0; foreach ($output7 as $m1){if($m1['time']==="02:00-03:20" AND $m1['date']==='SU'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($m1['course_name']."\nsec:".$m1['section']).'</p>';}else{echo nl2br($m1['course_name']."\nsec:".$m1['section']);}}}?></td>
                        <td id="5-2"><?php $i=0; foreach ($output7 as $m2){if($m2['time']==="02:00-03:20" AND $m2['date']==='MO'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($m2['course_name']."\nsec:".$m2['section']).'</p>';}else{echo nl2br($m2['course_name']."\nsec:".$m2['section']);}}}?></td>
                        <td id="5-3"><?php $i=0; foreach ($output7 as $m3){if($m3['time']==="02:00-03:20" AND $m3['date']==='SU'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($m3['course_name']."\nsec:".$m3['section']).'</p>';}else{echo nl2br($m3['course_name']."\nsec:".$m3['section']);}}}?></td>
                        <td id="5-4"><?php $i=0; foreach ($output7 as $m4){if($m4['time']==="02:00-03:20" AND $m4['date']==='MO'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($m4['course_name']."\nsec:".$m4['section']).'</p>';}else{echo nl2br($m4['course_name']."\nsec:".$m4['section']);}}}?></td>
                        <td id="5-5"><?php $i=0; foreach ($output7 as $m5){if($m5['time']==="02:00-03:20" AND $m5['date']==='SA'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($m5['course_name']."\nsec:".$m5['section']).'</p>';}else{echo nl2br($m5['course_name']."\nsec:".$m5['section']);}}}?></td>
                        <td id="5-6"></td>
                        <td id="5-7"><?php $i=0; foreach ($output7 as $m6){if($m6['time']==="02:00-03:20" AND $m6['date']==='SA'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($m6['course_name']."\nsec:".$m6['section']).'</p>';}else{echo nl2br($m6['course_name']."\nsec:".$m6['section']);}}}?></td>
                    </tr>

                    <tr id="row6">
                        <td><b>03:30 PM-04:50 PM</b></td>
                        <td id="6-1"><?php $i=0; foreach ($output7 as $j1){if($j1['time']==="03:30-04:50" AND $j1['date']==='SU'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($j1['course_name']."\nsec:".$j1['section']).'</p>';}else{echo nl2br($j1['course_name']."\nsec:".$j1['section']);}}}?></td>
                        <td id="6-2"><?php $i=0; foreach ($output7 as $j2){if($j2['time']==="03:30-04:50" AND $j2['date']==='MO'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($j2['course_name']."\nsec:".$j2['section']).'</p>';}else{echo nl2br($j2['course_name']."\nsec:".$j2['section']);}}}?></td>
                        <td id="6-3"><?php $i=0; foreach ($output7 as $j3){if($j3['time']==="03:30-04:50" AND $j3['date']==='SU'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($j3['course_name']."\nsec:".$j3['section']).'</p>';}else{echo nl2br($j3['course_name']."\nsec:".$j3['section']);}}}?></td>
                        <td id="6-4"><?php $i=0; foreach ($output7 as $j4){if($j4['time']==="03:30-04:50" AND $j4['date']==='MO'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($j4['course_name']."\nsec:".$j4['section']).'</p>';}else{echo nl2br($j4['course_name']."\nsec:".$j4['section']);}}}?></td>
                        <td id="6-5"><?php $i=0; foreach ($output7 as $j5){if($j5['time']==="03:30-04:50" AND $j5['date']==='SA'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($j5['course_name']."\nsec:".$j5['section']).'</p>';}else{echo nl2br($j5['course_name']."\nsec:".$j5['section']);}}}?></td>
                        <td id="6-6"></td>
                        <td id="6-7"><?php $i=0; foreach ($output7 as $j6){if($j6['time']==="03:30-04:50" AND $j6['date']==='SA'){$i+=1;if($i>1){echo '<p style="color: red;">' .nl2br($j6['course_name']."\nsec:".$j6['section']).'</p>';}else{echo nl2br($j6['course_name']."\nsec:".$j6['section']);}}}?></td>
                    </tr>

    
                </tbody></table>
                <button style="position:relative;top:-1572px;left:470px" id="convert">CONVERT ROUTINE TO IMAGE
      
      </button>
      <div style="position:relative;top:-1572px;left:470px"
        id="result">
         <!-- Result will appear be here -->
      </div>
      <script type="text/javascript" src="https://github.com/niklasvh/html2canvas/releases/download/0.5.0-alpha1/html2canvas.js"></script>
      <script>
         //convert table to image            
         function convertToImage() {
            var resultDiv = document.getElementById("result");
            html2canvas(document.getElementById("myTable"), {
                onrendered: function(canvas) {
                    var img = canvas.toDataURL("image/png");
                    result.innerHTML = '<a download="test.jpeg" href="'+img+'"><button>DOWNLOAD</button></a>';
                    }
            });
         }        
         //click event
         var convertBtn = document.getElementById("convert");
         convertBtn.addEventListener('click', convertToImage);
      </script>
<?php }?>





                <script type="text/javascript">
   searchBox = document.querySelector("#searchBox");
countries = document.querySelector("#countries");
var when = "keyup"; //You can change this to keydown, keypress or change

searchBox.addEventListener("keyup", function (e) {
    var text = e.target.value; //searchBox value
    var options = countries.options; //select options
    for (var i = 0; i < options.length; i++) {
        var option = options[i]; //current option
        var optionText = option.text; //option text ("Somalia")
        var lowerOptionText = optionText.toLowerCase(); //option text lowercased for case insensitive testing
        var lowerText = text.toLowerCase(); //searchBox value lowercased for case insensitive testing
        var regex = new RegExp("^" + text, "i"); //regExp, explained in post
        var match = optionText.match(regex); //test if regExp is true
        var contains = lowerOptionText.indexOf(lowerText) != -1; //test if searchBox value is contained by the option text
        if (match || contains) { //if one or the other goes through
            option.selected = true; //select that option
            return; //prevent other code inside this event from executing
        }
        searchBox.selectedIndex = 0; //if nothing matches it selects the default option
    }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>


<?php
 $conn->close();
 ?>
    
</body>
</html>
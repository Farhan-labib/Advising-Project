<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title >FACULTY</title>
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
      </style>
</head>
<body style="background-image: url('b.jpg');">
    
<h2 align="center" style="color:white"><u>FACULTY PAGE</u></h2>
<form method="POST" action="index.php">
    <input class="button"  type="submit" value="HOME" style="height:40px; width:90px"/>
  </form>
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
  $query = "SELECT name_initial FROM faculty;";
  
  // FETCHING DATA FROM DATABASE
  $result = $conn->query($query);
  
    if ($result->num_rows > 0) 
    {
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    } 
    ?>
  <div id="abc" style="border:2px solid white;">
<form  style="overflow: visible" method="get">
  <select  name="options" size="16" style="height:282px;width:167px;" onchange="setTextField(this)">
  <?php 
  foreach ($options as $option) {
  ?>
    <option  value="<?php echo $option['name_initial']; ?>" name="ok" ><?php echo $option['name_initial']; ?> </option>
    <?php 
    }
    global $output;
   ?>
</select>
<br/>
<br/>
<div>
<input type="submit" value="SHOW" />
  </div>
</form>
  </div>
  <br/>
<div id="abc" style="height:300px; width:700px; border:2px solid white;color:white">
<?php
if (isset($_GET["options"])) {
    $enroll= $_GET['options'];
    $sql ="select seat_status.course_name,seat_status.section,seat_status.total_seat,
    seat_status.remaining_seat,timing.date,timing.time,timing.building from 
    ((faculty inner join seat_status on faculty.name_initial=seat_status.name_initial) 
    inner join timing on timing.course_name=seat_status.course_name and timing.section=seat_status.section) 
    where faculty.name_initial='$enroll'";
    $result = $conn->query($sql);
    $output= mysqli_fetch_all($result, MYSQLI_ASSOC);
     
    foreach ($output as $o){
     echo  nl2br($o['course_name']."   Sec:".$o['section']."   Remaining seat:".$o['remaining_seat']."   ".$o['building']."\n");
     
    
    }}
  
    ?>

</div>



<?php if (is_array($output) || is_object($output)){ ?>

<table id="abc"  cellspacing="2" cellpadding="10" id="data_table" border="1" style="position:relative; left:720px;top: -860px;color:white;border:2px solid white">
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
                        <td id="1-1"> <?php foreach ($output as $o1){if($o1['time']==="08:00-09:20" AND $o1['date']==='SU'){echo nl2br($o1['course_name']."\nsec:".$o1['section']);}}?></td>
                        <td id="1-2"><?php foreach ($output as $o2){if($o2['time']==="08:00-09:20" AND $o2['date']==='MO'){echo nl2br($o2['course_name']."\nsec:".$o2['section']);}}?></td>
                        <td id="1-3"><?php foreach ($output as $o3){if($o3['time']==="08:00-09:20" AND $o3['date']==='SU'){echo nl2br($o3['course_name']."\nsec:".$o3['section']);}}?></td>
                        <td id="1-4"><?php foreach ($output as $o4){if($o4['time']==="08:00-09:20" AND $o4['date']==='MO'){echo nl2br($o4['course_name']."\nsec:".$o4['section']);}}?></td>
                        <td id="1-5"><?php foreach ($output as $o5){if($o5['time']==="08:00-09:20" AND $o5['date']==='SA'){echo nl2br($o5['course_name']."\nsec:".$o5['section']);}}?></td>
                        <td id="1-6"></td>
                        <td id="1-7"><?php foreach ($output as $o6){if($o6['time']==="08:00-09:20" AND $o6['date']==='SA'){echo nl2br($o6['course_name']."\nsec:".$o6['section']);}}?></td>
                    </tr><tr>

                    </tr><tr id="row2">
                        <td><b>09:30 AM-10:50 AM</b></td>
                        <td id="2-1"><?php foreach ($output as $q1){if($q1['time']==="09:30-10:50" AND $q1['date']==='SU'){echo nl2br($q1['course_name']."\nsec:".$q1['section']);}}?></td>
                        <td id="2-2"><?php foreach ($output as $q2){if($q2['time']==="09:30-10:50" AND $q2['date']==='MO'){echo nl2br($q2['course_name']."\nsec:".$q2['section']);}}?></td>
                        <td id="2-3"><?php foreach ($output as $q3){if($q3['time']==="09:30-10:50" AND $q3['date']==='SU'){echo nl2br($q3['course_name']."\nsec:".$q3['section']);}}?></td>
                        <td id="2-4"><?php foreach ($output as $q4){if($q4['time']==="09:30-10:50" AND $q4['date']==='MO'){echo nl2br($q4['course_name']."\nsec:".$q4['section']);}}?></td>
                        <td id="2-5"><?php foreach ($output as $q5){if($q5['time']==="09:30-10:50" AND $q5['date']==='SA'){echo nl2br($q5['course_name']."\nsec:".$q5['section']);}}?></td>
                        <td id="2-6"></td>
                        <td id="2-7"><?php foreach ($output as $q6){if($q6['time']==="09:30-10:50" AND $q6['date']==='SA'){echo nl2br($q6['course_name']."\nsec:".$q6['section']);}}?></td>
                    </tr>

                    <tr id="row3">
                        <td><b>11:00 AM-12:20 PM</b></td>
                        <td id="3-1"><?php foreach ($output as $e1){if($e1['time']==="11:00-12:20" AND $e1['date']==='SU'){echo nl2br($e1['course_name']."\nsec:".$e1['section']);}}?></td>
                        <td id="3-2"><?php foreach ($output as $e2){if($e2['time']==="11:00-12:20" AND $e2['date']==='MO'){echo nl2br($e2['course_name']."\nsec:".$e2['section']);}}?></td>
                        <td id="3-3"><?php foreach ($output as $e3){if($e3['time']==="11:00-12:20" AND $e3['date']==='SU'){echo nl2br($e3['course_name']."\nsec:".$e3['section']);}}?></td>
                        <td id="3-4"><?php foreach ($output as $e4){if($e4['time']==="11:00-12:20" AND $e4['date']==='MO'){echo nl2br($e4['course_name']."\nsec:".$e4['section']);}}?></td>
                        <td id="3-5"><?php foreach ($output as $e5){if($e5['time']==="11:00-12:20" AND $e5['date']==='SA'){echo nl2br($e5['course_name']."\nsec:".$e5['section']);}}?></td>
                        <td id="3-6"></td>
                        <td id="3-7"><?php foreach ($output as $e6){if($e6['time']==="11:00-12:20" AND $e6['date']==='SA'){echo nl2br($e6['course_name']."\nsec:".$e6['section']);}}?></td>
                    </tr>

                    <tr id="row4">
                        <td><b>12:30 PM-01:50 PM</b></td>
                        <td id="4-1"><?php foreach ($output as $z1){if($z1['time']==="12:30-01:50" AND $z1['date']==='SU'){echo nl2br($z1['course_name']."\nsec:".$z1['section']);}}?></td>
                        <td id="4-2"><?php foreach ($output as $z2){if($z2['time']==="12:30-01:50" AND $z2['date']==='MO'){echo nl2br($z2['course_name']."\nsec:".$z2['section']);}}?></td>
                        <td id="4-3"><?php foreach ($output as $z3){if($z3['time']==="12:30-01:50" AND $z3['date']==='SU'){echo nl2br($z3['course_name']."\nsec:".$z3['section']);}}?></td>
                        <td id="4-4"><?php foreach ($output as $z4){if($z4['time']==="12:30-01:50" AND $z4['date']==='MO'){echo nl2br($z4['course_name']."\nsec:".$z4['section']);}}?></td>
                        <td id="4-5"><?php foreach ($output as $z5){if($z5['time']==="12:30-01:50" AND $z5['date']==='SA'){echo nl2br($z5['course_name']."\nsec:".$z5['section']);}}?></td>
                        <td id="4-6"></td>
                        <td id="4-7"><?php foreach ($output as $z6){if($z6['time']==="12:30-01:50" AND $z6['date']==='SA'){echo nl2br($z6['course_name']."\nsec:".$z6['section']);}}?></td>
                    </tr>

                    <tr id="row5">
                        <td><b>02:00 PM-03:20 PM</b></td>
                        <td id="5-1"><?php foreach ($output as $m1){if($m1['time']==="02:00-03:20" AND $m1['date']==='SU'){echo nl2br($m1['course_name']."\nsec:".$m1['section']);}}?></td>
                        <td id="5-2"><?php foreach ($output as $m2){if($m2['time']==="02:00-03:20" AND $m2['date']==='MO'){echo nl2br($m2['course_name']."\nsec:".$m2['section']);}}?></td>
                        <td id="5-3"><?php foreach ($output as $m3){if($m3['time']==="02:00-03:20" AND $m3['date']==='SU'){echo nl2br($m3['course_name']."\nsec:".$m3['section']);}}?></td>
                        <td id="5-4"><?php foreach ($output as $m4){if($m4['time']==="02:00-03:20" AND $m4['date']==='MO'){echo nl2br($m4['course_name']."\nsec:".$m4['section']);}}?></td>
                        <td id="5-5"><?php foreach ($output as $m5){if($m5['time']==="02:00-03:20" AND $m5['date']==='SA'){echo nl2br($m5['course_name']."\nsec:".$m5['section']);}}?></td>
                        <td id="5-6"></td>
                        <td id="5-7"><?php foreach ($output as $m6){if($m6['time']==="02:00-03:20" AND $m6['date']==='SA'){echo nl2br($m6['course_name']."\nsec:".$m6['section']);}}?></td>
                    </tr>

                    <tr id="row6">
                        <td><b>03:30 PM-04:50 PM</b></td>
                        <td id="6-1"><?php foreach ($output as $j1){if($j1['time']==="03:30-04:50" AND $j1['date']==='SU'){echo nl2br($j1['course_name']."\nsec:".$j1['section']);}}?></td>
                        <td id="6-2"><?php foreach ($output as $j2){if($j2['time']==="03:30-04:50" AND $j2['date']==='MO'){echo nl2br($j2['course_name']."\nsec:".$j2['section']);}}?></td>
                        <td id="6-3"><?php foreach ($output as $j3){if($j3['time']==="03:30-04:50" AND $j3['date']==='SU'){echo nl2br($j3['course_name']."\nsec:".$j3['section']);}}?></td>
                        <td id="6-4"><?php foreach ($output as $j4){if($j4['time']==="03:30-04:50" AND $j4['date']==='MO'){echo nl2br($j4['course_name']."\nsec:".$j4['section']);}}?></td>
                        <td id="6-5"><?php foreach ($output as $j5){if($j5['time']==="03:30-04:50" AND $j5['date']==='SA'){echo nl2br($j5['course_name']."\nsec:".$j5['section']);}}?></td>
                        <td id="6-6"></td>
                        <td id="6-7"><?php foreach ($output as $j6){if($j6['time']==="03:30-04:50" AND $j6['date']==='SA'){echo nl2br($j6['course_name']."\nsec:".$j6['section']);}}?></td>
                    </tr>

    
                </tbody></table>




<?php }
 $conn->close();
 ?>

</body>
</html>
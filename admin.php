<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
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
  $query = "SELECT Id FROM students;";
  
  // FETCHING DATA FROM DATABASE
  $result = $conn->query($query);
  
    if ($result->num_rows > 0) 
    {
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    } 
    ?>


<h2 align="center"><u>ADMIN PAGE</u></h2>
<form method="POST" action="index.php">
    <input class="button"  type="submit" value="HOME" style="height:40px; width:90px"/>
  </form>


<div  style="border:2px solid black">
<h3 align="center">ADVISING</h3>
<input placeholder="Search" type="search" id="searchbox" style="width:170px; border: 2px solid black;">
<br/>
<br/>
<form id="countries" style="overflow: visible" method="get">
  <select id="countries" name="options" size="16" style="height:282px;width:167px;" onchange="setTextField(this)">
  <?php 
  foreach ($options as $option) {
  ?>
     <option  value="<?php echo $option['Id'];?>" name="ok" ><?php echo $option['Id']; ?> </option>
    <?php 
    }

   ?>
</select>
<br/>
<br/>
<div>
<input type="submit" value="SELECT" />
  </div>
</form>
<?php
if (isset($_GET["options"])) {
    $enroll= $_GET['options'];
    
    $sql ="select Id,Course1,Course2,Course3,Course4 from students where Id='$enroll';";
    $result = $conn->query($sql);
    $output= mysqli_fetch_all($result, MYSQLI_ASSOC);}
?>

<form id="countries" style="overflow: visible" method="get">
  <select id="countries" name="options2" size="16" style="height:282px;width:167px;" onchange="setTextField(this)">
  <?php 
  foreach ($output as $output) {
  ?>
     <option  value="<?php echo $output['Id']."__"."Course1";?>" name="ok" ><?php echo $output['Course1']; ?> </option>
     <option  value="<?php echo $output['Id']."__"."Course2";?>"  name="ok" ><?php echo $output['Course2']; ?> </option>
     <option  value="<?php echo $output['Id']."__"."Course3";?>"  name="ok" ><?php echo $output['Course3']; ?> </option>
     <option  value="<?php echo $output['Id']."__"."Course4";?>"  name="ok" ><?php echo $output['Course4']; ?> </option>
    <?php 
    }

   ?>
</select>
<br/>
<br/>
<div>
<input type="submit" value="DROP" />
  </div>
</form>
<?php
if (isset($_GET["options2"])) {
    $enroll2= $_GET['options2'];
    $a=explode("__",$enroll2); 
    
    $sql2 ="UPDATE students SET $a[1] = 'NA' WHERE Id='$a[0]'";
    $result = $conn->query($sql2);}

?>

</div>
<br/>
<?php
$query = "SELECT course_name,section FROM course;";
  
// FETCHING DATA FROM DATABASE
$result = $conn->query($query);

  if ($result->num_rows > 0) 
  {
    $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
  } 
  ?>
  <div style="position:relative; top:-700px;left:400px">
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
  <br/>
<div id="abc" style="height:300px; width:700px; border:2px solid white;color:white">
<?php
if (isset($_GET["options"])) {
    $enroll= $_GET['options'];
    $a=explode("__",$enroll); 
    $sql ="select course_name,section,dept,pre_req,credit from course where course_name='$a[0]' and section='$a[1]';";
    $result = $conn->query($sql);
    $output= mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    $sql2 ="select seat_status.section,seat_status.remaining_seat,seat_status.course_name,seat_status.total_seat,timing.date,timing.time,timing.building,faculty.name_initial from 
    ((seat_status inner join faculty on faculty.name_initial=seat_status.name_initial) 
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
        $v=$o['building'];
        $sql3="SELECT type,capacity from building WHERE room_Id='$v'";
        $result3 = $conn->query($sql3);
        $output3= mysqli_fetch_all($result3, MYSQLI_ASSOC);
        foreach ($output3 as $o1){
          echo nl2br("Building Type: ".$o1['type'].".....Capacity: ".$o1['capacity']);
        }
      }
     }

    
    }} ?>

  </div>
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



</body>
</html>
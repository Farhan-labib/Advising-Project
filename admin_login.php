<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <style>
    .center {
  margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
  text-align: center;
}
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
session_start();
  
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
  ?>
  <br/>
  <br/>
  <br/>
  <br/>
  <div  align="center">
    <div id="abc" style="border:2px solid white;width: 300px; height: 300px;color:white;">
  <div style="display: inline-block; text-align: left; ">
  <form  method="POST">

<h2 align="center">ADMIN LOGIN</h2>

<?php if (isset($_GET['error'])) { ?>

    <p class="error"><?php echo $_GET['error']; ?></p>

<?php } ?>

<label>Username</label>
<br/>

<input type="text" name="username" placeholder="Username"/><br/>
<br/>

<label style="text-align:left;">Password</label>
<br/>

<input type="password" name="pass" placeholder="Password"/>
<br/> 
<br/> 

<button type="submit">Login</button>

</form>
</div>
</div>
</div>
<?php

if (isset($_POST['username']) && isset($_POST['pass'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $username = validate($_POST['username']);

    $pass = validate($_POST['pass']);

    if (empty($username)) {

        header("Location: admin_login.php?error=Email address is required");

        exit();

    }else if(empty($pass)){

        header("Location: admin_login.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT name,password FROM admin where name = '$username' and password = '$pass'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count === 1){  
            echo "<h1><center> Login successful </center></h1>";
            $_SESSION['username']=$username;
            header("Location: admin.php");
            exit();
        }else{  
            echo "<h1> Login failed. Invalid username or pass.</h1>";  
            header("Location: admin_login.php?error=Invalid username or password");
            exit();
                }
        }
}?>
</body>
</html>
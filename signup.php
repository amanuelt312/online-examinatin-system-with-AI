<!DOCTYPE html>
<html>
<head>
  <title>Signup Page</title>
  <link rel="stylesheet" type="text/css" href="loginStyle.css">
</head>
<body>
   <?php include 'nav.php'; ?>
  <div class="container">
    <h2>Signup</h2>
    <form method="post">
      <input type="text" name="name" placeholder="Name" required/>
      <input type="text" name="id" placeholder="ID" required/>

      <input type="email" name="email" placeholder="Email" required/>
      <select name="department" required>
    <option value="">Select Department</option>
    <option value="information_technology">Information Technology</option>
    <option value="computer_science">Computer Science</option>
     <option value="software_engineering">Software Engineering</option>
    <option value="Other">Other</option>
  </select>
       <select name="role" required>
    <option value="">Select role</option>
    <option value="student">Student</option>
    <option value="teacher">Teacher</option>
  </select>
      <input type="password" name="pw1" placeholder="Password" required/>
      <input type="password" name="pw2" placeholder="Confirm Password" required/>

      <button type="submit" name="submit" >submit</button>

<p>Have an account?<a href="login.php" >Login</a></p>
    
    </form>

  </div>
</body>

</html>
<?php
if (isset($_POST["submit"])) {

  $name = $_POST["name"];
  $id = $_POST["id"];
  $email = $_POST["email"];
  $department = $_POST['department'];
  $role = $_POST["role"];
  $pw1 = $_POST["pw1"];
  $pw2 = $_POST["pw2"];



  if ($pw1 == $pw2)
    $pw = $pw1;
  else
    die("The passwords doesn't match");
  //connecting to db
  require_once 'database.php';
  $database = new Database();
  $database->signupdatabase($name, $id, $email, $department, $role, $pw);
  $database->closeConnection();

  // $servername = "localhost";
  // $username = "root";
  // $password = "";
  // $dbname = "exam";

  // $conn = mysqli_connect($servername, $username, $password, $dbname);

  // if (!$conn) {
  //   die("Connection failed: " . mysqli_connect_error());
  // }

  //   $sq1 = "SELECT * FROM `users` WHERE  id='$id' ";
//   $result = mysqli_query($conn, $sq1);
//   $count = mysqli_num_rows($result);

  //   if ($count > 0) {
//     echo "account exist";
//   } else {
//     $sql2 = "INSERT INTO users (name, id, email, department,  password,role) 
//         VALUES ('$name', '$id', '$email', '$department','$pw1','$role')";
//     if (mysqli_multi_query($conn, $sql2)) {
//       header('Location:login.php');

  //     } else {
//       echo "Error: " . mysqli_error($conn);
//     }
//   }
}
//updating db

?>

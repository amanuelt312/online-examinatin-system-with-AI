<!DOCTYPE html>
<html>
<head>
  <title>  Login Page</title>
  <link rel="stylesheet" type="text/css" href="loginStyle.css">
</head>
<body>

  <?php include 'nav.php'; ?>
<?php
// session_start();
if (isset($_SESSION['role'])) {
  if ($_SESSION['role'] == "student") {
    header('Location: wellcome.php');
  } else if ($_SESSION['role'] == "teacher") {
    header('Location:teacherInput.php');
  } else if ($_SESSION['role'] == "admin") {
    header('Location:admin.php');
  }
  exit;
}
?>
  <div class="container">
    <h2> Login</h2>
    <form method="post">
      <input type="text" name="userId" placeholder="ID" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="submit" >Login</button>
      
      <p>Need an account?<a href="signup.php" >Signup</a></p>
    </form>
    <?php

    if (isset($_POST["submit"])) {
      $User = $_POST["userId"];
      $Pass = $_POST["password"];

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "exam";


      $conn = mysqli_connect($servername, $username, $password, $dbname);

      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }


      $sql = "SELECT * FROM users WHERE id = '$User' AND password = '$Pass'";
      $result = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($result);

      if ($count == 1) {
        $row = mysqli_fetch_assoc($result);
        // $_SESSION['StudentLoggedin'] = true;
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['name'];

        $_SESSION['loggedin'] = true;
        $role = $row['role'];
        $_SESSION['role'] = $role;
        echo "$role";
        if ($role == "admin") {
          header("Location: admin.php");
        } else if ($role == "student") {
          $_SESSION['StudentDepartment'] = $row['department'];
          header("Location: wellcome.php");
          // Set a cookie for future authentication
          // $expiryTime = time() + (30 * 24 * 60 * 60); // 30 days
          // setcookie('student_cookie', session_id(), $expiryTime, '/');
        } else if ($role == "teacher") {
          header("Location: teacherInput.php");


        }
      } else {
        echo "<h4>Authentication failed</h4>";
      }
      mysqli_close($conn);


    }
    ?>

  </div>
</body>

</html>


<?php
// session_start();
include 'nav.php';

if (isset($_SESSION['role'])) {
  if ($_SESSION['role'] == "student") {
    header('Location: wellcome.php');
  } else if ($_SESSION['role'] == "teacher") {
    header('Location:teacherInput.php');
  }
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Online Exam Portal</title>
  </head>
<style>
 


      body {
        font-family: Arial, sans-serif;
           display: flex;
      flex-direction: column;
      min-height: 100vh;
  margin: 0px;
  background-image: url(bk.png);
  background-size: cover;
  color: white;

      }

      .hero-section {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 50vh;
      
      }

      .hero-content {
        max-width: 600px;
        text-align: center;
        color: white;
      }

      .hero-content h1 {
        font-size: 48px;
        margin-bottom: 20px;
      }

      .hero-content p {
        font-size: 18px;
        margin-bottom: 40px;
      }

      .login-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #0077c5;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        font-size: large;
         font-weight: bold;

      }
       .login-button a{
text-decoration: none;
color:white;
       }
      .login-button:hover {
        background-color: #0f2535;
      }
      .footer {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #333;
        color: white;
        padding: 20px;

      margin-top: auto;
      }
      .card-container {
  display: flex;
  justify-content: center;
  gap: 20px;
  margin-top: 40px;
  margin-bottom: 60px;
}

.card {
  background-color: #0f2535;
  padding: 20px;
  border-radius: 10px;
  width: 300px;
  text-align: center;
}

.card h2 {
  color: white;
  font-size: 24px;
  margin-bottom: 10px;
}

.card p {
  color: #ccc;
  font-size: 16px;
  margin-bottom: 20px;
}

.card-button {
  display: inline-block;
  padding: 8px 16px;
  background-color: #0077c5;
  color: white;
  border-radius: 5px;
  cursor: pointer;
  font-weight: bold;
  text-decoration: none;
}

.card-button:hover {
  background-color: #0f2535;
}
</style>
<body>

<div class="hero-section">
      <div class="hero-content">
        <h1>Welcome to Online Exam</h1>
        <p>
          The best platform for students and teachers to create and take exams
          online.
        </p>
        <a href="login.php"><button class="login-button">Login</button></a>
      </div>
    </div>
    <div class="card-container">
  <div class="card">
    <h2>Students</h2>
    <p>Are you a student? Access exams and test your knowledge.</p>
    <a href="login.php" class="card-button">Student Login</a>
  </div>
  <div class="card">
    <h2>Teachers</h2>
    <p>Are you a teacher? Create and manage exams for your students.</p>
    <a href="login.php" class="card-button">Teacher Login</a>
  </div>
</div>
    <div class="footer">
      <p>© 2023 Online Exam. All rights reserved.</p>
    </div>
</body>
</html>

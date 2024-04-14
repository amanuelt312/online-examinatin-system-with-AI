
<!DOCTYPE html>
<html lang="en">
<head>
  <style>
  
    .nav-bar {
      
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #333;
            color: white;
            padding: 0px 20px;
        }

        .nav-bar a {
            text-decoration: none;
            color: white;
        }

        .nav-bar ul {
            display: flex;
            list-style: none;
        }

        .nav-bar li {
            margin-left: 20px;
        }
  </style>
</head>
<body>
    <nav>

      <div class="nav-bar">
        <a href="index.php"><h2>Online Exam</h2></a>
        <ul>
            <li><a href="aboutus/aboutUs.php">About</a></li>
            <li><a href="contactus/contact.php">Contact</a></li>
            <li>
              <?php
              session_start();

              if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                echo '<a href="logout.php">Logout</a>';
              } else {
                echo '<a href="login.php">Login</a>';
              }
              ?>
            </li>

        </ul>
    </div>
    </nav>
</body>
</html>


<?php
include 'nav.php';
$role = $_SESSION['role'];
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $role != "teacher") {

  header('Location: login.php');
  exit;
}
?>


<?php
if (isset($_POST["submit"])) {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "exam";
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $teacherID = $_SESSION['id'];
  $questionText = $_POST["question"];
  $questionType = $_POST["question_type"];
  $option1 = $_POST["option1"];
  $option2 = $_POST["option2"];
  $option3 = $_POST["option3"];
  $option4 = $_POST["option4"];
  $correctAnswer = $_POST["correct_answer"];
  $departemet = $_POST["departemet"];

  $query = "INSERT INTO question (teacherID,department,text_question, question_type, option1, option2, option3, option4, correct_answer)
            VALUES ('$teacherID','$departemet','$questionText', '$questionType', '$option1', '$option2', '$option3', '$option4', '$correctAnswer')";

  if (mysqli_query($conn, $query)) {
    echo "Question added successfully!";
  } else {
    echo "Error: " . mysqli_error($conn);
  }


  mysqli_close($conn);
  // header('Location: ' . $_SERVER['REQUEST_URI']);
  header('Location: ' . $_SERVER['REQUEST_URI']);
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Question Entry Form</title>
  <style>
     body {
    font-family: Arial, sans-serif;
    margin: 0;
    background-image: url(bk.png);
    color: white  ;
    /* padding: 20px; */
  }

  form {
     display: flex;
     flex-direction: column;
    color: #01012e;
    float: left;
    margin: 20px;  
    background-color: #f5f5f5;
    padding: 40px;
    border-radius: 5px;
    width: 20%;
  }

  label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
  }

  select, textarea, input[type="text"], input[type="submit"] {
    /* margin-bottom: 10px;
    width: 100%;
    padding: 10px;
    margin-right: 30px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
     */
     display: block;
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  }

  input[type="submit"] {
    background-color: #0077c5;
    width: 30%;
    color: #fff;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #0f2535;
  }

  .question-list {
    float: right;
    width: 40%;
  }
  
h1 {
  margin: 20px;  
  }
  h2 {
    font-size: 24px;
    margin-bottom: 10px;
  }

  h3 {
    font-size: 18px;
    margin-bottom: 5px;
  }

  p {
    font-size: 14px;
    margin-bottom: 5px;
  }

  hr {
    border: none;
    border-top: 1px solid #ccc;
    /* margin: 10px 0; */
  }

  button[type="submit"] {
    background-color: #f44336;
    color: #fff;
    padding: 5px 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
    position: absolute;
    
  }

  button[type="submit"]:hover {
    background-color: #d32f2f;
  }
   
    
  </style>
</head>
<body>
  <h1>Question Entry Form</h1>
  <form method="post">
    <label for="option1">Department:</label>
      <select name="departemet" id="departemet" required>
        <option value="information_technology">Information Technology</option>
        <option value="computer_science">Computer Science</option>
        <option value="software_engineering">Software Engineering</option>
        <option value="Other">Other</option>
      </select>

      <label for="question_type">Question Type:</label>
      <select name="question_type" id="question_type" required>
        <option value="multiple_choice">Multiple Choice</option>
        <option value="true_false">True/False</option>
        <option value="fill_in_the_blank">Fill in the Blank</option>
      </select>

    <label for="question">Question:</label>
    <textarea name="question" id="question" rows="3" required></textarea>


    <div id="options-container">
      <label for="option1">Option 1:</label>
      <input type="text" name="option1" id="option1" >

      <label for="option2">Option 2:</label>
      <input type="text" name="option2" id="option2" >

      <label for="option3">Option 3:</label>
      <input type="text" name="option3" id="option3" >

      <label for="option4">Option 4:</label>
      <input type="text" name="option4" id="option4" >
    </div>

    <label for="correct_answer">Correct Answer:</label>
    <input type="text" name="correct_answer" id="correct_answer" required>

         <input type="submit" name="submit" value="Submit">
  </form>
<!-- <div class="question-generator"> -->
  <h2>AI Question Generator</h2>
  <div style="width:370px;height:500px; overflow: scroll; color: #01012e;background-color: #f5f5f5; float: left;">
  <form method="post" style="width: 70%;" style="margin:0;d">
    <label>What kind of question do you want:</label>
      <input type="text" name="ai_question" required />
      <label>How much question do you need:</label>
      True or False:
      <input type="number" style="width: 30px;height: 20px; margin-bottom: 5px;" max="12" min="0" name="true_false" >
      Multiple Choice:
      <input type="number" style="width: 30px;height: 20px; margin-bottom: 5px;" max="12" min="0" name="multiple_choice" >
      Fill In The Blank:
      <input type="number" style="width: 30px;height: 20px; margin-bottom: 5px;" max="12" min="0" name="fill_in_the_blank" >
      <input type="submit" name="Aisubmit" value="Generate" required />
      <?php
      require_once 'database.php';
      $database = new Database();
      if (isset($_POST["Aisubmit"])) {
        $aiPrompt = $_POST["ai_question"];
        $numofTorF = $_POST["true_false"];
        $numofmulti = $_POST["multiple_choice"];
        $numoffill = $_POST["fill_in_the_blank"];
        $_SESSION['aiGenerated'] = false;

        if ($numofTorF == "") {
          $numofTorF = 0;
        }
        if ($numofmulti == "") {
          $numofmulti = 0;
        }
        if ($numoffill == "") {
          $numoffill = 0;
        }

        $database->Aiquestion($aiPrompt, $numofTorF + 1, $numofmulti + 1, $numoffill + 1);

      }
      if (isset($_SESSION['aiGenerated']) && $_SESSION['aiGenerated'] == true) {
        echo "<pre>";
        echo ($_SESSION['aiTorFGenerated']);
        echo '</pre>';
        echo "<pre>";
        echo ($_SESSION['aiMultiGenerated']);
        echo '</pre>';
        echo "<pre>";
        echo ($_SESSION['aiFillFGenerated']);
        echo '</pre>';

      }

      ?>
    </form>
  </div>
<!-- </div> -->
<div class="question-list">
    <h2>Added Questions</h2>
    <?php
    require_once 'database.php';


    $database = new Database();

    $database->getQuestions();

    $database->closeConnection();
    ?>
   
  </div>

  <script>
    document.getElementById('question_type').addEventListener('change', function() {
      var questionType = this.value;
      var optionsContainer = document.getElementById('options-container');

      if (questionType === 'true_false' || questionType === 'fill_in_the_blank') {
        optionsContainer.style.display = 'none';
      } else {
        optionsContainer.style.display = 'block';
      }
    });
  </script>
</body>
</html>










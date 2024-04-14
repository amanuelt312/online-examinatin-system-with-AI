 <?php
 class Database
 {
   private $connection;

   public function __construct()
   {
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "exam";
     $this->connection = new mysqli($servername, $username, $password, $dbname);

     if ($this->connection->connect_error) {
       die("Connection failed: " . $this->connection->connect_error);
     }
   }
   public function getConnection()
   {
     return $this->connection;
   }


   public function getQuestions()
   {

     // session_start();    
     //true or false
     $teacherId = $_SESSION['id'];
     $query = "SELECT * FROM question WHERE question_type = 'true_false' AND  teacherID = '$teacherId'";
     $result = $this->connection->query($query);
     $cout1 = 1;
     if ($result && $result->num_rows > 0) {
       echo "<h3>" . "Part One: True or False" . "</h3>";
       while ($row = $result->fetch_assoc()) {

         echo "<form style='width: 55px; padding: 0px;' method='post' action='delete_question.php'>";
         echo "<input type='hidden' name='question_id' value='" . $row['id'] . "'>";
         echo "<button style='position: reilative; float: right;' type='submit' >Delete</button>";

         echo "</form>";
         echo "<p>" . $cout1 . ". " . $row['text_question'] . "</p>";
         echo "<p>Correct Answer: " . $row['correct_answer'] . "</p>";
         echo "<hr>";
         $cout1++;
       }
     } else {
       echo "No true or false questions found.";
     }

     //multiple choose
     $query = "SELECT * FROM question WHERE question_type = 'multiple_choice' AND teacherID = '{$_SESSION['id']}'";
     ;
     $result = $this->connection->query($query);

     if ($result && $result->num_rows > 0) {
       echo "<h3>" . "Part Two: Multiple choice" . "</h3>";
       while ($row = $result->fetch_assoc()) {
         echo "<div class='question'>";
         echo "<form style='width: 55px; padding: 0px;' method='post' action='delete_question.php'>";
         echo "<input type='hidden' name='question_id' value='" . $row['id'] . "'>";
         echo "<button type='submit'>Delete</button>";
         echo "</form>";

         echo "<p>" . $cout1 . ". " . $row['text_question'] . "</p>";
         echo "<p>Options: " . "A, " . $row['option1'] . "    " . "B, " . $row['option2'] . "     " . "C, " . $row['option3'] . "     " . "D, " . $row['option4'] . "</p>";
         echo "<p>Correct Answer: " . $row['correct_answer'] . "</p>";
         echo "</div>";
         echo "<hr>";
         $cout1++;
       }
     } else {
       echo "No multiple questions found.";
     }
     //fil the blank
     $query = "SELECT * FROM question WHERE question_type = 'fill_in_the_blank' AND  teacherID = '{$_SESSION['id']}'";
     $result = $this->connection->query($query);
     if ($result && $result->num_rows > 0) {
       echo "<h3>" . "Part Three: Fill In The Blank" . "</h3>";
       //  $cout1 = 1;
       while ($row = $result->fetch_assoc()) {

         echo "<form style='width: 55px; padding: 0px;' method='post' action='delete_question.php'>";
         echo "<input type='hidden' name='question_id' value='" . $row['id'] . "'>";
         echo "<button type='submit'>Delete</button>";
         echo "</form>";
         echo "<p>" . $cout1 . ". " . $row['text_question'] . "</p>";
         echo "<p>Correct Answer: " . $row['correct_answer'] . "</p>";
         echo "<hr>";
         $cout1++;
       }
     } else {
       echo "No Fill In The Blank questions found.";
     }
   }
   public function studentGetQuestions($Studepartment, $studentid)
   {
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       $studentAnswers = $_POST['answers'];

       // Process and check the answers
       $marks = 0;
       // var_dump($studentAnswers);
       foreach ($studentAnswers as $questionId => $studentAnswer) {

         echo "Question ID: " . $questionId . "<br>";
         echo "Student Answer: " . $studentAnswer . "<br>";
         $query = "SELECT correct_answer FROM question WHERE id = $questionId";
         $result = $this->connection->query($query);
         // echo"cor $result";
         if ($result && $result->num_rows > 0) {
           // echo "we are in ";
           $row = $result->fetch_assoc();
           $correctAnswer = $row['correct_answer'];
           if ($studentAnswer === $correctAnswer) {
             $marks++;
           }
         }
       }


       header("Location: rank.php?mark=$marks");
       exit;


     }

     $query = "SELECT * FROM question WHERE department = '$Studepartment'";
     $result = $this->connection->query($query);

     if ($result && $result->num_rows > 0) {
       echo "<form method='POST'>";

       $cout1 = 1;

       while ($row = $result->fetch_assoc()) {
         $questionId = $row['id'];
         $questionType = $row['question_type'];
         $textQuestion = $row['text_question'];

         echo "<p>" . $cout1 . ". " . $textQuestion . "</p>";

         if ($questionType === 'true_false') {
           echo "<input type='radio' name='answers[" . $questionId . "]' value='True'>True<br>";
           echo "<input type='radio' name='answers[" . $questionId . "]' value='False'>False<br>";
         } elseif ($questionType === 'multiple_choice') {
           echo "<input type='radio' name='answers[" . $questionId . "]' value='A'>" . "A, " . $row['option1'] . "<br>";
           echo "<input type='radio' name='answers[" . $questionId . "]' value='B'>" . "B, " . $row['option2'] . "<br>";
           echo "<input type='radio' name='answers[" . $questionId . "]' value='C'>" . "C, " . $row['option3'] . "<br>";
           echo "<input type='radio' name='answers[" . $questionId . "]' value='D'>" . "D, " . $row['option4'] . "<br>";
         } elseif ($questionType === 'fill_in_the_blank') {
           echo "<input type='text' name='answers[" . $questionId . "]'><br>";
         }

         echo "<hr>";
         $cout1++;
       }

       echo "<input type='submit' value='Submit'>";
       echo "</form>";
     } else {
       echo "No questions found for the selected department.";
     }

   }
   public function saveStudentMarks($studentID, $student_department, $mark)
   {
     $query = "INSERT INTO mark_table (student_id,student_department, mark) VALUES ('$studentID','$student_department', '$mark')";
     $this->connection->query($query);
   }
   public function signupdatabase($name, $id, $email, $department, $role, $pass)
   {
     $sq1 = "SELECT * FROM `users` WHERE  id='$id' ";
     $result = $this->connection->query($sq1);
     if ($result && $result->num_rows > 0) {
       echo "account exist";

     } else {
       $sql2 = "INSERT INTO users (name, id, email, department,  password,role) 
        VALUES ('$name', '$id', '$email', '$department','$pass','$role')";

       if ($this->connection->query($sql2)) {
         header('Location:login.php');
       } else {
         echo "Authontication Failed";
       }
     }
   }


   public function deleteQuestion($questionId)
   {

     $query = "DELETE FROM question WHERE id = '$questionId'";
     $result = $this->connection->query($query);

     if ($result) {
       header('Location: teacherInput.php');
     } else {
       echo "Error deleting question.";
     }
   }

   public function adminDeleteQuestion($adminQuestion_id)
   {
     $query = "DELETE FROM question WHERE id = '$adminQuestion_id'";
     $result = $this->connection->query($query);

     if ($result) {
       header('Location: admin.php');
     } else {
       echo "Error deleting question.";
     }
   }

   public function Aiquestion($aiPrompt, $numofTorF, $numofmulti, $numoffill)
   {
     //  echo $numofTorF;
     require 'vendor/autoload.php';

     //  !isset($_SESSION['aiGenerated']) && $_SESSION['aiGenerated'] ==false
 
     $_SESSION['aiGenerated'] = false;

     $client = OpenAI::client('openaiAPIkey');
     echo "True or False";
     $result1 = $client->completions()->create([
       'model' => 'text-davinci-003',
       'prompt' => "give me $numofTorF True or false questions about $aiPrompt with their answers in the follwing format:Q.PHP is a widely-used open source general-purpose scripting language. </br> Ans.True",
       'max_tokens' => 1500,
       'temperature' => 1,
     ]);
     //  echo "<pre>";
     //  echo ($result1['choices'][0]['text']);
     //  echo '</pre>';
 
     //multi
     //  sleep(2);
     //  echo "Multiple choose questions:";
     $result2 = $client->completions()->create([
       'model' => 'text-davinci-003',
       'prompt' => "give me $numofmulti multiple choose questions about $aiPrompt with four choose and one of them is the right answer.use the following format:Q.Which planet is known as the Red Planet?</br> Choose. A, Venus  B, Mars  C, Saturn  D,Jupiter </br> correct answer: B, Mars",
       'max_tokens' => 1500,
       'temperature' => 1,
     ]);
     //  echo "<pre>";
     //  echo ($result2['choices'][0]['text']);
     //  echo '</pre>';
     // fill in the blank
     //  sleep(5);
     //  echo "Fill in the blank space questions:";
     $result3 = $client->completions()->create([
       'model' => 'text-davinci-003',
       'prompt' => "give me $numoffill fill-in-the-blank questions about $aiPrompt. Use the following format:Q.The sun revolves around the _________.Answer: sun",
       'max_tokens' => 1500,
       'temperature' => 1,
     ]);
     //  echo "<pre>";
     //  echo ($result3['choices'][0]['text']);
     //  echo '</pre>';
     $_SESSION['aiTorFGenerated'] = $result1['choices'][0]['text'];
     $_SESSION['aiMultiGenerated'] = $result2['choices'][0]['text'];
     $_SESSION['aiFillFGenerated'] = $result3['choices'][0]['text'];
     $_SESSION['aiGenerated'] = true;



   }
   public function getAllUsers()
   {
     $query = "SELECT * FROM users";
     $result = $this->connection->query($query);

     if ($result && $result->num_rows > 0) {
       echo "<table>";
       echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Department</th><th>Role</th><th>Delete</th></tr>";

       while ($row = $result->fetch_assoc()) {
         echo "<tr>";
         echo "<td>" . $row['id'] . "</td>";
         echo "<td>" . $row['name'] . "</td>";
         echo "<td>" . $row['email'] . "</td>";
         echo "<td>" . $row['department'] . "</td>";
         echo "<td>" . $row['role'] . "</td>";
         echo "<td>";
         echo "<form style='width: 55px; padding: 0px;' method='post' action='delete_users.php'>";
         echo "<input type='hidden' name='deleteuser_id' value='" . $row['id'] . "'>";
         echo "<button type='submit'>Delete</button>";
         echo "</form>";
         echo "</td>";
         echo "</tr>";
       }

       echo "</table>";
     } else {
       echo "No users found.";
     }
   }
   public function getAllQuestions()
   {
     $query = "SELECT * FROM question";
     $result = $this->connection->query($query);

     if ($result && $result->num_rows > 0) {
       echo "<table>";
       echo "<tr><th>Teacher ID</th><th>Question</th><th>Department</th><th>Delete</th></tr>";
       while ($row = $result->fetch_assoc()) {
         echo "<td>" . $row['teacherID'] . "</td>";
         echo "<td>" . $row['text_question'] . "</td>";
         echo "<td>" . $row['department'] . "</td>";
         echo "<td>";
         echo "<form style='width: 55px; padding: 0px;' method='post' action='adminDeletQ.php'>";
         echo "<input type='hidden' name='adminQuestion_id' value='" . $row['id'] . "'>";
         echo "<button type='submit'>Delete</button>";
         echo "</form>";
         echo "</td>";
         echo "</tr>";
       }
       echo "</table>";
     } else {
       echo "No users found.";

     }
   }
   public function deleteUser($deleteuser_id)
   {

     $query = "DELETE FROM users WHERE id = '$deleteuser_id'";
     $result = $this->connection->query($query);
     if ($result) {
       header('Location: admin.php');
     } else {
       echo "Error deleting question.";
     }
   }
   public function addContactMessage($fname, $sname, $email, $message)
   {
     $query = "INSERT INTO contact (fname,sname,email, message) VALUES ('$fname','$sname','$email', '$message')";
     $result = $this->connection->query($query);
     if ($result) {
       echo "<h2 style='color:white;'>Message sent successfully</h2>";
     } else {
       echo "<h2>Message not sent successfully</h2>";
     }
   }
   public function getAllContactMessages()
   {
     $query = "SELECT * FROM contact";
     $result = $this->connection->query($query);
     if ($result && $result->num_rows > 0) {
       echo "<table>";
       echo "<tr><th>First Name</th><th>second name</th><th>Email</th><th>Message</th><th>Delete</th></tr>";
       while ($row = $result->fetch_assoc()) {
         echo "<td>" . $row['fname'] . "</td>";
         echo "<td>" . $row['sname'] . "</td>";
         echo "<td>" . $row['email'] . "</td>";
         echo "<td>" . $row['message'] . "</td>";

         echo "<td>";
         echo "<form style='width: 55px; padding: 0px;' method='post' action='adminDeletM.php'>";
         echo "<input type='hidden' name='adminMessage_id' value='" . $row['id'] . "'>";
         echo "<button type='submit'>Delete</button>";
         echo "</form>";
         echo "</td>";
         echo "</tr>";
       }
       echo "</table>";
     } else {
       echo "No users found.";

     }
   }
   public function adminDeleteMessage($adminMessage_id)
   {
     $query = "DELETE FROM contact WHERE id = '$adminMessage_id'";
     $result = $this->connection->query($query);
     if ($result) {
       header('Location: admin.php');
     } else {
       echo "Error deleting question.";
     }
   }
   public function closeConnection()
   {
     $this->connection->close();
   }
 }



 ?>

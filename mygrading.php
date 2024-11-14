<?php
include 'navigation_bar.php';
$dbc = mysqli_connect("localhost", "csc350", "xampp", "Mygrading");
if (!$dbc) {
    die("Connection failed: If you're the hacker, we are not using mysql trust me");
}


if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
} else {
    die("You didn't select any student");
}


$result = mysqli_query($dbc, "SELECT * FROM Students WHERE student_id = $student_id");
$student = mysqli_fetch_assoc($result);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $Homework_1 = $_POST['Homework_1'];
    $Homework_2 = $_POST['Homework_2'];
    $Homework_3 = $_POST['Homework_3'];
    $Homework_4 = $_POST['Homework_4'];
    $Homework_5 = $_POST['Homework_5'];
    $Quizz_1 = $_POST['Quizz_1'];
    $Quizz_2 = $_POST['Quizz_2'];
    $Quizz_3 = $_POST['Quizz_3'];
    $Quizz_4 = $_POST['Quizz_4'];
    $Quizz_5 = $_POST['Quizz_5'];
    $Midterm = $_POST['Midterm'];
    $Final = $_POST['Final'];

    
    $query = "INSERT INTO Grades (student_id, Homework_1, Homework_2, Homework_3, Homework_4, Homework_5, 
              Quizz_1, Quizz_2, Quizz_3, Quizz_4, Quizz_5, Midterm, Final) 

              VALUES ($student_id, $Homework_1, $Homework_2, $Homework_3, $Homework_4, $Homework_5, 
                      $Quizz_1, $Quizz_2, $Quizz_3, $Quizz_4, $Quizz_5, $Midterm, $Final)

              ON DUPLICATE KEY UPDATE
              
              Homework_1 = $Homework_1, Homework_2 = $Homework_2, Homework_3 = $Homework_3, Homework_4 = $Homework_4, 
              Homework_5 = $Homework_5, Quizz_1 = $Quizz_1, Quizz_2 = $Quizz_2, Quizz_3 = $Quizz_3, 
              Quizz_4 = $Quizz_4, Quizz_5 = $Quizz_5, Midterm = $Midterm, Final = $Final";

    mysqli_query($dbc, $query);

    echo "<p>Grades successfully updated for " . htmlspecialchars($student['first_name']) . " " . htmlspecialchars($student['last_name']) . ".</p>";
}
?>


<form method="post">
    <h2>Enter Grades for <?php echo htmlspecialchars($student['first_name']) . " " . htmlspecialchars($student['last_name']); ?></h2>
    <table style="border: 1px solid black; border-collapse: collapse; width: 100%;">
        <tr style="background-color: #f2f2f2;">
            <th>Homework 1:</th>
            <td><input type="number"  min=0 max=110 name="Homework_1" required></td>
        </tr>
        <tr>
            <th>Homework 2:</th>
            <td><input type="number" min=0 max=110 name="Homework_2" required></td>
        </tr>
        <tr style="background-color: #f2f2f2;">
            <th>Homework 3:</th>
            <td><input type="number"  min=0 max=110 name="Homework_3" required></td>
        </tr>
        <tr>
            <th>Homework 4:</th>
            <td><input type="number" min=0 max=110 name="Homework_4" required></td>
        </tr>
        <tr style="background-color: #f2f2f2;">
            <th>Homework 5:</th>
            <td><input type="number" min=0 max=110 name="Homework_5" required></td>
        </tr>
        <tr>
            <th>Quiz 1:</th>
            <td><input type="number" min=0 max=110 name="Quizz_1" required></td>
        </tr>
        <tr style="background-color: #f2f2f2;">
            <th>Quiz 2:</th>
            <td><input type="number" min=0 max=110 name="Quizz_2" required></td>
        </tr>
        <tr>
            <th>Quiz 3:</th>
            <td><input type="number" min=0 max=110 name="Quizz_3" required></td>
        </tr>
        <tr style="background-color: #f2f2f2;">
            <th>Quiz 4:</th>
            <td><input type="number" min=0 max=110 name="Quizz_4" required></td>
        </tr>
        <tr>
            <th>Quiz 5:</th>
            <td><input type="number" min=0 max=110 name="Quizz_5" required></td>
        </tr>
        <tr style="background-color: #f2f2f2;">
            <th>Midterm:</th>
            <td><input type="number" min=0 max=110 name="Midterm" required></td>
        </tr>
        <tr>
            <th>Final:</th>
            <td><input type="number" min=0 max=110 name="Final" required></td>
        </tr>
    </table>
    <br>
    <button type="submit">Submit Grades</button>
</form>

<br><a href="mygrades.php">View the Grades</a>
<br><a href="mystudents.php">Go back</a>

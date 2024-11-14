<?php
include 'navigation_bar.php';
$dbc = mysqli_connect("localhost", "csc350", "xampp", "Mygrading");
if (!$dbc) {
    die("Connection failed: If you're the hacker, we are not using mysql trust me");
}

$query = "SELECT s.student_id, s.first_name, s.last_name, 
                 g.Homework_1, g.Homework_2, g.Homework_3, g.Homework_4, g.Homework_5, 
                 g.Quizz_1, g.Quizz_2, g.Quizz_3, g.Quizz_4, g.Quizz_5, 
                 g.Midterm, g.Final 
          FROM Students s
          JOIN Grades g ON s.student_id = g.student_id";
$result = mysqli_query($dbc, $query);

echo "<h1>Grades Summary</h1>";
echo "<table style='border: 1px solid black; border-collapse: collapse; width: 100%;'>";
echo "<tr style='background-color: #f2f2f2;'>
        <th style='border: 1px solid black; padding: 8px;'>Student ID</th>
        <th style='border: 1px solid black; padding: 8px;'>Name</th>
        <th style='border: 1px solid black; padding: 8px;'>Homework Avg</th>
        <th style='border: 1px solid black; padding: 8px;'>Quizzes Avg</th>
        <th style='border: 1px solid black; padding: 8px;'>Midterm</th>
        <th style='border: 1px solid black; padding: 8px;'>Final Project</th>
        <th style='border: 1px solid black; padding: 8px;'>Final Grade</th>
      </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    $student_id = $row['student_id'];
    $name = htmlspecialchars($row['first_name'] . " " . $row['last_name']);

    $homework_scores = [$row['Homework_1'], $row['Homework_2'], $row['Homework_3'], $row['Homework_4'], $row['Homework_5']];
    $homework_avg = array_sum($homework_scores) / count($homework_scores);
    $weighted_homework = $homework_avg * 0.2;

    $quiz_scores = [$row['Quizz_1'], $row['Quizz_2'], $row['Quizz_3'], $row['Quizz_4'], $row['Quizz_5']];
    sort($quiz_scores); 
    array_shift($quiz_scores);
    $quiz_avg = array_sum($quiz_scores) / count($quiz_scores);
    $weighted_quiz = $quiz_avg * 0.1;

    $midterm = $row['Midterm'];
    $final_project = $row['Final'];
    $weighted_midterm = $midterm * 0.3;
    $weighted_final = $final_project * 0.4;

    $final_grade = $weighted_homework + $weighted_quiz + $weighted_midterm + $weighted_final;
    $final_grade = round($final_grade);

    echo "<tr>
            <td style='border: 1px solid black; padding: 8px;'>$student_id</td>
            <td style='border: 1px solid black; padding: 8px;'>$name</td>
            <td style='border: 1px solid black; padding: 8px;'>" . round($homework_avg, 2) . "</td>
            <td style='border: 1px solid black; padding: 8px;'>" . round($quiz_avg, 2) . "</td>
            <td style='border: 1px solid black; padding: 8px;'>$midterm</td>
            <td style='border: 1px solid black; padding: 8px;'>$final_project</td>
            <td style='border: 1px solid black; padding: 8px;'>" . round($final_grade, 2) . "</td>
          </tr>";
}

echo "</table>";
mysqli_close($dbc);
?>
<br><a href="mystudents.php">Go back</a>

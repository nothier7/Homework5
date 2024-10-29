<?php

$dbc = mysqli_connect("localhost", "csc350", "xampp", "Mygrading");
if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}


$result = mysqli_query($dbc, "SELECT * FROM Students");

?>
<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>
    <h2>Select a Student</h2>
    <ul>
        <?php while ($student = mysqli_fetch_assoc($result)): ?>
            <li>
                <a href="mygrading.php?student_id=<?= $student['student_id'] ?>">
                    <?= htmlspecialchars($student['first_name'] . ' ' . $student['last_name']) ?>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>

<?php

mysqli_close($dbc);
?>

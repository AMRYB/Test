<?php
// بدء الجلسة للتأكد من أن المستخدم مسجل الدخول
session_start();

// التحقق مما إذا كان المستخدم مسجل الدخول (يمكنك تخصيص هذه الخطوة للتحقق من حقوق المدير)
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}

// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// معالجة بيانات النموذج بعد الإرسال
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $grade = $_POST['grade'];

    $sql = "INSERT INTO students (username, password, grade) VALUES ('$username', '$password', '$grade')";

    if ($conn->query($sql) === TRUE) {
        echo "New student record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h1>Add Student</h1>
        <form action="add_student.php" method="post">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="grade">Grade:</label>
                <input type="number" id="grade" name="grade" required>
            </div>
            <button type="submit">Add Student</button>
        </form>
    </div>
</body>
</html>

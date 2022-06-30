<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST["submit"])) {
        echo "yes";
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $class = $_POST['class'];
        $password = $_POST['password'];
    }
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=phptest', 'root', 'database123');
        echo "You have connected!";
        $statement = $pdo->query("INSERT INTO users (NAME, pwd, gender, email, class) VALUES ('$name', '$password', '$gender', '$email', '$class')");
    } catch (PDOException $ex) {
        $error = $ex->getMessage();
        echo $error;
        exit();
    }
    ?>


</body>

</html>
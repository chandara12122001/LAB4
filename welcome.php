<?php
    require './vendor/autoload.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        session_start();
    ?>
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
        $fluent = new \Envms\FluentPDO\Query($pdo);
        $value = array('NAME'=>$name, 'pwd'=>$password, 'gender'=>$gender, 'email'=>$email, 'class'=>$class);
        $statement = $fluent->insertInto('users')->values($value)->execute();
        $_SESSION['user'] = $name;
    } catch (PDOException $ex) {
        $error = $ex->getMessage();
        echo $error;
        exit();
    }
    header("Location: ./src/view/index.php");
    ?>


</body>

</html>
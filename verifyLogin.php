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
        $password = $_POST['password'];
    }

    try {
        $username="";
        $pwd="";
        $pdo = new PDO('mysql:host=localhost;dbname=phptest', 'root', '');
        echo "You have connected!";
        // $fluent = new \Envms\FluentPDO\Query($pdo);
        // $statement = $fluent->from('users')->where('name', $name)->fetch();
        // print_r($statement)
        $statement = $pdo->query("select NAME, pwd from users where NAME = '$name'");
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $username=($row['NAME']);
            $pwd = ($row['pwd']);
        }
    } catch (PDOException $ex) {
        $error = $ex->getMessage();
        echo $error;
        exit();
        // die(json_encode(array('outcome' => false, 'message' => 'Unable to Connect')));
    }
    if($username == $name && $password === $pwd){
        $_SESSION['user']=$username;
        echo "You are logged in as ".$username;
    }

    header("Location: ./src/view/index.php");
    ?>


</body>

</html>
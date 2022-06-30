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
        $password = $_POST['password'];
    }

    try {
        $username="";
        $pwd="";
        $pdo = new PDO('mysql:host=localhost;dbname=phptest', 'root', 'database123');
        echo "You have connected!";
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
    if($username && $password === $pwd){
        echo "You are logged in as ".$username;
    }
    ?>


</body>

</html>
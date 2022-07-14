<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "<h1>helloworld </h1>";
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=phptest', 'root', '');
        echo "You have connected!";
        $statement = $pdo->query("select * from users");
        echo '<table border="1">'. "\n";
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>";
            echo ($row['user_id']);
            echo "</td><td>";
            echo ($row['NAME']);
            echo "</td></tr>";
        }
    } catch (PDOException $ex) {
        $error = $ex->getMessage();
        echo $error;
        exit();
        // die(json_encode(array('outcome' => false, 'message' => 'Unable to Connect')));
    }
    echo "</table>\n";
    ?>

    <?php
    function insertData(){
        $sql = "INSERT INTO users (NAME) values (:name);";
        echo ("<pre>\n".$sql."\n</pre>\n");
            
    }
    ?>
</body>

</html>
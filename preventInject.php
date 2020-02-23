<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    Username: <input type="text" name="txtus" id="txtus"><br>
    Password: <input type="text" name="txtps" id="txtps"><br>    
    <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>

<?php
if(isset($_POST["submit"])){
    $host = "mdb-b.computing.psu.ac.th:6306";
    $user = "miseqas";
    $pass = "EIzvwAmAbmjuq20L";
    $nameDB = "miseqas";

    $dbConnection = new PDO('mysql:dbname='.$nameDB.';host='.$host.';charset=utf8', $user, $pass);
    $dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $us = $_POST["txtus"];
    $stmt = $dbConnection->prepare('SELECT * FROM staff_login WHERE user_name = :name');

    $stmt->execute(array('name' => $us));

    foreach ($stmt as $row) {
        // Do something with $row
        var_dump($row);
    }


    
    }

?>
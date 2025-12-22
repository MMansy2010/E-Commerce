
<?php

$host = 'localhost';
$db_name = "task";
$user_name = "root";
$password = "";
?>

<?php
    try{
        $connection = mysqli_connect($host, $user_name, $password, $db_name);

    }
    catch(Exception $e){
        echo "Connection failed: " . $e->getMessage();

    }
?>

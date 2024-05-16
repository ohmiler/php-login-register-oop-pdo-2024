<?php 

    include_once("config/Database.php");
    include_once("class/UserLogin.php");

    $connectDB = new Database();
    $db = $connectDB->getConnection();

    $user = new UserLogin($db);
    $user->logOut();

?>
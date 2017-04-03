<?php

    //Si es desconecta el usuari li borrem la cookie
    $db = new PDO('mysql:host=localhost;dbname=practica', 'root', '');
    $cookie = $_COOKIE["guest"];
    $rows = $db->query("DELETE FROM cookie WHERE c_key = '$cookie' ");
    if(!$rows){
        print_r($db->errorInfo());
    }
    $rows->execute();

    setcookie("guest", "", time() -3600*60*24*7, "/" );
    //session_start();
    ///unset($_SESSION['id']);
    //unset($_SESSION['guest']);
    header("Location: index.php");

?>
<?php
 /* POST
 /* INICIO

 */

 if(! empty($_POST)){
     $username = htmlentities($_POST['username']);
     $email = htmlentities($_POST['email']);
     $birthday = htmlentities($_POST['birthdate']);
     $password = htmlentities($_POST['password']);

     $db1 = new PDO('mysql:host=localhost;dbname=practica', 'root', '');
     $rows = $db1->query('SELECT * FROM user');

     // comprova que existeixi el email i desprès comprova que el password sigui correcte.

     $db = new PDO('mysql:host=localhost;dbname=practica', 'root', '');

     $statement = $db->prepare("INSERT INTO user(username, email, birthdate,password) VALUES(:username, :email,:birthday, :password) ");
     $statement->bindParam(':username', $username, PDO::PARAM_STR);
     $statement->bindParam(':email', $email, PDO::PARAM_STR);
     $statement->bindParam(':birthday', $birthday, PDO::PARAM_STR);
     $statement->bindParam(':password', $password, PDO::PARAM_STR);

     if(!$statement){
         print_r($db->errorInfo());
     }
     $statement->execute();


     setcookie("guest", $email, time() + 3600 * 60 * 24 * 7);


 }

 header('Location: login.html');

 ?>
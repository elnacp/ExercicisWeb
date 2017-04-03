<?php


if(! empty($_POST)) {


    $title = htmlentities($_POST['title']);
    $content = htmlentities($_POST['content']);
    $temps = date("Y-m-d H:i:s");
    $dia = date("Y-m-d H:i:s");




    // S'HAURA DE CANVIAR PER EL USUARI QUE ESTA LOGEJAT
    //$useru = $_COOKIE["guest"];

    $db1 = new PDO('mysql:host=localhost;dbname=practica', 'root', '');
    $rows = $db1->query('SELECT * FROM cookie');

    // comprova que existeixi el email i desprès comprova que el password sigui correcte.
    $useru = "";
    foreach ($rows as $row){
        $useru = $row['usuari'];
        //echo $row['password'].' '.$row['email'];
    }



    $db = new PDO('mysql:host=localhost;dbname=practica', 'root', '');

    $statement = $db->prepare("INSERT INTO practica.entrada(user_id,title, content, created_at, dia) VALUES(:useru,:title, :content, :temps, :dia) ");
    $statement->bindParam(':useru', $useru, PDO::PARAM_STR);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':content', $content, PDO::PARAM_STR);
    $statement->bindParam(':temps', $temps, PDO::PARAM_STR);
    $statement->bindParam(':dia', $dia, PDO::PARAM_STR);

    if(!$statement){
        print_r($db->errorInfo());
    }
    $statement->execute();


    header('Location: logout.php');


}




?>
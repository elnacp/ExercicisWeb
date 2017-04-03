<?php

/*$db = new PDO('mysql:host=localhost;dbname=practica', 'root', '');
$rows = $db->query('SELECT * FROM user');
/*foreach ($rows as $row){
    echo $row['password'].' '.$row['email'];
}*/

if(! empty($_POST)){
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);


    $db = new PDO('mysql:host=localhost;dbname=practica', 'root', '');
    $rows = $db->query('SELECT * FROM user');
    $ok = false;
    // comprova que existeixi el email i desprès comprova que el password sigui correcte.

    foreach ($rows as $row){
        if($row['email'] == $email){
            if($row['password'] == $password) {
                $ok = true;
                //$valorCookie =$row['username'] . $row['password'];
                $username = $row['id'];
                $cookie = generadorClaus(50);
                echo "user".$username ."\n";
                echo "cookie".$cookie."\n";
                $db1 = new PDO('mysql:host=localhost;dbname=practica', 'root', '');
                $statement = $db1->prepare('INSERT INTO cookie(usuari, c_key) VALUES(:username, :cookie)');
                $statement->bindParam(':username', $username, PDO::PARAM_STR);
                $statement->bindParam(':cookie', $cookie, PDO::PARAM_STR);
                if(!$statement){
                    print_r($db1->errorInfo());
                }
                $statement->execute();
                setcookie("guest", $cookie , time() + 3600 * 60 * 24 * 7);
                header('Location: logout.php');

            }
        }

    }

    // si no es correcte el redirigeix a la pagina de login

    if( $ok == false){

        header('Location: login_page.php');
    }

    //header('Location: proves.php');

    if(!$rows){
        print_r($db->errorInfo());
    }
    $rows->execute();


}

function generadorClaus($l){
    $clau = '';
    $s = '123456789abcdefghijklmnopqrstuvwxyz';
    $d1 = strlen($s)-1;
    for ( $i=0; $i<$l; $i++){
        $clau .= $s{mt_rand(0, $d1)};
        return $clau;
    }

}




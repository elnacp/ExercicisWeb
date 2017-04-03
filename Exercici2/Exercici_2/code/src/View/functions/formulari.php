<?php
/**
 * Created by PhpStorm.
 * User: elnacabotparedes
 * Date: 1/4/17
 * Time: 17:34
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add - To do list</title>
</head>
<body>
<h2> ADD TASK </h2>
<form method="POST" action="/task/add" action="addDB.php">
    <input type="text" name="title" id="title" placeholder="New task" required/>
    <button type="submit" > ADD</button>
</form>

</body>
</html>


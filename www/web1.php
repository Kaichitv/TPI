<?php

if(isset($_POST["user"]))
{
  $user = filter_input(INPUT_POST, "user", FILTER_SANITIZE_STRING);  
}
if(isset($_POST["password"]))
{
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
}

if(isset($user) == "Admin" && isset($password) == "Super")
{
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        User: <input type="text" name="user">
        Password : <input type="password" name="password">
        <input type="submit" id="send">
    </form>
</body>

</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <fieldset>
        <legend>Personal information:</legend>
        Name:<br>
        <input type="text" name="name"><br>
        Email:<br>
        <input type="text" name="Email"><br>
        PhoneNumber<br/>
        <input type="text" name="PhoneNumber"><br>
        <br>
        <input type="submit">
    </fieldset>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] = "POST") {
    $Name = $_POST["name"];
    $Email = $_POST["Email"];
    $PhoneNumber = $_POST["PhoneNumber"];
    if (empty($Name) || empty($PhoneNumber) || empty($Email)) {
        echo "empty . pls input";
    } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        echo "mail wrong.input again";
    } else {
        if (file_exists('user.json')) {
            $valueJson = file_get_contents('user.json');
            $converJsonArray = json_decode($valueJson, true);
            $elementInput = array(
                'name' => $Name,
                'email' => $Email,
                'phone' => $PhoneNumber
            );
            array_push($converJsonArray, $elementInput);
            $newFileJson = json_encode($converJsonArray);
            file_put_contents('user.json', $newFileJson);
            echo "input sucsesed";
        } else {
            echo "file json does not exit";
        }
    }
}
?>
</body>
</html>
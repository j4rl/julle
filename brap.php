<!DOCTYPE html>
<?php
$textmassa="";

if(isset($_POST['btn'])){
    $from_hidden=$_POST['hide_me'];
    $from_text=$_POST['text'];
    $textmassa=$from_hidden." ".$from_text;
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="brap.php" method="POST">
        <input list="list" type="text" name="text" id="text">
        <datalist name="list" id="list">
            <option value="Olle">Olle</option>
            <option value="Anna">Anna</option>
            <option value="Anna-Lisa">Anna-Lisa</option>
        </datalist>
        <input type="hidden" name="hide_me" value="<?=$textmassa?>">
        <input type="submit" name="btn" value="Jamen, åh!">
    </form>
    <div>
        <h1><?=$textmassa?></h1>
    </div>
</body>
</html>
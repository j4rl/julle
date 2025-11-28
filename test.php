<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<?php require_once("_header.php"); ?>
<?php require_once("_nav.php"); ?>

<?php
    $intAntal=36;
    $strNamn="Gustav Adolf V";
    for($vdo=1;$vdo<11;$vdo++){
        echo "Varv: ".$vdo."<br>";
    }
?>

<?php require_once("_footer.php"); ?>
</body>
</html>
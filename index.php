<!DOCTYPE html>
<?php
$host="localhost";
$user="root";
$pass="";
$dbname="britt";
$conn=mysqli_connect($host,$user,$pass,$dbname);


if(isset($_POST['btn'])){
    $texten=$_POST['txt'];
    $besk=$_POST['desc'];
    $sql="INSERT INTO linx(url,description) VALUES ('$texten', '$besk')";
    $result=mysqli_query($conn,$sql);
}
   

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" name="txt" placeholder="Ange en länk" required>
        <input type="text" name="desc" placeholder="Ange en beskrivning" required>
        <input type="submit" value="Lagra länk" name="btn">
    </form>
    <?php
    $sql="SELECT * FROM linx";
    $result=mysqli_query($conn,$sql);

    while($row=mysqli_fetch_assoc($result)){  ?>
    
        <a href="<?=$row['url']; ?>"><?=$row['description']; ?></a><br>
        
 <?php   }  ?>
</body>
</html>
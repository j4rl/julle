<!DOCTYPE html>
<?php
session_start();

$host="localhost";
$user="root";
$pass="";
$db="julle";

$login=isset($_SESSION['user']) ? true : false;
$show_username=$_SESSION['user'] ?? "loser!";

$connection_to_db=mysqli_connect($host,$user,$pass,$db);

if(isset($_POST['btn_login'])){
    $user=$_POST['user'];
    $pass=md5($_POST['pass']);
    $sql="SELECT * FROM users WHERE username='$user'";
    $result=mysqli_query($connection_to_db, $sql);
    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_assoc($result);
        if($pass==$row['password']){
            $_SESSION['user']=$row['username'];
            $_SESSION['level']=$row['userlevel'];
        }else{
            $_SESSION['user']=null;
            $_SESSION['level']=null;
        }
    }else{
        $_SESSION['user']=null;
        $_SESSION['level']=null;
    }

}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="app.js"></script>
</head>
<body>
<?php require_once("_header.php"); ?>
<?php require_once("_nav.php"); ?>
<main>
    <section>
        <?php if(!$login): ?>
        <form action="index.php" method="post">
            <input type="text" name="user" id="user" placeholder="Användarnamn" required>
            <input type="password" name="pass" id="pass" placeholder="Lösenord" required>
            <input type="submit" value="Logga in" name="btn_login">
        </form>
        <?php else: ?>
            <h1>Inloggad!</h1>
        <?php endif ?>
    </section>
<section>
    <h2>Välkommen <?php echo $show_username; ?></h2>
</section>
</main>
<?php require_once("_footer.php"); ?>
</body>
</html>


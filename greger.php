<!DOCTYPE html>
<?php
$host="localhost";
$user="root";
$pass="";
$db="db_phpex";
$conn=mysqli_connect($host, $user,$pass,$db);

if(isset($_POST['btn'])){
    $namn=$_POST['name'];
    $sql="INSERT INTO users(name) VALUES ('$namn')";
    $result=mysqli_query($conn, $sql);
}
$names = [];
$sql = "SELECT name FROM users ORDER BY name";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $names[] = $row['name'];
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
    <form action="greger.php" method="POST">
        <input list="list" type="text" name="name" placeholder="Skriv namn" id="name" oninput="updateList()" autocomplete="off">
        <datalist name="list" id="list"></datalist>

        <input type="submit" value="Lägg in namn" name="btn">
    </form>

</body>
</html>
<script>
        const names = <?=json_encode($names, JSON_UNESCAPED_UNICODE) ?>;

        function updateList() {
        const input = document.getElementById("name");
        const list  = document.getElementById("list");
        const q = input.value.toLowerCase().trim();

        list.innerHTML = names
            .filter(n => n.toLowerCase().startsWith(q))
            .slice(0, 30)
            .map(n => '<option value="'+n+'">'+n+'</option>')
            .join("");
            if(list.innerHTML === "") {
                input.classList.add("green");
                input.classList.remove("red");
            }else {
                input.classList.remove("green");
                input.classList.add("red");
            }
        }

</script>


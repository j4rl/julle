<!DOCTYPE html>
<?php
$host="localhost";
$user="root";
$pass="";
$db="db_phpex";  //Dessa är variabler för att koppla sig till databasen
$conn=mysqli_connect($host, $user,$pass,$db); //Skapar en koppling till databasen

if(isset($_POST['btn'])){ //Kollar om knappen är tryckt
    $namn=$_POST['name'];
    $sql="INSERT INTO users(name) VALUES ('$namn')";
    $result=mysqli_query($conn, $sql);  //Kör SQL-satsen mot databasen och lagrar namnet i databasen
}
$names = []; //Skapar en tom array för att lagra namn
$sql = "SELECT name FROM users ORDER BY name";
$result = mysqli_query($conn, $sql); //Hämtar alla namn från databasen sorterade i bokstavsordning
while($row = mysqli_fetch_assoc($result)){
    $names[] = $row['name']; //Lägger till varje namn i arrayen
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
        <input list="list" type="text" name="name" placeholder="Skriv namn" id="name" oninput="updateList()" autocomplete="off"><!-- Inputfält för namn med oninput-händelse -->
        <datalist name="list" id="list"></datalist> <!-- Tom datalist som fylls med JavaScript -->

        <input type="submit" value="Lägg in namn" name="btn">
    </form>

</body>
</html>
<script>
        const names = <?=json_encode($names, JSON_UNESCAPED_UNICODE) ?>; //JavaScript-array med namn från PHP-variablen $names, JSON-kodad för att göra coola grejjer i javascript

        function updateList() {
        const input = document.getElementById("name");
        const list  = document.getElementById("list");
        const q = input.value.toLowerCase().trim(); //Hämtar värdet från inputfältet och gör det till gemener och tar bort mellanslag

        list.innerHTML = names 
            .filter(n => n.toLowerCase().startsWith(q))
            .slice(0, 30)
            .map(n => '<option value="'+n+'">'+n+'</option>')
            .join(""); //Filtrerar namn som börjar med det som skrivits in, begränsar till 30 resultat, skapar option-element och sätter in i datalisten
            if(list.innerHTML === "") { //Om inga namn matchar det inskrivna värdet var grönt inputfältet, annars rött
                input.classList.add("green");
                input.classList.remove("red");
            }else {
                input.classList.remove("green");
                input.classList.add("red");
            }
        }

</script>


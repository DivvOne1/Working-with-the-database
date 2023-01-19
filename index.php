<?php
session_start();
include("./BD/BD.php");

?>
<!DOCTYPE html>
<html>
<head>
   
    <title >Сласти</title>
	 <meta charset="utf-8">
 

</head>

<body>

<h3>Добавьте комментарий</h3>
<form action="./BD/BD.php" method="post">
    <p>Имя:
    <input type="text" name="uname" /></p>
    <p>Комментарий:
    <input type="text" name="ucomm" /></p>
</textarea>
    <input type="submit" value="Добавить">
</form>

 <p1>
 <?php
$conn = new mysqli("localhost", "root", "", "Divv");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT * FROM com";
if($result = $conn->query($sql)){
    $rowsCount = $result->num_rows; // количество полученных строк
    echo "<p>Получено комментариев: $rowsCount</p>";
    echo "<table><tr><th>Id</th><th>Имя:  </th><th>Комментарий</th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["comm"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>


</body>
</html>

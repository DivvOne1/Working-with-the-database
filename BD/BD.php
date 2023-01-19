<?php
if (isset($_POST["uname"]) && isset($_POST["ucomm"]) && isset($_POST["utext"]) ) {
      
    $conn = new mysqli("localhost", "root", "", "Divv");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $name = $conn->real_escape_string($_POST["uname"]);
    $comm = $conn->real_escape_string($_POST["ucomm"]);
    $text = $conn->real_escape_string($_POST["utext"]);
    $sql = "INSERT INTO com (id,name, comm,text) VALUES ('NULL','$name', '$comm','$text')";
    if($conn->query($sql)){
        echo "Данные успешно добавлены";
        header("Location: ../index.php");
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>
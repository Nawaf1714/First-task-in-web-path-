<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "robobt_controler";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['dir'])) {
    $command = $_POST['dir'];

    $sql = "INSERT INTO robot_1 (Distanse) VALUES ('$command')";
    if ($conn->query($sql) === TRUE) {
        echo "Robot is now'$command' successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();

header ("Refresh: 2 ; url=index.html"); 
exit ;
?>

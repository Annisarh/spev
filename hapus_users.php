<?php
$iduser = $_GET['id'];

$sql = "DELETE FROM tbuser WHERE iduser='$iduser'";
if ($conn->query($sql) === TRUE) {
    header("Location:?page=users");
}
$conn->close();

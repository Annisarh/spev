<?php
$kdgejala = $_GET['id'];

$sql = "DELETE FROM tbgejala WHERE kdgejala='$kdgejala'";
if ($conn->query($sql) === TRUE) {
    header("Location:?page=gejala");
}
$conn->close();

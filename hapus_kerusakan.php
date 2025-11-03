<?php
$kdkerusakan = $_GET['id'];

$sql = "DELETE FROM tbkerusakan WHERE kdkerusakan='$kdkerusakan'";
if ($conn->query($sql) === TRUE) {
    header("Location:?page=kerusakan");
}
$conn->close();

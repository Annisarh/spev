<?php
//mengambil id dari parameternya
$idaturan = $_GET['idaturan'];
$kdgejala = $_GET['kdgejala'];

$sql = "DELETE FROM tbdetail_basis_aturan WHERE idaturan='$idaturan' AND kdgejala='$kdgejala'";
if ($conn->query($sql) === TRUE) {
    header("Location:?page=aturan");
}
$conn->close();

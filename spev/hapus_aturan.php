<?php
//mengambil id dari parameternya
$idaturan = $_GET['id'];

//hapus basis aturan
$sql = "DELETE FROM tbbasis_aturan WHERE idaturan='$idaturan'";
$conn->query($sql);

//hapus detail basis aturan
$sql = "DELETE FROM tbdetail_basisi_aturan WHERE idaturan='$idaturan'";
$conn->query($sql);
header("Location:?page=aturan");

$conn->close();

<?php

$kdgejala = $_GET['id'];
if (isset($_POST['update'])) {
    $kdgejala = $_POST['kdgejala'];
    $nmgejala = $_POST['nmgejala'];

    // proses update
    $sql = "UPDATE tbgejala SET kdgejala='$kdgejala', nmgejala='$nmgejala' WHERE kdgejala='$kdgejala'";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=gejala");
    }
}

// mengambil id dari parameternya
$sql = "SELECT * FROM tbgejala WHERE kdgejala='$kdgejala'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>Upadata Data Gejala</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Kode Gejala</label>
                            <input type="text" class="form-control" name="kdgejala" value="<?php echo $row['kdgejala']; ?>" maxlength="200" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Gejala</label>
                            <input type="text" class="form-control" name="nmgejala" value="<?php echo $row['nmgejala']; ?>" maxlength="200" required>
                        </div>
                        <input class="btn btn-primary" type="submit" name="update" value="Upadate">
                        <a class="btn btn-danger" href="?page=gejala">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
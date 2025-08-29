<!-- proses update kerusakan -->
<?php

$kdkerusakan = $_GET['id'];

if (isset($_POST['update'])) {
    $kdkerusakan = $_POST['kdkerusakan'];
    $nmkerusakan = $_POST['nmkerusakan'];
    $keterangan = $_POST['keterangan'];
    $solusi = $_POST['solusi'];

    // proses update
    $sql = "UPDATE tbkerusakan SET kdkerusakan='$kdkerusakan', nmkerusakan='$nmkerusakan', keterangan ='$keterangan', solusi='$solusi' WHERE kdkerusakan='$kdkerusakan'";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=kerusakan");
    }
}

// mengambil id dari parameternya
$sql = "SELECT * FROM tbkerusakan WHERE kdkerusakan='$kdkerusakan'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>Halaman Update Data Kerusakan</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Kode Kerusakan</label>
                            <input type="text" class="form-control" name="kdkerusakan" value="<?php echo $row['kdkerusakan']; ?>" maxlength="50" required>
                        </div>
                        <div>
                            <label for="">Nama Kerusakan</label>
                            <input type="text" class="form-control" name="nmkerusakan" value="<?php echo $row['nmkerusakan']; ?>" maxlength="50" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" value="<?php echo $row['keterangan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="solusi">Solusi</label>
                            <input type="text" class="form-control" name="solusi" value="<?php echo $row['solusi']; ?>" required>
                        </div>
                        <input class="btn btn-primary" type="submit" name="update" value="Update">
                        <a class="btn btn-danger" href="?page=kerusakan">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
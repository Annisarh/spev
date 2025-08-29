<!-- proses simpan tambah kerusakan -->
<?php

if (isset($_POST['simpan'])) {

    //mengambil data dari form
    $kdkerusakan = $_POST['kdkerusakan'];
    $nmkerusakan = $_POST['nmkerusakan'];
    $keterangan = $_POST['keterangan'];
    $solusi = $_POST['solusi'];

    // validasi
    $sql = "SELECT * FROM tbkerusakan WHERE kdkerusakan='$kdkerusakan'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
?>

        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Kode Kerusakan Sudah Ada!!</strong>
        </div>
<?php
    } else {
        //proses simpan
        $sql = "INSERT INTO tbkerusakan VALUES ('$kdkerusakan', '$nmkerusakan', '$keterangan', '$solusi')";
        if ($conn->query($sql) === TRUE) {
            header("Location:?page=kerusakan");
        }
    }
}

?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>Tambah Data Kerusakan</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Kode Kerusakan</label>
                            <input type="text" class="form-control" name="kdkerusakan" maxlength="50" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kerusakan</label>
                            <input type="text" class="form-control" name="nmkerusakan" maxlength="50" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" required>
                        </div>
                        <div class="form-group">
                            <label for="solusi">Solusi</label>
                            <input type="text" class="form-control" name="solusi" required>
                        </div>
                        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                        <a class="btn btn-danger" href="?page=kerusakan">Batal</a>

                    </div>
                </div>
        </form>
    </div>
</div>
<!-- proses simpan gejala -->
<?php

if (isset($_POST['simpan'])) {
    $kdgejala = $_POST['kdgejala'];
    $nmgejala = $_POST['nmgejala'];

    // validasi
    $sql = "SELECT * FROM tbgejala WHERE kdgejala='$kdgejala'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
?>
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Kode Gejala Sudah Ada!!</strong>
        </div>
<?php
    } else {
        //proses simpan
        $sql = "INSERT INTO tbgejala VALUES ('$kdgejala','$nmgejala')";
        if ($conn->query($sql) === TRUE) {
            header("Location:?page=gejala");
        }
    }
}
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>Tambah Data Gejala</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Kode Gejala</label>
                            <input type="text" class="form-control" name="kdgejala" maxlength="200" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Gejala</label>
                            <input type="text" class="form-control" name="nmgejala" maxlength="200" required>
                        </div>
                        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                        <a class="btn btn-danger" href="?page=gejala">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
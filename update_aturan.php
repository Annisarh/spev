<!-- proses menampilkan data penyakit berdasarkan basis aturan yang dipilih -->
<?php
$idaturan = $_GET['id'];

// mengambil id dari parameternya
$sql = "SELECT tbbasis_aturan.idaturan, tbbasis_aturan.kdkerusakan,
               tbkerusakan.nmkerusakan FROM tbbasis_aturan INNER JOIN tbkerusakan 
               ON tbbasis_aturan.kdkerusakan = tbkerusakan.kdkerusakan WHERE idaturan='$idaturan'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!-- proses update -->
<?php
if (isset($_POST['update'])) {
    $kdgejala = $_POST['kdgejala'];

    // proses simpan detail basis aturan
    if ($kdgejala != Null) {
        $jumlah = count($kdgejala);
        $i = 0;
        while ($i < $jumlah) {
            $kdgejalapersatu = $kdgejala[$i];
            $sql = "INSERT INTO tbdetail_basis_aturan VALUES ($idaturan,'$kdgejalapersatu')";
            mysqli_query($conn, $sql);
            $i++;
        }
    }
    header("Location:?page=aturan");
}

?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>Halaman Update Data Basis Aturan</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Kerusakan</label>
                            <input type="text" class="form-control" value="<?php echo $row['nmkerusakan']; ?>" name="nmkerusakan" readonly>
                        </div>

                        <!-- tabel data gejala -->
                        <div class="form-group">
                            <label for="">Pilih Gejala-gejala berikut :</label>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width=30px></th>
                                        <th width="30px">No.</th>
                                        <th width="700px">Nama Gejala</th>
                                        <th width="50px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql = "SELECT * FROM tbgejala ORDER BY nmgejala ASC";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {

                                        $kdgejala = $row['kdgejala'];

                                        //check ke table detail basis aturan
                                        $sql2 = "SELECT * FROM tbdetail_basis_aturan WHERE idaturan='$idaturan' AND kdgejala='$kdgejala'";
                                        $result2 = $conn->query($sql2);
                                        if ($result2->num_rows > 0) {
                                            // jika ditemukan maka tampilkan datanya checklist mati hapus aktif
                                    ?>
                                            <tr>
                                                <td align="center">
                                                    <input type="checkbox" class="check-item" disabled="disabled">
                                                </td>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['nmgejala']; ?></td>
                                                <td align="center">
                                                    <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=aturan&action=hapus_gejala&idaturan=<?php echo $idaturan ?> &kdgejala=<?php echo $kdgejala ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
                                        } else {
                                            // jika tidak ditemukan maka checklist aktip hapus mati
                                        ?>
                                            <tr>
                                                <td align="center">
                                                    <input type="checkbox" class="check-item" name="<?php echo 'kdgejala[]'; ?>" value="<?php echo $row['kdgejala']; ?>">
                                                </td>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row['nmgejala']; ?></td>
                                                <td align="center">
                                                    <i class="fas fa-trash"></i>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <input class="btn btn-primary" type="submit" name="update" value="Update">
                        <a class="btn btn-danger" href="?page=aturan">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- proses menampilkan data basis aturan-->
<?php
$idcek = $_GET['id'];

$sql = "SELECT * FROM tbcek_kerusakan WHERE idcek='$idcek'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>Halaman Detail Hasil Cek Kerusakan</strong></div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Tipe Kendaraan</label>
                            <input type="text" class="form-control" value="<?php echo $row["tipeken"]; ?>" name="nmev" readonly>
                        </div>

                        <!-- tabel gejala-gejala -->
                        <label for="">Gejala-Gejala Kerusakan yang dipilih :</label>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="50px">No.</th>
                                    <th width="700px">Nama Gejala</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = "SELECT tbdetail_cek_kerusakan.idcek, tbdetail_cek_kerusakan.kdgejala, tbgejala.nmgejala
                               FROM tbdetail_cek_kerusakan INNER JOIN tbgejala ON 
                               tbdetail_cek_kerusakan.kdgejala = tbgejala.kdgejala 
                               WHERE idcek ='$idcek'";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['nmgejala']; ?></td>
                                    </tr>
                                <?php }

                                ?>
                            </tbody>
                        </table>


                        <!-- tabel hasil cek kerusakan -->
                        <label for="">Hasil Cek Kerusakan :</label>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="50px">No.</th>
                                    <th width="700px">Nama kerusakan</th>
                                    <th width="100px">Presentase</th>
                                    <th width="500px">Solusi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = "SELECT tbdetail_kerusakan.idcek, tbdetail_kerusakan.kdkerusakan,
                                        tbkerusakan.nmkerusakan, tbkerusakan.solusi, tbdetail_kerusakan.presentase
                                        FROM tbdetail_kerusakan INNER JOIN tbkerusakan ON tbdetail_kerusakan.kdkerusakan = tbkerusakan.kdkerusakan 
                                        WHERE idcek='$idcek' ORDER BY presentase DESC";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['nmkerusakan']; ?></td>
                                        <td><?php echo $row['presentase'] . "%"; ?></td>
                                        <td><?php echo $row['solusi']; ?></td>
                                    </tr>
                                <?php }
                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                        <a class="btn btn-danger" href="?page=cekadm">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
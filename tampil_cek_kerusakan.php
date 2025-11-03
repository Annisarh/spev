<!-- proses untuk konsultasi -->
<?php

date_default_timezone_set("Asia/Jakarta");

if (isset($_POST['proses'])) {

    //mengambil data dari form
    $tipe = $_POST['nmev'];
    $tgl = date("Y/m/d");


    //proses simpan konsultasi
    $sql = "INSERT INTO tbcek_kerusakan VALUES (Null, '$tgl', '$tipe')";
    mysqli_query($conn, $sql);

    //proses detail_konsultasi

    //mengambil idgejala
    $kdgejala = $_POST['kdgejala'];

    //proses mengambil data konsultasi
    $sql = "SELECT * FROM tbcek_kerusakan ORDER BY idcek DESC";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $idcek = $row['idcek'];

    //proses simpan detail cek kerusakan
    $jumlah = count($kdgejala);
    $i = 0;
    while ($i < $jumlah) {
        $kdgejalapersatu = $kdgejala[$i];
        $sql = "INSERT INTO tbdetail_cek_kerusakan VALUES ($idcek,'$kdgejalapersatu')";
        mysqli_query($conn, $sql);
        $i++;
    }

    // mengambil data dari tabel kerusakan untuk dicek dibasis aturan
    $sql = "SELECT * FROM tbkerusakan";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $kdkerusakan = $row['kdkerusakan'];
        $nmkerusakan = $row['nmkerusakan'];
        $jyes = 0;

        //proses jumlah gejala di basis aturan berdasarkan kerusakan
        $sql2 = "SELECT COUNT(kdkerusakan) AS jml_gejala
                 FROM tbbasis_aturan INNER JOIN tbdetail_basis_aturan
                 ON tbbasis_aturan.idaturan = tbdetail_basis_aturan.idaturan
                 WHERE kdkerusakan ='$kdkerusakan'";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $jml_gejala = $row2['jml_gejala'];

        //mencari gejala pada basis aturan
        $sql3 = "SELECT kdkerusakan, kdgejala
                 FROM tbbasis_aturan INNER JOIN tbdetail_basis_aturan
                 ON tbbasis_aturan.idaturan = tbdetail_basis_aturan.idaturan
                 WHERE kdkerusakan='$kdkerusakan'";
        $result3 = $conn->query($sql3);
        while ($row3 = $result3->fetch_assoc()) {

            $kdgejalane = $row3['kdgejala'];
            //membandingkan apakah yang dipilih dicek kerusakan sesuai
            $sql4 = "SELECT kdgejala FROM tbdetail_cek_kerusakan WHERE idcek = '$idcek' AND kdgejala='$kdgejalane'";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                $jyes += 1;
            }
        }

        //mencari presentase 
        if ($jml_gejala > 0) {
            $peluang = round(($jyes / $jml_gejala) * 100, 2);
        } else {
            $peluang = 0;
        }

        //simpan data detail kerusakan
        if ($peluang > 0) {
            $sql = "INSERT INTO tbdetail_kerusakan VALUES ('$idcek', '$kdkerusakan', '$peluang')";
            mysqli_query($conn, $sql);
        }
        header("Location:?page=cek&action=hasil&idcek=$idcek");
    }
}
?>


<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST" name="Form" onsubmit="return validasiForm()">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>Halaman Cek Kerusakan</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Tipe Kendaraan</label>
                            <input type="text" class="form-control" name="nmev" maxlength=" 50" required>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sql = "SELECT*FROM tbgejala ORDER BY nmgejala ASC";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td align="center">
                                                <input type="checkbox" class="check-item" name="<?php echo 'kdgejala[]'; ?>" value="<?php echo $row['kdgejala']; ?>">
                                            </td>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['nmgejala']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <input class="btn btn-primary" type="submit" name="proses" value="Proses">
                    </div>
                </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function validasiForm() {

        // validasi gejal yang belum dipilih
        var checkbox = document.getElementsByName("<?php echo 'kdgejala[]'; ?>");

        var isChecked = false;

        for (var i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked) {
                isChecked = true;
                break;
            }
        }
        // jika belum ada yang dicheck
        if (!isChecked) {
            alert("Pilih setidaknya 1 gejala!!");
        }
        return true;
    }
</script>
<!-- proses tambah aturan -->
<?php

if (isset($_POST['simpan'])) {
    $nmkerusakan = $_POST['nmkerusakan'];

    // validasi nama penyakit
    $sql = "SELECT  tbbasis_aturan.idaturan, tbbasis_aturan.kdkerusakan,
                     tbkerusakan.nmkerusakan FROM tbbasis_aturan INNER JOIN tbkerusakan 
                     ON tbbasis_aturan.kdkerusakan = tbkerusakan.kdkerusakan WHERE nmkerusakan='$nmkerusakan'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
?>
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Data Basis Aturan Kerusakan tersebut sudah ADA</strong>
        </div>
<?php
    } else {
        //mengambil data Kerusakan
        $sql = "SELECT * FROM tbkerusakan WHERE nmkerusakan='$nmkerusakan'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $kdkerusakan = $row['kdkerusakan'];

        //proses simpan basis aturan
        $sql = "INSERT INTO tbbasis_aturan VALUES (NULL,'$kdkerusakan')";
        mysqli_query($conn, $sql);

        //mengambil idgejala
        $kdgejala = $_POST['kdgejala'];

        //proses mengambil idaturan
        $sql = "SELECT * FROM tbbasis_aturan ORDER BY idaturan DESC";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $idaturan = $row['idaturan'];

        //proses simpan detail basis aturan
        $jumlah = count($kdgejala);
        $i = 0;
        while ($i < $jumlah) {
            $kdgejalapersatu = $kdgejala[$i];
            $sql = "INSERT INTO tbdetail_basis_aturan VALUES ($idaturan,'$kdgejalapersatu')";
            mysqli_query($conn, $sql);
            $i++;
        }
        header("Location:?page=aturan");
    }
}
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST" name="Form" onsubmit="return validasiForm()">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>Tambah Data Basis Aturan</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Kerusakan</label>
                            <select class="form-control chosen" data-placeholder="Pilih Nama Kerusakan" name="nmkerusakan">
                                <option value=""></option>
                                <?php
                                $sql = "SELECT * FROM tbkerusakan ORDER BY nmkerusakan ASC";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $row['nmkerusakan']; ?>"><?php echo $row['nmkerusakan']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <!-- tabel data gejala -->
                        <div class="form-group">
                            <label for="">Pilih Gejala-gejala berikut</label>
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
                                    $sql = "SELECT * FROM tbgejala ORDER BY nmgejala ASC";
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

                        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                        <a class="btn btn-danger" href="?page=aturan">Batal</a>

                    </div>
                </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function validasiForm() {
        //validasi nama penyakit
        var nmkerusakan = document.forms["Form"]["nmkerusakan"].value;

        if (nmkerusakan == "") {
            alert("Pilih nama kerusakannya");
            return false;
        }

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
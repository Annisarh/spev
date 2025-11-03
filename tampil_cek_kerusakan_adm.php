<div class="card">
    <div class="card-header bg-primary text-white border-dark"><strong>Halaman Data Hasil Rekam Cek Kerusakan</strong></div>
    <div class="card-body">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th width="80px">No.</th>
                    <th width="200px">Tanggal</th>
                    <th width="400px">Tipe Kendaraan</th>
                    <th width="100"></th>
                </tr>
            </thead>
            <tbody>
                <!-- letakkan proses menampilkan disini -->
                <?php
                $no = 1;
                $sql = "SELECT * FROM tbcek_kerusakan ORDER BY tanggal DESC";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['tanggal']; ?></td>
                        <td><?php echo $row['tipeken']; ?></td>
                        <td align="center">
                            <a class="btn btn-primary" href="?page=cekadm&action=detail&id=<?php echo $row['idcek']; ?>">
                                <i class="fas fa-list"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>
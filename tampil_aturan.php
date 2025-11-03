<div class="card">
    <div class="card-header bg-primary text-white border-dark"><strong>Halaman Data Basis Aturan</strong></div>
    <div class="card-body">
        <a class="btn btn-primary mb-2" href="?page=aturan&action=tambah">Tambah</a>
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th width="80px">No.</th>
                    <th width="200px">Nama Kerusakan</th>
                    <th width="400px">Keterangan</th>
                    <th width="100"></th>
                </tr>
            </thead>
            <tbody>
                <!-- letakkan proses menampilkan disini -->
                <?php
                $no = 1;
                $sql = "SELECT tbbasis_aturan.idaturan, tbbasis_aturan.kdkerusakan,
                               tbkerusakan.nmkerusakan, tbkerusakan.keterangan FROM tbbasis_aturan INNER JOIN tbkerusakan
                               ON tbbasis_aturan.kdkerusakan=tbkerusakan.kdkerusakan ORDER BY nmkerusakan ASC";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['nmkerusakan']; ?></td>
                        <td><?php echo $row['keterangan']; ?></td>
                        <td align="center">
                            <a class="btn btn-primary" href="?page=aturan&action=detail&id=<?php echo $row['idaturan']; ?>">
                                <i class="fas fa-list"></i>
                            </a>
                            <a class="btn btn-warning" href="?page=aturan&action=update&id=<?php echo $row['idaturan']; ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=aturan&action=hapus&id=<?php echo $row['idaturan']; ?>">
                                <i class="fas fa-trash"></i>
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
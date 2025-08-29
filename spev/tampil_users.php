<div class="card">
    <div class="card-header bg-primary text-white border-dark"><strong>Halaman Data Users</strong></div>
    <div class="card-body">
        <a class="btn btn-primary mb-2" href="?page=users&action=tambah">Tambah</a>
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th width="80px">No.</th>
                    <th width="300px">Username</th>
                    <th width="300px">Role</th>
                    <th width="100"></th>
                </tr>
            </thead>
            <tbody>
                <!-- letakkan proses menampilkan disini -->
                <?php
                $no = 1;
                $sql = "SELECT * FROM tbuser ORDER BY username ASC";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['role']; ?></td>
                        <td align="center">
                            <a class="btn btn-warning" href="?page=users&action=update&id=<?php echo $row['iduser']; ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=users&action=hapus&id=<?php echo $row['iduser']; ?>">
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
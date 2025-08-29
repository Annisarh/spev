<!-- proses simpan users -->
<?php

if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $pass = md5($_POST['pass']);
    $role = $_POST['role'];

    //proses simpan
    $sql = "INSERT INTO tbuser VALUES ('NULL','$username','$pass', '$role')";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=users");
    }
}
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-dark">
                <div class="card">
                    <div class="card-header bg-primary text-white border-dark"><strong>Halaman Tambah Data Users</strong></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" maxlength="20" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="pass" maxlength="255" required>
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <select class="form-control chosen" data-placeholder="Pilih Role User" name="role">
                                <option value=""></option>
                                <option value="Admin">Admin</option>
                                <option value="Mekanik">Mekanik</option>
                            </select>
                        </div>
                        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                        <a class="btn btn-danger" href="?page=users">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
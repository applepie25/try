<?php 
$host       ="localhost";
$user       ="root";
$pass       ="";
$db         ="data";

$koneksi    = mysqli_connect($host, $user, $pass, $db); //mengkoneksikan database ke php 
if(!$koneksi){
    die ("Tidak bisa terknoneksi ke database");
}
$namaPemilik    ="";
$noTelp         ="";
$email          ="";
$namaToko       ="";
$alamat         ="";
$status         ="";
$sukses         ="";
$error          ="";

if(isset($_GET['op'])){
    $op = $_GET['op'];
} else {
    $op = "";
}

if($op == 'delete'){
    $id         =   $_GET['id'];
    $sql1       =   "delete from datareseller where id = '$id'";
    $q1         =   mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil Hapus Data";
    }else {
        $error ="Gagal Hapus Data";
    }
}
if ($op == 'edit') {
    $id             = $_GET['id'];
    $sql1           = "select * from datareseller where id = '$id'";
    $q1             = mysqli_query($koneksi, $sql1);
    $r1             = mysqli_fetch_array($q1);
    $namaPemilik    = $r1['nama'];
    $noTelp         = $r1['nomor'];
    $email          = $r1['email'];
    $namaToko       = $r1['toko'];
    $alamat         = $r1['alamat'];
    $status         = $r1['status'];

    if ($namaPemilik == '') {
        $error = "Data tidak ditemukan";
    }
}
//proses masuk data
if(isset($_POST['simpan'])){
    $namaPemilik    = $_POST['namaPemilik'];
    $noTelp         = $_POST['noTelp'];
    $email          = $_POST['email'];
    $namaToko       = $_POST['namaToko'];
    $alamat         = $_POST['alamat'];
    $status         = $_POST['status'];

    if($namaPemilik && $noTelp && $email && $namaToko && $alamat && $status){
        if($op == 'edit'){
            $sql1       ="update datareseller set nama='$namaPemilik',nomor='$noTelp', email='$email',toko='$namaToko',alamat='$alamat',status='$status' where id='$id'";
            $q1         =mysqli_query($koneksi, $sql1);
            if($q1){
                $sukses = "Data berhasil diperbarui";
            }else {
                $error = "Data gagal diperbarui";
            }
        }else {
            $sql1   = "insert into datareseller(nama,nomor,email,toko,alamat,status) values ('$namaPemilik','$noTelp','$email','$namaToko','$alamat','$status')";
            $q1     = mysqli_query($koneksi, $sql1);
            
            if ($q1) {
                $sukses     = "Berhasil memasukkan data";
            }else {
                $error      = "Gagal memasukkan data";
            }
        }
    }else {
        $error = "Silahkan masukkan data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Reseller</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Righteous&display=swap" rel="stylesheet">

    <style>
    .mx-auto {
        width: 1600px;
        font-family: 'Balsamiq Sans', cursive;
    }

    header {
        font-family: 'Righteous', cursive;
        text-align: center;
        margin-bottom: 16px;
        margin-top: 16px;
    }

    header a {
        font-size: 55px;
        text-decoration: none;
        color: white;
    }

    .card {
        margin-top: 10px;
    }
    </style>
</head>

<body
    background="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1173&q=80">
    <header>
        <a href="http://localhost/crud/index.php"> DATA RESELLER </a>
    </header>
    <div class="mx-auto">
        <!-- masukkan data -->
        <div class="card">
            <div class="card-header">Masukkan Data</div>
            <div class="card-body">
                <?php
                if($error){
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
                <?php
                    header("refresh:5;url=index.php");
                }
                ?>
                <?php 
                if($sukses){
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $sukses ?>
                </div>
                <?php
                    header("refresh:5;url=index.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="namaPemilik" class="col-sm-2 col-form-label">Nama Pemilik</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="namaPemilik" name="namaPemilik"
                                value="<?php echo $namaPemilik ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="noTelp" class="col-sm-2 col-form-label">No.Telpon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="noTelp" name="noTelp"
                                value="<?php echo $noTelp ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $email?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="namaToko" class="col-sm-2 col-form-label">Nama Toko</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="namaToko" name="namaToko"
                                value="<?php echo $namaToko?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat Toko</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="<?php echo $alamat?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="status" class="col-sm-2 col-form-label">Status Toko</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status" id="status">
                                <option value="">- Pilih Status - </option>
                                <option value="Aktif" <?php if($status == "Aktif") echo "selected"?>>Aktif</option>
                                <option value="Tdk Aktif" <?php if($status == "Tdk Aktif") echo "selected"?>>Tidak Aktif
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <!-- mengeluarkan data -->
            <div class="card-header text-white bg-info">Daftar Reseller</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pemilik</th>
                            <th scope="col">No.Telpon</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nama Toko</th>
                            <th scope="col">Alamat Toko</th>
                            <th scope="col">Status</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2 = "select * from datareseller order by id asc";
                        $q2  = mysqli_query($koneksi, $sql2);
                        $urut = 1;

                        while($r2 = mysqli_fetch_array($q2)){
                            $id             = $r2['id'];
                            $namaPemilik    = $r2['nama'];
                            $noTelp         = $r2['nomor'];
                            $email          = $r2['email'];
                            $namaToko       = $r2['toko'];
                            $alamat         = $r2['alamat'];
                            $status         = $r2['status'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $urut++ ?></th>
                            <td scope="row"><?php echo $namaPemilik ?></td>
                            <td scope="row"><?php echo $noTelp ?></td>
                            <td scope="row"><?php echo $email ?></td>
                            <td scope="row"><?php echo $namaToko ?></td>
                            <td scope="row"><?php echo $alamat ?></td>
                            <td scope="row"><?php echo $status?></td>
                            <td scope="row">
                                <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button"
                                        class="btn btn-warning">Edit Data</button></a>
                                <a href="index.php?op=delete&id=<?php echo $id?>"
                                    onclick="return confirm('Yakin mau delete data?')"><button type="button"
                                        class="btn btn-danger">Hapus Data</button></a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
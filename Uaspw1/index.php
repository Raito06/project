<?php
include "_crud.mysqli.oop.php";
$crud = new CRUD("localhost", "root", "", "db_yukcoding")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS 1</title>
    <link rel="stylesheet" href='css/materialize.css' />
</head>
<body>
    <nav class="light-blue lighten-1" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="./" class="brand-logo">Skateshop</a>
            <ul class="right hide-on-med-and-down">
                <li><a class="waves-effect waves-light" href="?page=tampil">Lihat Data</a></li>                
                <li><a class="waves-effect waves-light" href="?page=tambah">Tambah Data</a></li>
            </ul>
            
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
         </div>
    </nav>

    <li><a class="waves-effect waves-light" href="?page=tampil">Lihat Data</a></li>                
                <li><a class="waves-effect waves-light" href="?page=tambah">Tambah Data</a></li>
    <div class="container z-depth-2" style="min-height:500px;">
    <div class="section">
        <?php
        if(@$_GET['page'] == ''){
            echo "<title>Halaman Utama</title>";
            echo "<title>Selamat Datang di Halaman Utama</title>";
        }else if(@$_GET['page'] == 'tampil'){
        ?>
        <title>Tampil Data</title>
        <h5 class="blue-text">Data Pelanggan</h5>
        <div class="row">
            <table class="col s12 striped">
                <thead>
                    <tr class="blue lighten-3">
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Opsi</th>

                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $row = $crud->fetch("tb_anggota");
                foreach ($row as $data){   
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['jk']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        <td><?php echo $data['telp']; ?></td>
                        <td width="100px" align="center">
                            <a href="?page=edit&id=<?php echo $data['id'];  ?>" class="btn-floating waves-effect waves-light orange"><i class="mdi-editor-mode-edit"></i></a>
                            <a onclick="return confirm('Yakin akan menghapus data');" href="?page=hapus&id=<?php echo $data['id'];  ?>" class="btn-floating waves-effect waves-light red"><i class="mdi-action-delete"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    
    <?php
        }else if(@$_GET['page'] == 'tambah') {
            include "tambah_anggota.php";
        }else if(@$_GET['page'] == 'edit') {
            include "edit.php";
        }else if(@$_GET['page'] == 'hapus') {
           $id = @$_GET['id'];
           $crud->delete("tb_anggota", "id = '$id'");
           header("location:?page=tampil");
        }
    ?>
    </div>
    </div>
    <!-- Button trigger modal -->


    <script type="text/javascript" src='js/jquery.js'></script>
    <script type="text/javascript" src='js/materlialize.js'></script>
    <script type="text/javascript" src='js/init.js'></script>
</body>
</html>
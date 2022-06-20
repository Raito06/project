<title>Edit Data</title>
<h5 class="blue-text">Edit Data Anggota</h5>
<div class="row">
    <?php
    $id = @$_GET['id'];
    $data = $crud->fetch("tb_anggota", "id = '$id'");
    ?>
    <form class="col m6 s12" method="post">
        <div class="row">
        <div class="input-field col s12">
            <input type="text" name="nama" value="<?php echo $data[0]['nama']; ?>"?required />
            <label>Nama</label>
        </div>
        </div>
        <div class="row">
        <label style="margin-left:10px;">Jenis Kelamin</label>
        <div class="input-field col s12">
            <select class="browser-default" name="jk" required>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan" <?php if($data[0]['jk'] == 'perempuan'){ echo "selected";} ?>>Perempuan</option>
            </select>
        </div>
        </div>
        <div class="row">
        <div class="input-field col s12">
            <textarea class="materialize-textarea" name="alamat" required><?php echo $data[0]['alamat']; ?></textarea>
            <label>Alamat </label>
        </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="telp" required value="<?php echo $data[0]['telp']; ?>">
                <label>No.Telepon </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
            <input type="submit" name="edit" value="Edit" class="btn orange">
            <input type="reset" value="Reset" class="btn red">
            </div>
        </div>
    </form>
    <?php
    if(@$_POST['edit']){
        $nama = @$_POST['nama'];
        $jk = @$_POST['jk'];
        $alamat = @$_POST['alamat'];
        $telp= @$_POST['telp'];
        $data = array('nama' =>$nama, 'jk' =>$jk, 'alamat' =>$alamat, 'telp' => $telp );
        $crud->update("tb_anggota", $data, "id = '$id'");
        header("location:?page=tampil");
    }
    ?>
</div>
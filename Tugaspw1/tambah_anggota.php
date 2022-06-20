<title>Tambah Data</title>
<h5 class="blue-text">Tambah Data Anggota</h5>
<div class="row">
    <form class="col m6 s12" method="post">
        <div class="row">
        <div class="input-field col s12">
            <input type="text" name="nama" required />
            <label>Nama</label>
        </div>
        </div>
        <div class="row">
        <label style="margin-left:10px;">Jenis Kelamin</label>
        <div class="input-field col s12">
            <select class="browser-default" name="jk" required>
                <option value="">-Pilih-</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
        </div>
        </div>
        <div class="row">
        <div class="input-field col s12">
            <textarea class="materialize-textarea" name="alamat" required></textarea>
            <label>Alamat </label>
        </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="telp" required>
                <label>No.Telepon </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
            <input type="submit" name="tambah" value="Tambah" class="btn orange">
            <input type="reset" value="Reset" class="btn red">
            </div>
        </div>
    </form>
    <?php
    if(@$_POST['tambah']){
        $nama = @$_POST['nama'];
        $jk = @$_POST['jk'];
        $alamat = @$_POST['alamat'];
        $telp= @$_POST['telp'];
        $data = array('nama' =>$nama, 'jk' =>$jk, 'alamat' =>$alamat, 'telp' => $telp );
        $crud->insert("tb_anggota", $data);
        header("location:?page=tampil");
    }
    ?>
</div>
<?php 
        require 'barang_tambah_action.php';
        if(isset($_POST["simpan"]) ){
            if( tambahBarang($_POST) > 0 ){
                echo "<script>
                        alert('Data Berhasil Ditambahkan!');
                    </script>";
            } else {
                echo "<script>
                        alert('Data Gagal Ditambahkan!');
                    </script>";
            }
        }
?>
<div id="Modaltambahbarang" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Tambah Barang</h1>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="myForm">
                    <div class="form-group">
                        <label class="control-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang">
                    </div>
                    <div class="form-group">
                        <label class="control-label">PG-Rating</label> <br>
                        <input type="radio" class="form-check-input" name="PG_Rating" value="7+"> 7+
                        <input type="radio" class="form-check-input" name="PG_Rating" value="12+"> 12+
                        <input type="radio" class="form-check-input" name="PG_Rating" value="15+"> 15+
                        <input type="radio" class="form-check-input" name="PG_Rating" value="18+"> 18+
                    </div>
                    <div class="form-group">
                        <label class="control-label">Harga Barang</label>
                        <input type="number" class="form-control" name="harga_barang">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Stok Barang</label>
                        <input type="number" class="form-control" name="stok_barang">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tanggal Rilis</label>
                        <input type="date" class="form-control" name="tanggal_rilis">
                    </div>
                    <div class="form-group">
                        <label class="control-label">cerita</label><br>
                        <textarea name="cerita" id="cerita" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Foto Barang</label>
                        <input type="file" class="form-control" name="foto_barang">
                    </div>
                    <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

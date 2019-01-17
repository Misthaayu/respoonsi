<?php
	if(isset($_POST["simpan"])){
		extract($_POST);
		$aksi=get("aksi");
		if($aksi=="simpan"){
		$id=get("id");
		$query=insert("tkategori","'','$nama_kategori'");
		if($query){
			alert('simpan sukses');
			redir('?hal=kategori');
		}else{
			alert('simpan gagal');
			redir('?hal=kategori_tambah');
		}
		}
		}
?>
<form method="post" action="?hal=kategori_tambah&aksi=simpan" enctype="multipart/form-data">
<div class="panel panel-default">
    <div class="panel-heading"></div>
        <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
		<tr>
			<td>Nama kategori</td>
			<td>
				<input type="text" name="nama_kategori"><br>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<input class="btn btn-default" type="reset" value="edit">
				<input class="btn btn-default" type="submit" value="simpan" name="simpan">
			</td>
		</tr>
		</div>
            </div>
            </div>
			</div>
	</table>
</form>
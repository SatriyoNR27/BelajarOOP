<?php 
	include "config/koneksi.php";
	include "library/oop.php";

	@$redirect = "siswa.php";
	$go = new oop();
	$table = "siswa";
	$where = "nis";
	@$values = "'$_GET[nis]'";

	if(isset($_POST['simpan'])){
		@$values = "'$_POST[nis]', '$_POST[nama]'";
		$go->simpan ($con,$table,$values);
	}
	if(isset($_GET['hapus'])){	
		$go->hapus($con, $table, $where, $values);
	}
	if(isset($_POST['update'])){
		$set = "nis='$_POST[nis]',nama='$_POST[nama]'";
		$go->update($con, $table,$set,$where,$values);
	}
	if(isset($_GET['edit'])){
		$edit = $go->edit($con, $table, $where, $values);
	}
?>
<form method="post">
	<table align="center" border="1">
	<tr>
		<td>NIS</td>
		<td>:</td>
		<td><input type="number" name="nis" required placeholder="Masukan NIS" value="<?php echo @$edit['nis']?>"></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><input type="text" name="nama" required placeholder="Masukan Nama" value="<?php echo @$edit['nama']?>"></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><input type="submit" name="simpan" value="Tambah">
			<input type="submit" name="update" value="Update">
	</tr>
	</table>
<br/>
<table align="center" border="1">
	<tr>
		<td>NO</td>
		<td>NIS</td>
		<td>Nama</td>
		<td align="center" colspan="2">Aksi</td>
	</tr>
	<?php
	$no = 0;
	$l = $go->tampil($con, $table);
    foreach ($l as $r) {
    	$no++;
	?>
		    <tr>
				<td><?php echo $no; ?></td>
                <td><?php echo $r['nis']; ?></td>
                <td><?php echo $r['nama']; ?></td>
                <td><a href="siswa.php?edit&nis=<?php echo $r['nis']; ?>">EDIT</a></td>
				<td><a href="siswa.php?hapus&nis=<?php echo $r['nis']; ?>">HAPUS</a></td>
          <?php } ?>
            </tr>
</table>
</form>
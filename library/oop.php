<?php 
class oop{
	function simpan($con, $table, $values){
		$sql = mysqli_query($con, "INSERT INTO $table VALUES ($values)");
		if ($sql) {
            echo "<script>alert('Success');document.location.href=siswa.php</script>";
        }
	}
	function hapus($con, $table, $where, $values){
		$sql = mysqli_query($con, "DELETE FROM $table WHERE $where = $values");
		if ($sql){
            echo "<script>alert('Success');document.location.href=siswa.php</script>";
        }
	}
	function tampil($con, $table){
		$sql = mysqli_query($con, "SELECT * FROM $table");
		$isi = [];
		while($data = mysqli_fetch_array($sql)){
			$isi[] = $data;
		}return $isi;
	}
	function edit($con, $table, $where, $values){
		$sql = mysqli_query($con, "SELECT * FROM $table WHERE $where = $values");
		$tampil = mysqli_fetch_array($sql);
		return $tampil;
	}
	function update($con, $table, $set, $where, $values){
		$sql = mysqli_query($con, "UPDATE $table set $set WHERE $where = $values");
		if ($sql) {
            echo "<script>alert('Success');document.location.href=siswa.php</script>";
        }
	}
    }

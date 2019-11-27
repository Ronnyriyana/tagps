<?php
		/*$Latitude		= $_POST['Latitude'];
		$Longitude		= $_POST['Longitude'];
		$polygon		= $_POST['polygon'];
		
		
		$server  ="localhost";
		$user	 ="root";
		$password ="";
		$db_name  ="tagps";
		
		mysql_connect($server, $user, $password);
		mysql_select_db($db_name) or die ("koneksi ke database gagal");
		mysql_query("INSERT INTO datamasuk(Latitude,polygon,Longitude)values('d','z','z')") or die ("menyimpan data gagal");
		
		echo "menyimpan data berhasil"; */
		
		include("koneksiDB.php");
		$koordinat=$_POST['koordinat'];
		$koordinat=str_replace("(","[",$koordinat);
		$koordinat=str_replace(")","],",$koordinat);
		//$sql = mysqli_query($koneksi,"INSERT INTO datamasuk(Latitude,polygon,Longitude)values('$Latitude','$Longitude','$polygon')");
		$sql = mysqli_query($koneksi,"INSERT INTO points(data)values('$koordinat')");
		  
		if($sql) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
			echo "<script>alert('Data tersimpan !!');</script>";
		} else { // Jika berhasil alihkan ke halaman tampil.php
			echo "<script>alert('Data tidak tersimpan !!');</script>";
		}
		echo $koordinat;
?>

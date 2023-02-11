<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Data</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<form method="POST">	
<?php 
	$id_barang1=$_GET['stok'];
	$id_barang=base64_decode($id_barang1);
	$kon=mysqli_connect("localhost","root","","crud");
	$sql="select * from tb_barang Where stok='".$id_barang."'";
       $q=mysqli_query($kon,$sql);
       $r=mysqli_fetch_array($q);

?>
<div class="container mt-3">
	<h1>Edit Data Barang</h1>
<div class="mb-3 mt-3">
<label>ID Barang :</label>
<input type="text"class="form-control" name="id_barang" value="<?php echo $r['id_barang'] ?>"></div>
<div class="mb-3 mt-3">
<label>Nama Barang :</label>
<input type="text"class="form-control" name="nama_barang" value="<?php echo $r['nama_barang'] ?>">
</div>
<div class="mb-3 mt-3">
<label>Stok Barang :</label>
<input type="text"class="form-control" name="stok" value="<?php echo $r['stok'] ?>">
</div>
<div class="mb-3 mt-3">
<label>Harga Barang :</label>
<input type="text"class="form-control" name="harga" value="<?php echo $r['harga'] ?>">
</div>
<div>
 <button type="submit" class="btn btn-primary" name="bsubmit">Update</button>
</div>
<?php 
	if (isset($_POST['bsubmit'])) {
		$id=$_POST['id_barang'];
		$nama=$_POST['nama_barang'];
		$stok=$_POST['stok'];
		$harga=$_POST['harga'];
		$kon=mysqli_connect("localhost","root","","crud");
		$sql="UPDATE `tb_barang` SET `id_barang`='".$id."',`nama_barang`='".$nama."',`stok`='".$stok."',`harga`='".$harga."' WHERE id_barang='".$id."'";
	 	$q=mysqli_query($kon,$sql);
       if ($q) {
         echo '<div class="alert alert-success">
  <strong>Success!</strong> Update  sukses.!
</div>';
       } else { 
         echo '<div class="alert alert-danger">
  <strong>Gagal!</strong> Update  gagal.!
</div>';   
       }
      echo "<script>window.location.href='index.php';</script>";
  }  
  ?>
</div>
</form>
</body>
</html>
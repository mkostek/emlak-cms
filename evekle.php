

<?php
include "connect.php";
include "include.html";
if(isset($_POST['alan'])&&isset($_POST['ücret'])&&isset($_POST['adres'])&&isset($_POST['ev'])&&isset($_POST['aciklama']))
{
	$sql = "INSERT INTO portfoy(aciklama,adres,alan,fiyat,satilik) VALUES ('".$_POST['aciklama']."','".$_POST['adres']."',".$_POST['alan'].",".$_POST['ücret'].",".$_POST['ev'].")";
if ($conn->query($sql) === TRUE) {
    echo "Yeni ev başarı ile eklendi<br>";
	$id=$conn->insert_id;
	?>
	<div>
<form action="upload.php" method="post" enctype="multipart/form-data">
<h3>Lütfen resimleri seçerek ekleyiniz....</h3>
<input type="hidden" name="gizli" value="<?php echo $id ?>">
<?php
for($a=0;$a<$_POST["resim"];$a++)
{
	echo '<p>'.$a.'.<input type="file"  name="resimler[]" /></p><br>';
}
?>

<input type="submit" value="Gönder" />
</p>
</form>
</div>
	<?php
} else {
    echo "hata: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>

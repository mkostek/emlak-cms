
<?php
require "connect.php";
include "include.html";
$id=$_POST["id"];
$sql="update portfoy set fiyat=".$_POST['ücret']." ,alan=".$_POST['alan']." ,satilik=".$_POST['ev']." ,aciklama='".$_POST['aciklama']."' ,adres= '".$_POST['adres']."' where pId=".$id."";
if ($conn->query($sql) === TRUE) 
echo "<p>kayıt başarı ile güncellendi</p>";
else
echo "<p>kayıt başarı ile güncellenemedi</p>";
if($_POST["resim"]>0){ ?>	
<form action="upload.php" method="post" enctype="multipart/form-data">
<h3>Lütfen resimleri seçerek ekleyiniz....</h3>
<input type="hidden" name="gizli" value="<?php echo $id ?>">
<?php
for($a=0;$a<$_POST["resim"];$a++)
{
	echo '<p>'.($a+1).'.<input type="file"  name="resimler[]" /></p><br>';
}
?>
<input type="submit" value="Gönder" />
</p>
</form>
<?php }else header("Refresh: 1; url=http://127.0.0.1:8080/emlak");	?>




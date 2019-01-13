

<?php
include "include.html";
require "connect.php";
$id=$_GET["id"];
$geri=$_GET["geri"];
$sql="select resimKonum from resim where resimId=".$id."";
$result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$resimKonum=$row["resimKonum"];
	}
 }
if(unlink($resimKonum))
echo "<p>Resim klasörden silindi</p>";
else	
echo "<p>Resim klasörden silinemedi</p>";

$sql="delete from resim where resimId=".$id."";
if ($conn->query($sql) === TRUE) 
	echo "<p>Resim veritabanından silindi<p>";
else
	echo "<p>Resim veritabanından silinemedi</p>";
header("Refresh: 2; url=http://127.0.0.1:8080/emlak/duzenle.php?id=".$geri."");

?>
	
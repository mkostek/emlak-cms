

<?php
require "connect.php";
include "include.html";
$id=$_GET["id"];
$sql="select resimKonum as a from resim where pId and pId=".$id."";  
$result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$resimKonum=$row["a"];	
		if(unlink($resimKonum))
			echo "<p>Resim klasörden silindi</p>";
			else	
			echo "<p>Resim klasörden silinemedi</p>";
	}
 }
$sql="delete from resim where pId=".$id."";
if ($conn->query($sql) === TRUE) 
	echo "<p>Resim veritabanından silindi<p>";
else
	echo "<p>Resim veritabanından silinemedi</p>";

$sql="delete from portfoy where pId=".$id."";
if ($conn->query($sql) === TRUE) 
	echo "<p>Portföy veritabanından silindi<p>";
else
	echo "<p>Portföy veritabanından silinemedi</p>";
header("Refresh: 1; url=http://127.0.0.1:8080/emlak");

?>
	
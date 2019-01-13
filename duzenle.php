

<?php 
include "include.html";
require "connect.php";
$id=$_GET["id"];
$sql="select *from portfoy where pId=".$id."";
$result = $conn->query($sql);
	 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	$adres=$row["adres"];
	$fiyat=$row["fiyat"];
	$aciklama=$row["aciklama"];
	$alan=$row["alan"];
	$sat=$row["satilik"];
	$gizli=$row["pId"];
	}
}
?>
<form action="guncelle.php" method="post">
<input type="hidden" name="id" value="<?php echo $gizli; ?>"/>
satilik kiralik:<select name="ev">
  <option <?php if($sat==0)echo "selected";?> value="0">kiralik </option>
  <option <?php if($sat==1)echo "selected";?> value="1">satilik</option>
</select><br>
adresi giriniz:<input type="text" name="adres" value=<?php echo $adres;?>><br>
ucretini giriniz:<input type="text" name="ücret" value=<?php echo$fiyat;?>><br>
aciklama:<input type="text" name="aciklama" value="<?php echo $aciklama;?>"><br>
metrekare:<input type="text" name="alan" value=<?php echo $alan;?>><br>
kac tane resim gireceksiniz:<input type="text" name="resim" value="0"><br>
<input type="submit" value="güncelle">
</form>

<h1>Resimleri</h1>
<div style='overflow-x:auto;'>
<table style='width:30%'>
  <tr>
    <th>Resim</th>
    <th></th> 
	</tr>
	<?php
$sql="select *from resim where pId=".$id."";
$result = $conn->query($sql);
 if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<tr><td><img border=1 width=200 height=200 src=".$row["resimKonum"]."><td><td><a href=silResim.php?id=".$row["resimId"]."&geri=".$id.">sil</a></td></tr>";
}
}
?>
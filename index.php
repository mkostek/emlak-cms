
<?php
require "connect.php";
include "include.html";
if(empty($_POST['numara']))
$sql="select *from portfoy where alan>=".$_POST['alan']." and fiyat<".$_POST['fiyat']." and satilik=".$_POST['satılık']." and aciklama like '%".$_POST['aciklama']."%' and adres like '%".$_POST['adres']."%'" ;
else $sql="select *from portfoy where pId=".$_POST['numara']."";
	
$result = $conn->query($sql);
?>
<form method="post" action="index.php">
<h1>Portföyler</h1><div style='overflow-x:auto;'>
<table style='width:100%'>
  <tr>
    <th>portföy numarası</th>
    <th>daire alanı(büyüğünü)</th> 
    <th>fiyat(düşüğünü)</th>
	<th>sat/kira</th>
    <th>adres</th> 
    <th>açıklama</th>
	</tr>
	<tr>
	<th><input type="text" name="numara"></th>
    <th><input type="text" value="100" name="alan"></th> 
    <th><input type="text" value="1500" name="fiyat"></th>
	<th><select name="satılık"><option selected value="0">kira</option><option value="1" >satılık</option></th>
    <th><input type="text" name="adres"></th> 
    <th><input type="text" name="aciklama"></th>
	<th><input type="submit" value="ara" /></th>
  </tr>
 <?php
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
  echo "<tr>
    <td>" . $row["pId"]. "</td>
    <td>" . $row["alan"]. " m^2 </td> 
    <td> " . $row["fiyat"]. "</td>
	    <td ";
if($row["satilik"]==0) echo "bgcolor='#FF0000'>kiralık</td>"; else echo "bgcolor='#00FF00'>satılık</td>";
echo    "<td>".$row["aciklama"]. " </td> 
    <td>".$row["adres"]." </td>
    <td><a href=duzenle.php?id=".$row["pId"].">güncelle</a></td>
	<td><a href=portfoySil.php?id=".$row["pId"].">sil</a></td>
  </tr>";
    }
} else {
    echo "0 results";
}
echo "</table></div></form>";
$conn->close();
?>
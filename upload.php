
<?php
include "include.html";
require_once "connect.php";
foreach ($_FILES["resimler"]["error"] as $anahtar => $hata) {
    if ($hata == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["resimler"]["tmp_name"][$anahtar];
        $name = $_FILES["resimler"]["name"][$anahtar];
        move_uploaded_file($tmp_name, "uploads/".$name);
		echo $tmp_name." yüklendi.";
		$sql = "insert into resim(pId,resimKonum) values(".$_POST["gizli"].",'uploads/".$name."') ";
			if ($conn->query($sql) === TRUE) {
			echo " başarı ile eklendi...<br>";
			} else {
			echo "hata: " . $sql . " " . $conn->error;
			}
    }
	 echo "başarı ile yüklendi...";
}
header("Refresh: 1; url=http://127.0.0.1:8080/emlak");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="obrisi.js"></script>
</head>
<body>
<div name="tabela_tura">
<?php
include "konekcija.php";

$sql="SELECT idtura,ruta,napomena, datum, CONCAT(ime,' ',prezime) as imeprezime, reg_br FROM tura,vozac,kamion
where tura.idvozac=vozac.idvozac and tura.idkamion=kamion.idkamion";
if (!$q=$mysqli->query($sql)){
die ("Nastala je greška pri izvođenju upita<br/>" . $mysqli->error);
}
if ($q->num_rows==0){
echo "Nema tura";
} 
else {
//prelazi se u HTML ispis
?>
<table id="ta" width="600" border="1" cellpadding="5" cellspacing="2" style="text-align:center ">
<tr>
<td><b>Ruta</b></td>
<td><b>Napomena</b></td>
<td><b>Datum</b></td>
<td><b>Vozac</b></td>
<td><b>Kamion</b></td>
</tr>
<?php
while ($red=$q->fetch_object()){
?>
<tr>
<td><?php echo $red->ruta; ?></td> 
<td><?php echo $red->napomena; ?></td>
<td><?php echo $red->datum; ?></td>
<td><?php echo $red->imeprezime; ?></td> 
<td><?php echo $red->reg_br; ?></td>
<?php
}
?>
</table>
<?php
}
$mysqli->close();
?>
</div>

</body>
</html>

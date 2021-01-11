<?php
      
include "konekcija.php";

$sql="SELECT idtura,ruta,napomena, datum, CONCAT(ime,' ',prezime) as imeprezime, reg_br FROM tura,vozac,kamion
where tura.idvozac=vozac.idvozac and tura.idkamion=kamion.idkamion
order by reg_br asc";
if (!$q=$mysqli->query($sql)){
die ("Nastala je greška pri izvođenju upita<br/>" . $mysqli->error);
}
if ($q->num_rows==0){
echo "Nema tura";
} 
else {
//prelazi se u HTML ispis
?>
<table id="tureASC" width="1000" height="200" border="4" cellpadding="10" cellspacing="5" style="text-align:center ">
<tr>
<td><b>ID</b></td>
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
<td><?php echo $red->idtura; ?></td> 
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
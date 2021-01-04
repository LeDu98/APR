<?php
    include "konekcija.php";
    $sql="SELECT reg_br FROM kamion";
$rezultat = $mysqli->query($sql);
?>
<form> 
<b>Izaberi kamion:</b>
<select name="kamion">
<?php
while($red = $rezultat->fetch_object()){
?>
<option value="<?php echo $red->idkamion;?>"><?php echo $red->reg_br;?></option>
<?php
}
?>
</select>
</form>
<?php
$mysqli->close();
?>
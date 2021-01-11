<?php
    include "konekcija.php";
    $sql="SELECT concat(ime,' ',prezime) as imeprezime FROM vozac";
$rezultat = $mysqli->query($sql);
?>
<form> 
<b>Izaberi vozaca:</b>
<select name="vozac">
<?php
while($red = $rezultat->fetch_object()){
?>
<option name="option_vozac" value="<?php echo $red->idvozac;?>"><?php echo $red->imeprezime;?></option>

<?php

}
?>
</select>
</form>
<?php
$mysqli->close();
?>
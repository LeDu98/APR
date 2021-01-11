<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dodaj</title>
  <meta charset="utf-8">
  <meta name="viewport" http-equiv="Content-Type" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 180%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>
<?php require "include/navbar.php"?>

<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    <div id="tabela_vozaca" name="tabela_vozaca">
      <h3>Prikaz svih vozaca</h3>
      <?php
include "konekcija.php";

$sql="SELECT idvozac,CONCAT(ime,' ',prezime) as imeprezime FROM vozac";
if (!$q=$mysqli->query($sql)){
die ("Nastala je greška pri izvođenju upita<br/>" . $mysqli->error);
}
if ($q->num_rows==0){
echo "Nema vozaca";
} 
else {
//prelazi se u HTML ispis
?>
<table id="taVozac" width="190" height="350" border="4" cellpadding="10" cellspacing="5" style="text-align:center ">
<tr>
<td><b>ID</b></td>
<td><b>Ime i prezime</b></td>
</tr>
<?php
while ($red=$q->fetch_object()){
?>
<tr>
<td><?php echo $red->idvozac; ?></td> 
<td><?php echo $red->imeprezime; ?></td>

<?php
}
?>
</table>
<?php
}
$mysqli->close();
?>
    
  </div>


    </div>
    <div class="col-sm-8 text-left"> 
      <h2>Dodaj novi kamion, vozaca ili tura u bazu</h2>
     <hr>

     
  <div name="odabir_tabele" id="odabir_tabele">
            <input type="radio" name="odabir_tabele" id="radio_tura" value="tura" checked>
            <label for="radio_tura">Tura</label>
            <input type="radio" name="odabir_tabele" id="radio_vozac" value="vozac">
            <label for="radio_vozac">Vozac</label>
            <input type="radio" name="odabir_tabele" id="radio_kamion" value="kamion">
            <label for="radio_kamion">Kamion</label>
        </div>
        <br>
      <hr>
        
        <div id="tura_post">
        <form method="post" action="">
            <input type="text" name="ruta_ture" placeholder="Unesite rutu">
            <br>
            <br>
            <textarea name="napomena_ture" id="napomena_ture" cols="30" rows="5" placeholder="Napomena"></textarea>
            <br>
            <br>
            <input type="text" name="datum_ture" placeholder="Primer: 2020-12-31">
<br>
<input type="text" name="vozacid" placeholder="Unesite id vozaca">
<br>
<input type="text" name="kamionid" placeholder="Unesite id kamiona">
      

<br>
<input type="submit" name="unosture" value="Dodaj novu turu"/>

           </form>
           <?php
if (isset($_POST['unosture'])){
//Prikupljanje podataka sa forme

$ruta_ture = $_POST['ruta_ture'];
$napomena_ture = $_POST['napomena_ture'];
$datum_ture = $_POST['datum_ture'];
$vozac = (int)$_POST['vozacid'];
$kamion=(int)$_POST['kamionid'];


include "konekcija.php";
if (!empty($ruta_ture) && !empty($datum_ture)&& !empty($vozac)&& !empty($kamion)){

  
//Operacije nad bazom

$sql="INSERT INTO tura (ruta,napomena,datum,idvozac,idkamion) VALUES ('".$ruta_ture."', '".$napomena_ture."','".$datum_ture."','".$vozac."','".$kamion."')";
if ($mysqli->query($sql)){
echo "<p>Tura uspesno dodata</p>";
} else {
echo "<p>Nastala je greška pri unosu nove ture</p>" . $mysqli->error;
}
} else {
//Ako POST parametri nisu prosleđeni
echo "Nisu prosleđeni obavezni parametri!";

}
$mysqli->close();
}
?>

        </div>

    <div id="vozac_post">
    <form method="post" action="">
    <input type="text" name="ime_vozac" placeholder="Unesite ime vozaca:">
    <br>
    <input type="text" name="prezime_vozac" placeholder="Unesite prezime vozaca:">
    <br>
    <input type="text" name="jmbg_vozac" placeholder="Unesite JMBG vozaca:">
    <br>
    <input type="submit" name="unosvozaca" value="Dodaj vozaca"/>
    </form>
    <?php
if (isset($_POST["unosvozaca"])){
//Prikupljanje podataka sa forme

$ime_vozac = $_POST['ime_vozac'];
$prezime_vozac = $_POST['prezime_vozac'];
$jmbg_vozac = $_POST['jmbg_vozac'];
include "konekcija.php";
if (!empty($ime_vozac) && !empty($prezime_vozac) && !empty($jmbg_vozac)){


//Operacije nad bazom

$sql="INSERT INTO vozac (ime,prezime,jmbg) VALUES ('".$ime_vozac."', '".$prezime_vozac."','".$jmbg_vozac."')";
if ($mysqli->query($sql)){
echo "<p>Vozac uspesno dodat</p>";
} else {
echo "<p>Nastala je greška pri ubacivanju vozaca</p>" . $mysqli->error;
}
} else {
//Ako POST parametri nisu prosleđeni
echo "Nisu prosleđeni parametri!";

}
$mysqli->close();
}
?>

    </div>
    
    
    <div id="kamion_post">
    <form method="post" action="">
    <input type="text" name="model_kamion" placeholder="Unesite model kamiona">
    <br><br>
    <input type="text" name="reg_br_kamion" placeholder="Unesite registraciju">
    <br><br>
    <input type="submit" name="unoskamiona" value="Dodaj kamion"/>
    <br><br>
  </form>
  <?php
if (isset($_POST["unoskamiona"])){
//Prikupljanje podataka sa forme

$model_kamion = $_POST['model_kamion'];
$reg_br_kamion = $_POST['reg_br_kamion'];

include "konekcija.php";
if (!empty($model_kamion) && !empty($reg_br_kamion)){


//Operacije nad bazom

$sql="INSERT INTO kamion (model,reg_br) VALUES ('".$model_kamion."', '".$reg_br_kamion."')";
if ($mysqli->query($sql)){
echo "<p>Kamion je uspesno dodat</p>";
} else {
echo "<p>Nastala je greška pri ubacivanju kamiona</p>" . $mysqli->error;
}
} else {
//Ako POST parametri nisu prosleđeni
echo "Nisu prosleđeni parametri!";

}
$mysqli->close();
}
?>

    </div>
  
    


    <div id="greska">
    </div>
    
     
    </div>
    <div class="col-sm-2 sidenav">
    <div id="tabela_kamiona" name="tabela_kamiona">
      <h3>Prikaz svih kamiona</h3>
      <?php
include "konekcija.php";

$sql="SELECT idkamion,reg_br FROM kamion";
if (!$q=$mysqli->query($sql)){
die ("Nastala je greška pri izvođenju upita<br/>" . $mysqli->error);
}
if ($q->num_rows==0){
echo "Nema kamiona";
} 
else {
//prelazi se u HTML ispis
?>
<table id="takamion" width="190" height="350" border="4" cellpadding="10" cellspacing="5" style="text-align:center ">
<tr>
<td><b>ID</b></td>
<td><b>Registracija</b></td>
</tr>
<?php
while ($red=$q->fetch_object()){
?>
<tr>
<td><?php echo $red->idkamion; ?></td> 
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
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
<p>Autoprevoznicka radnja</p>
  <p>Telefon: 011/8000-800</p>
  <p>e-mail: apr@support.com</p>
  
</footer>

</body>
<?php require "estetikadodaj.php"?>


</html>

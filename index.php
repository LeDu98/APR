<!DOCTYPE html>
<html lang="en">
<head>
  <title>Autoprevoznicka radnja</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" http-equiv="Content-Type">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="jquery-1.10.2.js"></script>
<script type="text/javascript">
$(document).ready(function () {
$(".obrisi_link").click(function(){
var vrednost = ($(this).attr("idtura")).substring(7);
var red_tabele = $(this);
$.get("obrisi.php", { idtura: vrednost },
   function(data){
   if (data == 1){
   $(red_tabele).parent().parent().remove();
   }   
   });
});
});
</script>

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
      height: 100%;
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
      
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Dobrodosli na sajt autoprevoznicke radnje</h1>
      <p>Sajt je osmisljen kako bi olaksao vlasnicima evidenciju o turama i olaksao manipulisanje podacima o njima. Takodje moguce je voditi i evidenciju o vozacima i kamionima koji ucestvuju u istim.</p>
      <hr>
      <h3>Prikaz svih tura</h3>
      <div name="tabela_tura" id="tabela_tura">

      Sortiraj po: <input type="radio" name="tabela_tura" id="radio_id" value="idi" checked>
           <label for="radio_id">ID-u</label>
            <input type="radio" name="tabela_tura" id="radio_datumASC" value="datumASC">
            <label for="radio_datumASC">Datumu rastuce</label>
            <input type="radio" name="tabela_tura" id="radio_datumDESC" value="datumDESC">
            <label for="radio_datumDESC">Datumu opadajuce</label>
            <input type="radio" name="tabela_tura" id="radio_vozac" value="vozac">
            <label for="radio_vozac">Vozacima</label>
            <input type="radio" name="tabela_tura" id="radio_kamion" value="kamion">
            <label for="radio_kamion">Kamionima</label>
            </div>
            <hr>

<div id="sortIndeks">
<?php require "turePrikaz/turepoID.php"?>
</div>

<div id="sortDatumASC">
<?php require "turePrikaz/turepodatumuASC.php"?>
</div>

<div id="sortDatumDESC">
<?php require "turePrikaz/turepodatumuDESC.php"?>
</div>

<div id="sortVozac">
<?php require "turePrikaz/turepoVozacu.php"?>
</div>

<div id="sortKamion">
<?php require "turePrikaz/turepoKamionu.php"?>
</div>


  

  

</div>

</div>

<div id="dugme">
<button onclick="location.href = 'dodaj.php';" id="dodajT" class="float-left submit-button" >Dodaj novu turu</button>
</div>
<br>
    <h3>Obrisi turu:</h3>
<form method="delete" action="">
    <div id="obrisi_turu">
    <input type="text" name="idtureBrisanje" placeholder="Unesi id ture">
    <input type="submit" name="obrisiTuru" value="Obrisi turu">
</form>
<?php
include "konekcija.php";
if (isset ($_GET['obrisiTuru']) && isset ($_GET['idtureBrisanje'])){
  if(!empty($_GET['idtureBrisanje'])){
$idtureBrisanje = (int)$_GET['idtureBrisanje'];

  $upit = "DELETE FROM tura WHERE idtura = ".$idtureBrisanje;
if (!$q=$mysqli->query($upit)){
echo "Nastala je greska pri izvodenju upita<br/>" . mysql_query();
die();
} else {
echo "<p>Brisanje ture je uspešno!</p>";
}
  }else{
    echo "<p>Niste prosledili parametre!</p>";
  }
}
$mysqli->close();
?>
   
    </div>
<div id="izmeniTuru">
<h3>Izmeni turu:</h3>
    <form method="post" action="">

Unesite ID ture: <input type="text" name="idt" placholder="Unesite id ture">

Unesite rutu ture:<input type="text" name="rutat" placholder="Unesite rutu ture">
<br><br>
Napomena: <input type="text" name="napomenat" placholder="Napomena">

Datum ture:<input type="text" name="datumt" placholder="Primer: 2020-12-31">
<br><br>
Unesite ID vozaca:<input type="text" name="idv" placholder="Unesite id vozaca">

Unesite ID kamiona:<input type="text" name="idk" placholder="Unesite id kamiona">
<br><br>
<input type="submit" name="izmenature" value="Izvrsite izmenu">
<br><br>
</form>

<?php
include "konekcija.php";
if (isset ($_POST['izmenature'])){
$idt = (int)$_POST['idt'];
$rutat = $_POST['rutat'];
$napomenat = $_POST['napomenat'];
$datumt = $_POST['datumt'];
$idv = (int)$_POST['idv'];
$idk = (int)$_POST['idk'];

if(!empty($_POST['idt'])&&!empty($_POST['rutat'])&&!empty($_POST['datumt'])&&!empty($_POST['idk'])&&!empty($_POST['idk'])){


$upit="UPDATE tura SET idtura='". $idt ."', ruta='" . $rutat . "', napomena='" . $napomenat . "', datum='" . $datumt . "', idvozac='" . $idv . "', idkamion='" . $idk . "' WHERE idtura=". $idt;
if ($mysqli->query($upit)){
if ($mysqli->affected_rows > 0 ){
echo "<p>Tura je uspešno izmenjena.</p>";
} else {
echo "<p>Tura nije izmenjena.</p>";
}
} else {
echo "<p>Nastala je greška pri izmeni ture</p>" . mysql_error();
}

}
else{
  echo "<p>Niste uneli sve parametre</p>";
}
}
$mysqli->close();
?>

</div>



<footer class="container-fluid text-center">
  <p>Autoprevoznicka radnja</p>
  <p>Telefon: 011/8000-800</p>
  <p>e-mail: apr@support.com</p>
  
</footer>

</body>
<?php require "sortIndexture.php"?>
</html>





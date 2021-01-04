<!DOCTYPE html>
<html lang="en">
<head>
  <title>Autoprevoznicka radnja</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" http-equiv="Content-Type">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="obrisi.js"></script>
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
      <div id="tabela_tura" name="tabela_tura">
      <h3>Prikaz svih tura</h3>
      <?php
include "konekcija.php";

$sql="SELECT idtura,ruta,napomena, datum, CONCAT(ime,' ',prezime) as imeprezime, reg_br FROM tura,vozac,kamion
where tura.idvozac=vozac.idvozac and tura.idkamion=kamion.idkamion
order by datum desc";
if (!$q=$mysqli->query($sql)){
die ("Nastala je greška pri izvođenju upita<br/>" . $mysqli->error);
}
if ($q->num_rows==0){
echo "Nema tura";
} 
else {
//prelazi se u HTML ispis
?>
<table id="ta" width="1000" height="200" border="4" cellpadding="10" cellspacing="5" style="text-align:center ">
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
</div>
</div>

<footer class="container-fluid text-center">
  <p>Autoprevoznicka radnja</p>
  <p>Telefon: 011/8000-800</p>
  <p>e-mail: apr@support.com</p>
  
</footer>

</body>
</html>





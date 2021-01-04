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
      <h2>Dodaj novi kamion, vozaca ili tura u bazu</h2>
     <hr>

     <form action="">
  <div name="odabir_tabele" id="odabir_tabele">
            <input type="radio" name="odabir_tabele" id="radio_tura" value="tura">
            <label for="radio_tura">Tura</label>
            <input type="radio" name="odabir_tabele" id="radio_vozac" value="vozac">
            <label for="radio_vozac">Vozac</label>
            <input type="radio" name="odabir_tabele" id="radio_kamion" value="kamion">
            <label for="radio_kamion">Kamion</label>
        </div>
        <br>
      <hr>
        
        <div id="tura_post">
            <input type="text" name="ruta_ture" placeholder="Unesite rutu">
            <br>
            <br>
            <textarea name="napomena_ture" id="napomena_ture" cols="30" rows="5" placeholder="Napomena"></textarea>
            <br>
            <br>
            <input type="date" name="datum_ture">
<br>
<br>
      
<?php require "selectvozaci.php"?>
<br><br>
<?php require "selectkamioni.php"?>

            
        </div>

    <div id="vozac_post">
    <input type="text" name="ime_vozac" placeholder="Unesite ime vozaca:">
    <br>
    <input type="text" name="prezime_vozac" placeholder="Unesite prezime vozaca:">
    <br>
    <input type="text" name="jmbg_vozac" placeholder="Unesite JMBG vozaca:">
    <br>

    </div>
    
    <div id="kamion_post">
    <input type="text" name="model_kamion" placeholder="Unesite model kamiona:">
    <br>
    <input type="text" name="reg_br_kamion" placeholder="Unesite registarski broj kamiona:">
   
    <br>

    </div>
    <div id="greska">
    </div>
    <div id="submit">
            <button type="button">Posalji zahtev</button>
        </div>
     
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
<?php require "estetikadodaj.php"?>


</html>

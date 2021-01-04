<script>
    var nizBlokova = ["tura_post","vozac_post","kamion_post","greska"];

    //na samom početku želimo da sakrijemo sve blokove, dok korisnik ne odabere tip tabele i HTTP zahteva
    function skloniBlokove(){
        //prolazimo kroz niz blokova
        for(const blok of nizBlokova){
            //i vrednost display atributa u okviru css-a postavljamo na none, kako se ne bi prikazivali
            document.getElementById(blok).style.display="none";
        }
    };
    //pozivamo funkciju da se izvrši
   skloniBlokove();

    //prikaziBlok funkcija koristeći switch prolazi kroz sve tipove zahteva koji mogu biti odabrani
    //$("input[name=http_zahtev]:checked")[0].id je jQuery funkcija koja nam omogućava da 
    // dođemo do svih čekiranih input polja čiji je name http_zahtev 
    // i da pristupimo njegovom id-u jer su kao id postavljene vrednosti get post put delete 
    function prikaziBlok(){
        switch($("input[name=odabir_tabele]:checked")[0].id){
            case "radio_tura":
            // u slučaju da odaberemo get, sakrićemo sve prethodno prikazane div-ove
                skloniBlokove();
                //obrisaćemo unutrašnji HTML get_odgovor bloka 
                document.getElementById("tura_post").innerHTML="";
                // i prikazati ga da bude vidljiv, promenom atributa display sa none na block
                document.getElementById(nizBlokova[0]).style.display="block";
                break;
            case "radio_vozac":
            // u slučaju da odaberemo post, sakrićemo sve prethodno prikazane div-ove
                skloniBlokove();
                //proverićemo da li je odabrana tabela novosti ili kategorije
                document.getElementById("vozac_post").innerHTML="";
                // i prikazati ga da bude vidljiv, promenom atributa display sa none na block
                document.getElementById(nizBlokova[0]).style.display="block";
                break;
                
                
            case "radio_kamion":
            /// u slučaju da odaberemo post, sakrićemo sve prethodno prikazane div-ove
            skloniBlokove();
                //proverićemo da li je odabrana tabela novosti ili kategorije
                document.getElementById("kamion_post").innerHTML="";
                // i prikazati ga da bude vidljiv, promenom atributa display sa none na block
                document.getElementById(nizBlokova[0]).style.display="block";
                break;
            default:
                break;
            }}
        //funkcija resetHTTP nam samo resetuje odabrane HTTP zahteve nakon promene odabrane tabele  
    function resetHTTP(){
        skloniBlokove();
        $("input[name=odabir_tabele]").prop('checked', false);
    }

    

    $("input[name=odabir_tabele]").on('click',prikaziBlok);
   
    
    



</script>
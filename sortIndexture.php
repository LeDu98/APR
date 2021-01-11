<script>
    var nizBlokova = ["sortIndeks","sortDatumASC","sortDatumDESC","sortVozac","sortKamion"];
    

    //na samom početku želimo da sakrijemo sve blokove, dok korisnik ne odabere tip tabele i HTTP zahteva
    function skloniBlokove(){
        //prolazimo kroz niz blokova
        for(const blok of nizBlokova){
            //i vrednost display atributa u okviru css-a postavljamo na none, kako se ne bi prikazivali
            document.getElementById(blok).style.display="none";
        }
    };
    function OstaviID(){
        
        document.getElementById('sortDatumASC').style.display="none";
        document.getElementById('sortDatumDESC').style.display="none";
        document.getElementById('sortVozac').style.display="none";
        document.getElementById('sortKamion').style.display="none";
    
};
OstaviID();
   
    //prikaziBlok funkcija koristeći switch prolazi kroz sve tipove zahteva koji mogu biti odabrani
    //$("input[name=http_zahtev]:checked")[0].id je jQuery funkcija koja nam omogućava da 
    // dođemo do svih čekiranih input polja čiji je name http_zahtev 
    // i da pristupimo njegovom id-u jer su kao id postavljene vrednosti get post put delete 
    function prikaziBlok(){
        switch($("input[name=tabela_tura]:checked")[0].id){
            case "radio_id":
            // u slučaju da odaberemo get, sakrićemo sve prethodno prikazane div-ove
            skloniBlokove();
                //obrisaćemo unutrašnji HTML get_odgovor bloka 
               
                // i prikazati ga da bude vidljiv, promenom atributa display sa none na block
                document.getElementById(nizBlokova[0]).style.display="block";
                break;
            case "radio_datumASC":
            // u slučaju da odaberemo post, sakrićemo sve prethodno prikazane div-ove
            skloniBlokove();
                //proverićemo da li je odabrana tabela novosti ili kategorije
               
                // i prikazati ga da bude vidljiv, promenom atributa display sa none na block
                document.getElementById(nizBlokova[1]).style.display="block";
                break;
                
                
            case "radio_datumDESC":
            /// u slučaju da odaberemo post, sakrićemo sve prethodno prikazane div-ove
            skloniBlokove();
                //proverićemo da li je odabrana tabela novosti ili kategorije
              
                // i prikazati ga da bude vidljiv, promenom atributa display sa none na block
                document.getElementById(nizBlokova[2]).style.display="block";
                break;

                case "radio_vozac":
            /// u slučaju da odaberemo post, sakrićemo sve prethodno prikazane div-ove
            skloniBlokove();
                //proverićemo da li je odabrana tabela novosti ili kategorije
              
                // i prikazati ga da bude vidljiv, promenom atributa display sa none na block
                document.getElementById(nizBlokova[3]).style.display="block";
                break;
                case "radio_kamion":
            /// u slučaju da odaberemo post, sakrićemo sve prethodno prikazane div-ove
            skloniBlokove();
                //proverićemo da li je odabrana tabela novosti ili kategorije
              
                // i prikazati ga da bude vidljiv, promenom atributa display sa none na block
                document.getElementById(nizBlokova[4]).style.display="block";
                break;
            default:
                break;
            }}
        //funkcija resetHTTP nam samo resetuje odabrane HTTP zahteve nakon promene odabrane tabele  
   
        function resetHTTP(){
        skloniBlokove();
        $("input[name=tabela_tura]").prop('checked', false);
    }
    
    
    $("input[name=tabela_tura]").on('click',prikaziBlok);
   
    
    



</script>
<div class="details">
    <h2 class="m-1"><?php echo $nome; ?></h2>
    <div class="img">
        <img class="my-2" src="<?php echo IMAGES_DIR; ?>test.jpg" alt="logo"/>
    </div>
    <div class="main m-1">        
        <h4>Prezzo: <?php echo $prezzo; ?>€</h4>
        <label class="title font-weight-bold">Dettaglio del prodotto</label>
        <p><?php echo $descrizione; ?></p>
    </div>
    <div class="side">         
        <?php if($quantita = 0){
            echo "<p class=\"mx-1\">Prodotto non disponibile</p>";
        }
        else{
            echo "<p class=\"mx-1\">Disponibilità immediata</p>";
            echo "<form action=\"\" method=\"post\">";        
            echo "<button name =\"nome\" value=\"\" type=\"submit\">Aggiungi al carrello</button>";
            echo "</form>";
        }
            ?>  
               
        <p class="mx-1">Venduto da: <?php echo $venditore; ?></p>
    </div>     
</div>
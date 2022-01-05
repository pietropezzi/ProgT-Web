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
    <div class="side text-center">         
        <?php if($quantita == 0 ){
            echo "<p class=\"disponibility mx-1 text-danger\">Prodotto non disponibile</p>";
        }

        else{
            echo "<p class=\"disponibility mx-1 text-success\">Disponibilità immediata</p>";

            if(!(isset($_SESSION["email"]))){                
                echo "<p class=\"disponibility mx-1 text-danger\">Esegui il Login prima</p>";
            }

            else{               
                echo "<form action=\"add_to_cart.php\" method=\"post\">";  
                    echo "<input type=\"hidden\" name=\"venditore\" value=\"$venditore\"/>";
                    echo "<input type=\"hidden\" name=\"prezzo\" value=\"$prezzo\"/>";
                    echo "<label class=\"mx-2\">Quantità:</label>";
                    echo "<input type=\"number\" step=\"1\" min=\"1\" max=\"$quantita\" id=\"quantità\" name=\"quantità\" value=\"1\" title=\"Qty\" class=\"input-text\"><br>";
                    echo "<button class=\"cartBtn text-white my-2\" name=\"nome\" value=\"$nome\" type=\"submit\">Aggiungi al carrello</button>";
                echo "</form>";
            }
        }
            ?>  
               
        <p class="seller mx-1 mb-2">Venduto da: <?php echo $venditore; ?></p>
    </div>     
</div>
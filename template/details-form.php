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
        <?php if(!(isset($_SESSION["email"]))){ ?>          
            <p class="disponibility mx-1 text-danger">Esegui prima il Login</p>
        <?php } 

        else if($_SESSION["email"] == $venditore){ ?>
            <p class="disponibility mx-1 ">Il tuo prodotto</p>
            <p class="mx-2">Prodotti rimasti: <?php echo $quantita?></p>
            <form action="" method="post">  
                <input type="hidden" name="venditore" <?php echo $venditore?>/>                
                <label class="mx-2">Quantità:</label>
                <input class="quantity my-2" type="number" step="1" min="1" max="" name="quantità" value="<?php echo $quantita?>"><br>
                <button class="cartBtn text-white my-2\" name="nome" value="$nome" type="submit">Aggiorna la quantità</button>
            </form>
        <?php }
    
        else if($quantita == 0 ){?>
            <p class="disponibility mx-1 text-danger">Prodotto non disponibile</p>
        <?php }

        else{ ?>
            <p class="disponibility mx-1 text-success">Disponibilità immediata</p>                       
            <form action="add_to_cart.php" method="post"> 
                <input type="hidden" name="venditore" value="<?php echo $venditore?>"/>
                <input type="hidden" name="prezzo" value="$prezzo">
                <label class="mx-2">Quantità:</label>
                <input type="number" step="1" min="1" max="<?php echo $quantita?>" id="quantità" name="quantità" value="1" class="quantity"><br>
                <button class="cartBtn text-white my-2" name="nome" value="<?php echo $nome?>" type="submit">Aggiungi al carrello</button>
            </form>            
        <?php } ?>

        <p class="seller mx-1 mb-2">Venduto da: <?php echo $venditore; ?></p>
    </div>     
</div>
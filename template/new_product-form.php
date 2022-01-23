<script src="js/checkProductForm.js"></script>
<?php if(isset($ErrorMessage)): ?> 
<div class="errormessage">
    <h2 class="font-verdana text-center"><?php echo $ErrorMessage; ?></h2>
</div>
<?php endif; ?>
<div class="my-4 text-white register">
   <label class="mb-2">Inserisci un nuovo Prodotto</label>
   <!--TODO non visualizza ma funziona -->
   <span class="text-white" id="err_prod"></span>
   <div>   
		<form name="new_product" id="prod" action="insert_product.php" method="post" enctype="multipart/form-data">
			<div>				
                <div class="input-box">
                    <label class="mb-1">Nome</label><br>
                    <input class="text-input" id="nome" name="nome" type="text" placeholder="Inserisci il nome del tuo prodotto" required>
                </div>
                <div class="input-box">
                    <label class="mb-1">Prezzo</label><br>
                    <input class="text-input" id="prezzo" name="prezzo" type="text" placeholder="Inserisci il prezzo del tuo prodotto" required>
                </div>
                <div class="input-box">
                    <label class="mb-1">Breve descrizione</label><br>
                    <textarea rows = "2" cols = "50" name = "breve_descrizione" id="breve_descrizione" class="text-input" placeholder="Inserisci una breve descrizione del tuo prodotto"></textarea>
                </div>
                <div class="input-box">
                    <label class="mb-1">Descrizione</label><br>
                    <textarea rows ="5" cols="50" name="descrizione" id="descrizione" class="text-input" placeholder="Inserisci la descrizione del tuo prodotto"></textarea>                 
                </div>
                <label class="mb-1">Immagine prodotto</label><br>
                <input type="file" name="immagine_prodotto" id="immagine_prodotto"><br>
                <label class="mb-1">Tipo di Prodotto</label><br>
                <select id="tipo" name="tipo">
                    <option value="cpu">CPU/Processore</option>
                    <option value="cpu_cooling">Raffredamento della CPU</option>
                    <option value="motherboard">Scheda Madre</option>
                    <option value="memory">Memoria</option>
                    <option value="grafic">Scheda Video</option>
                    <option value="power">Alimentatore</option>
                    <option value="storage">Memoria di Massa</option>
                    <option value="fan">Ventola del Case</option>
                    <option value="case">Case</option>
                </select>         
            </div>
            <div class="quantity_buttons">
                <label class="mb-1">Quanti prodotti hai del genere?</label><br>
	            <input type="number" step="1" min="1" max="" id="quantità" name="quantità" value="1" title="Qty" class="input-text">
            </div>
            <div>
                <input class="button text-white mt-2" type="submit" value="Inserisci il tuo nuovo prodotto">
            </div>
        </form>
    </div>
</div>
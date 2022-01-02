<div class="my-4 text-white register">
   <label class="mb-2">Inserisci un nuovo Prodotto</label>
   <div>
		<form name="new_product" id="new_product" action="insert_product.php" method="post">
			<div>
				<div class="input-box">
					<label class="mb-1">ID Prodotto</label><br>
                    <input class="text-input" id="idprod" name="idprod" type="text" placeholder="Inserisci l'ID del tuo prodotto" required>
                </div>
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
            </div>
            <div>
                <input class="button text-white mt-2" type="submit" value="Inserisci il tuo nuovo prodotto">
            </div>
        </form>
    </div>
</div>
function checkProductForm() {
    
	/* Togliere i commenti alla consegna*/
	var prezzo = document.getElementById("prezzo").value
	var breve_descrizione = document.getElementById("breve_descrizione").value	
	var descrizione = document.getElementById("descrizione").value	
	//test
	var number = /^[0-9]+$/;   
    var decimal = /^([0-9])+\.[0-9]+$/;	

	if(!(decimal.test(prezzo) || number.test(prezzo))){
		alert('Attenzione: Il prezzo non è nel formato giusto\nRicorda che il formato del prezzo vrevede il punto\nEsempio: 45.32');
		return false;
	}	
				
	if(breve_descrizione.length == 0){
		alert ('Attenzione: La descrizione breve non deve essere vuota');
		return false;
	}
		
	if(descrizione.length == 0){
		alert ('Attenzione: La descrizione non deve essere vuota');
		return false;
	}
}
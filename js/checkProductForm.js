$(document).ready(function(){
	$("#prod").on('submit', function(e){
    
	/* Togliere i commenti alla consegna*/
	var prezzo = document.getElementById("prezzo").value
	var breve_descrizione = document.getElementById("breve_descrizione").value	
	var descrizione = document.getElementById("descrizione").value	
	var immagine = document.getElementById("immagine_prodotto").value

	//test
	var number = /^[0-9]+$/;   
    var decimal = /^([0-9])+\.[0-9]+$/;	

	if(!(decimal.test(prezzo) || number.test(prezzo))){
		$("#err_prod").text("Attenzione: Il prezzo puo essere solo un numero intero oppure decimale.").fadeIn('fast').delay(6000).fadeOut('fast');
		e.preventDefault();				
	}	
			
	else if(breve_descrizione.length == 0){
		$("#err_prod").text("Attenzione: La descrizione breve non deve essere vuota").fadeIn('fast').delay(6000).fadeOut('fast');
		e.preventDefault();				
	}
	
	else if(descrizione.length == 0){
		$("#err_prod").text("Attenzione: La descrizione non deve essere vuota").fadeIn('fast').delay(6000).fadeOut('fast');
		e.preventDefault();				
	}

	else if(immagine.length == 0){
		$("#err_prod").text("Attenzione: Non hai inserito l\'immagine").fadeIn('fast').delay(6000).fadeOut('fast');
		e.preventDefault();				
	}
	});
});


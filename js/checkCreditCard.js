$(document).ready(function(){
	$("#credit").on('submit', function(e){

    var numero = document.getElementById("numero").value;
    var scadenzaMese = document.getElementById("scadenzaMese").value;
    var scadenzaAnno = document.getElementById("scadenzaAnno").value;
    var cvv2 = document.getElementById("cvv2").value;

    var number = /^[0-9]+$/;


		if (!number.test(numero)){
			$("#err_credit").text("Errore: Il numero della carta deve contenere solo numeri.").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();				
		} else if (numero.length != 16) {
			$("#err_credit").text("Errore: Il numero della carta deve essere lungo 16 cifre.").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();
		} else if (!number.test(scadenzaMese)){
			$("#err_credit").text("Errore: Il mese della scadenza deve contenere solo numeri.").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();				
		} else if (scadenzaMese > 12) {
			$("#err_credit").text("Errore: Il mese della scadenza deve essere un vero mese.").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();        
		} else if (scadenzaMese < 1) {
			$("#err_credit").text("Errore: Il mese della scadenza deve essere un vero mese.").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();        
		} else if (!number.test(scadenzaAnno)){
			$("#err_credit").text("Errore: L' anno della scadenza deve contenere solo numeri.").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();				
		} else if (scadenzaAnno < 22) {
			$("#err_credit").text("Errore: La carta di credito non deve essere già scaduta.").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();        
		} else if (scadenzaAnno > 27) {
			$("#err_credit").text("Errore: La carta di credito ha scadenza troppo lunga.").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();        
		} else if (!number.test(cvv2)){
			$("#err_credit").text("Errore: Il cvv2 deve contenere solo numeri.").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();        
		} else if (cvv2.length != 3) {
			$("#err_credit").text("Errore: Il cvv2 deve essere valido.").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();        
		}
	});
});
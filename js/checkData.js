$(document).ready(function(){
	$("#dati").on('submit', function(e){
		var name = document.getElementById("nome").value
		var username = document.getElementById("username").value
		var email = document.getElementById("email").value	
		var phone = document.getElementById("telefono").value	

		var number = /^[0-9]+$/;
		var letters = /^[A-Za-z]+$/;
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		if(name && !letters.test(name)){
			$("#err_dati").text("Attenzione: Il nome deve contenere solo lettere dell\'alfabeto.").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();
		} else if (username && !letters.test(username)) {
			$("#err_dati").text("Attenzione: L\' username deve contenere solo lettere dell\'alfabeto.").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();
		} else if (email && !filter.test(email)){
			$("#err_dati").text("Attenzione: Email non valida.").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();
		} else if (phone && !number.test(phone)){
			$("#err_dati").text("Attenzione: Il numero di telefono deve contenere solo numeri.").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();
		} else if(!phone && !username && !name && !email){
			$("#err_dati").text("Attenzione: Non hai inserito alcun dato da aggiornare.").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();
		}
	});
});


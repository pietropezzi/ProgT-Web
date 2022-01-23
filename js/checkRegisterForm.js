$(document).ready(function(){
	$("#reg").on('submit', function(e){

		/* Togliere i commenti alla consegna*/
		var name = document.getElementById("name").value
		var username = document.getElementById("username").value
		var email = document.getElementById("email").value	
		var phone = document.getElementById("phone").value	
		var psw = document.getElementById("psw").value
		var psw2 = document.getElementById("psw2").value		
	
		//test
		var number = /^[0-9]+$/;
		var letters = /^[A-Za-z]+$/;
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		if(!letters.test(name)){
			$("#err_reg").text("Attenzione: Il nome deve contenere solo lettere dell\'alfabeto.").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();			
		}	

		else if(!letters.test(username)){
			$("#err_reg").text("Attenzione: L\' username deve contenere solo lettere dell\'alfabeto").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();				
		}
	
		else if (!filter.test(email)){
			$("#err_reg").text("Attenzione: Email non valida").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();			
		}
		
		else if (!number.test(phone)){
			$("#err_reg").text("Attenzione: Il numero di telefono deve contenere solo numeri").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();				
		}
	
		else if(phone.length < 9){
			$("#err_reg").text("Attenzione: Il numero di telefono è troppo corto").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();				
		}
		
		else if(phone.length > 15){
			$("#err_reg").text("Attenzione: Il numero di telefono è troppo lungo").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();			
		}
	
		else if(psw != psw2){
			$("#err_reg").text("Attenzione: Le due password non combaciano").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();	
		}
		
		else if(psw.length < 6){
			$("#err_reg").text("Attenzione: La password deve essere lunga almeno 6 caratteri").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();			
		}
		
		else if(psw.length > 40){
			$("#err_reg").text("'Attenzione: La password è troppo lunga").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();				
		}
	});
});


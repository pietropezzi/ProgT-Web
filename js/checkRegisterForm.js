function checkRegisterForm() {
	
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
		alert('Attenzione: Il nome deve contenere solo lettere dell\'alfabeto');
		return false;
	}
		
	if(!letters.test(username)){
		alert('Attenzione: L\' username deve contenere solo lettere dell\'alfabeto');
		return false;
	}	
	
	if (!filter.test(email)){
		alert('Attenzione: Email non valida');
		return false;
	}
		
	if (!number.test(phone)){
		alert('Attenzione: Il numero di telefono deve contenere solo numeri');
		return false;
	}
	
	if(psw != psw2){
		alert ('Attenzione: Le due password non combaciano');
		return false;
	}
		
	if(psw.length < 6){
		alert ('Attenzione: La password deve essere lunga almeno 6 caratteri');
		return false;
	}
		
	if(psw.length > 40){
		alert ('Attenzione: La password è troppo lunga');
		return false;
	}		
}
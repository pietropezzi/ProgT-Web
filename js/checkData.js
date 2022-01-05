function checkData(){
    var name = document.getElementById("nome").value
	var username = document.getElementById("username").value
	var email = document.getElementById("email").value	
	var phone = document.getElementById("telefono").value	

    var number = /^[0-9]+$/;
	var letters = /^[A-Za-z]+$/;
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	if(name && !letters.test(name)){
		alert('Attenzione: Il nome deve contenere solo lettere dell\'alfabeto');
		return false;
	}
		
	if(username && !letters.test(username)){
		alert('Attenzione: L\' username deve contenere solo lettere dell\'alfabeto');
		return false;
	}	

    if (email && !filter.test(email)){
        alert('Attenzione: Email non valida');
        return false;
	}

    if (phone && !number.test(phone)){
		alert('Attenzione: Il numero di telefono deve contenere solo numeri');
		return false;
	}
		
}
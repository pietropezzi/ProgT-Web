function checkRegisterForm() {


  var x = document.forms["registrazione"]["email"].value;
  if (x.indexOf("@") == -1 ) {
    alert("Attenzione: L'email e sbagliata");
    return false;
  }    
  
  var psw = document.getElementById("psw").value
  var psw2 = document.getElementById("psw2").value
  if (psw != psw2) {
    alert("Attenzione: Le due password sono diverse.");
    return false;
	}
}
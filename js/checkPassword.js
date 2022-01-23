$(document).ready(function(){
	$("#pass").on('submit', function(e){
    var oldpass = document.getElementById("oldpass").value;
    var newpass1 = document.getElementById("newpass").value;
    var newpass2 = document.getElementById("newpass2").value;

		if(!oldpass){
			$("#err_pass").text("Attenzione: non è stata inserita alcuna vecchia password.").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();
		} else if (newpass1 != newpass2) {
			$("#err_pass").text("Attenzione: Le due password inserite non cambaciano.").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();
		} else if (newpass1.length < 6){
			$("#err_pass").text("Attenzione: La password deve essere lunga almeno 6 caratteri").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();
		} else if (newpass1.length > 40){
			$("#err_pass").text("Attenzione: La password è troppo lunga").fadeIn('fast').delay(6000).fadeOut('fast');
			e.preventDefault();
		}
	});
});


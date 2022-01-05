function checkAggPassForm(){
    var oldpass = document.getElementById("oldpass").value;
    var newpass1 = document.getElementById("newpass").value;
    var newpass2 = document.getElementById("newpass2").value;

    if(!oldpass){
      alert ('Attenzione: non è stata inserita alcuna vecchia password.');
      return false;
    }

    if(newpass1 != newpass2){
		alert ('Attenzione: Le due password inserite non cambaciano.');
		return false;
	  }
    
    /*
    if(newpass1.length < 6){
      alert ('Attenzione: La password deve essere lunga almeno 6 caratteri');
      return false;
    }
      
    if(newpass1.length > 40){
      alert ('Attenzione: La password è troppo lunga');
      return false;
    }		
    */
};

/*
ulteriori funzioni per il controllo delle password andranno qui */

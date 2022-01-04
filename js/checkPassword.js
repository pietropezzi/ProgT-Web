function checkPassMatch(){
    var newpass1 = document.getElementById("newpass").value;
    var newpass2 = document.getElementById("newpass2").value;

    if(newpass1 != newpass2){
		alert ('Le due password inserite non cambaciano.');
		return false;
	}
};

/*
ulteriori funzioni per il controllo delle password andranno qui */

<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if($this->db->connect_error){
            die("Connesione fallita al db");
        }
    }
	
	public function insertUser($email, $name, $username, $password, $phone){
		$sql = "INSERT INTO users(email, name, username, password, phone)
			  VALUES ('$email', '$name', '$username', '$password', '$phone')";
	
		if ($this->db->query($sql)=== TRUE) { // ! sta per la negazione
			header("location: http://localhost/Web/index.html");
			exit;
		}
		else{
			echo "Errore nell'inserimento: " . $this->db->error . ".";	
			$this->db->close();
		}
	}
}
?>